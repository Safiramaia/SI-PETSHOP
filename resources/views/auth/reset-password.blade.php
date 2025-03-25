<x-layout_auth>
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
            <img class="w-20 h-20 mr-2" src="assets/logo-petshop.png" alt="logo">
            Katty PetShop
        </a>
        <div
            class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
            <div class="flex justify-center items-center">
                <h3 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Reset Password
                </h3>
            </div>
            <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('auth.reset-password.submit') }}"
                method="POST">
                @csrf
                <div>
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Anda</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan alamat email anda"
                        class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password
                        Baru</label>
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
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div>
                    <label for="confirm-password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi
                        Password</label>
                    <div class="relative">
                        <input type="password" name="confirm-password" id="confirm-password"
                            placeholder="Masukkan konfirmasi password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <svg id="eyeIconConfirm" class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2"
                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <button type="submit"
                    class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Reset
                    passwod</button>
            </form>
            <div class="text-center mt-2">
                <a href="/login" class="text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">
                    Kembali ke Login
                </a>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
    
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
    
            // Toggle the eye icon color
            eyeIcon.classList.toggle('text-gray-500');
            eyeIcon.classList.toggle('text-black');
        });
    
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('confirm-password');
            const eyeIconConfirm = document.getElementById('eyeIconConfirm');
    
            // Toggle the type attribute
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
    
            // Toggle the eye icon color
            eyeIconConfirm.classList.toggle('text-gray-500');
            eyeIconConfirm.classList.toggle('text-black');
        });
    </script>
</x-layout_auth>
