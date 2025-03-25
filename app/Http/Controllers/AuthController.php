<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    // METODE UNTUK REGISTRASI
    public function registerView()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pelanggan',
        ]);

        Auth::login($user);

        event(new Registered($user));
        return redirect('/email/verify');
    }

    // METODE UNTUK VERIFIKASI EMAIL
    public function verifyEmailView()
    {
        return view('auth.verify-email');
    }

    public function resendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended('/user/dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Tautan verifikasi baru telah dikirim ke email Anda!');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect('/user/dashboard')->with('message', 'Email Anda telah diverifikasi!');
    }

    // METODE UNTUK LOGIN
    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Set session untuk pesan sukses login
            session()->flash('loginSuccess', 'Login Berhasil, selamat datang ' . Auth::user()->username);

            // Redirect sesuai peran
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif (Auth::user()->role == 'karyawan') {
                return redirect()->intended('/karyawan/dashboard');
            } elseif (Auth::user()->role == 'pelanggan') {
                return redirect()->intended('/user/dashboard');
            }
        }

        return back()->with('loginError', 'Email atau password salah.');
    }

    // METODE UNTUK RESET PASSWORD
    public function showResetPasswordForm()
    {
        return view('auth.reset-password');
    }

    public function resetPassword(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/login')->with('status', 'Password berhasil direset! Silakan login dengan password baru.');
    }

    // METODE UNTUK LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token untuk mencegah session fixation
        $request->session()->regenerateToken();

        return redirect('/login')->with('logoutSuccess', 'Anda berhasil logout.');
    }
}
