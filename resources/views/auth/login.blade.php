<x-layout_auth>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-20 h-20 mr-2" src="assets/logo-petshop.png" alt="logo">
            Katty PetShop
        </a>
        <div
            class="w-full bg-white rounded-lg shadow dark:border sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 sm:p-8">
                <div class="flex justify-center items-center">
                    <h3 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Login
                    </h3>
                </div>
                <form class="space-y-4" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 
                               focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                               dark:placeholder-gray-400 dark:text-white"
                            placeholder="Masukkan alamat email" required>
                    </div>
                    <div>
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="Masukkan password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required>
                            <button type="button" id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg id="eyeIcon" class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                                    required="">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-600 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        <a href="/reset-password"
                            class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Lupa
                            password?</a>
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                    <div class="flex justify-center items-center">
                        <p class="text-sm font-light text-gray-600 dark:text-gray-400">
                            Belum punya akun? <a href="/register"
                                class="font-medium text-blue-600 hover:underline dark:text-blue-500">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility 
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            const isPasswordHidden = passwordInput.getAttribute('type') === 'password';

            // Ubah tipe input password
            passwordInput.setAttribute('type', isPasswordHidden ? 'text' : 'password');

            // Ubah kelas ikon mata
            eyeIcon.classList.toggle('text-black', !isPasswordHidden);
            eyeIcon.classList.toggle('text-gray-500', isPasswordHidden);
        });

        // Menangani error login
        @if (session('loginError'))
            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: '{{ session('loginError') }}',
                confirmButtonColor: '#FF0000',
                confirmButtonText: 'OK'
            });
        @endif

        // Menangani pesan logout sukses
        @if (session('logoutSuccess'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
            Toast.fire({
                icon: 'success',
                title: 'Logout Berhasil',
                html: '{{ session('logoutSuccess') }}'
            });
        @endif

        // Menangani status pesan sukses
        @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('status') }}",
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/login';
                }
            });
        @endif
    </script>
</x-layout_auth>
