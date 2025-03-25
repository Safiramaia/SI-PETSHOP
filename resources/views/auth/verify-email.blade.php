<x-layout_auth>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <div class="flex flex-col items-center mb-6">
                <h3 class="mt-4 text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white">
                    Verifikasi Email
                </h3>
            </div>
            <p class="text-gray-900 dark:text-white text-center mb-4 text-justify">
                Terima kasih telah mendaftar! Sebelum melanjutkan, silakan periksa email Anda untuk tautan verifikasi.
                Jika Anda tidak menerima email,
            </p>
            <form method="POST" action="{{ route('verification.send') }}" class="text-center mb-4">
                @csrf
                <button type="submit" class="text-blue-600 hover:underline dark:text-blue-500">
                    klik di sini untuk mengirim ulang
                </button>
            </form>
            <div class="text-center">
                <a href="/login"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Kembali ke Login
                </a>
            </div>
        </div>
    </div>
    <script>
        @if (session('message'))
            <
            script >
                Swal.fire({
                    title: 'Sukses!',
                    text: "{{ session('message') }}",
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
    </script>
    @endif
    </script>
</x-layout_auth>
