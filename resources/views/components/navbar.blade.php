<div class="antialiased bg-gray-50 dark:bg-gray-900">
    <nav
        class="bg-[#577CA1] border-b border-gray-200 px-4 py-2 dark:bg-gray-800 dark:border-gray-700 fixed left-0 right-0 top-0 z-50">
        <div class="flex items-center">
            <div>
                <button id="sidebarButton"
                    class="bg-primary-700 hover:bg-gray-200 text-white font-medium rounded-lg text-sm px-3 py-2 focus:ring-4 focus:ring-gray-200 dark:bg-gray-200 dark:hover:bg-gray-200 dark:focus:ring-gray-300 focus:outline-none"
                    type="button" data-drawer-target="drawer-sidebar" data-drawer-show="drawer-sidebar"
                    aria-controls="drawer-sidebar">
                    <svg class="w-7 h-7 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 6H6m12 4H6m12 4H6m12 4H6" />
                    </svg>
                </button>
            </div>

            <a href="/user/dashboard" class="flex items-center">
                <img class="w-14 h-14" src="{{ asset('assets/logo-petshop.png') }}" alt="PetShop Logo">
                <span class="text-xl font-semibold text-white ml-2">Katty PetShop</span>
            </a>

            <div id="drawer-sidebar"
                class="fixed top-0 left-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform -translate-x-full bg-[#F2F5F7] dark:bg-gray-800"
                tabindex="-1" aria-hidden="true" aria-labelledby="drawer-sidebar-label">
                <div class="flex items-center justify-between mb-2">
                    <a href="/user/dashboard" class="flex items-center">
                        <img class="w-14 h-14" src="{{ asset('assets/logo-petshop.png') }}" alt="PetShop Logo">
                        <span class="text-xl font-semibold text-[#577CA1] ml-2">Katty PetShop</span>
                    </a>
                    <button type="button" data-drawer-dismiss="drawer-sidebar"
                        class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg p-1.5 dark:hover:bg-gray-600 dark:hover:text-white"
                        aria-controls="drawer-sidebar">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close menu</span>
                    </button>
                </div>

                <!-- Sidebar Navigation -->
                <aside aria-label="Sidenav">
                    <div class="overflow-y-auto py-2 px-4">
                        <!-- Menu Items -->
                        <ul class="space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="/user/dashboard"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                                    <svg class="w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                                    </svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/user/produks"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                    </svg>
                                    <span class="ml-3">Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="/user/grooming"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
                                    </svg>
                                    <span class="ml-3">Grooming</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="detail-transaksi"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z" />
                                    </svg>
                                    <span class="ml-3">Transaksi</span>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a href="account"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M256 32C119.0 32 8 143.0 8 288c0 99.4 55.8 185.2 138.4 230.4C146.7 486.4 128 462.3 128 432c0-29.4 23.6-53.2 52-56.3C179.7 378.1 185.2 384 192 384h128c6.8 0 12.3-5.8 11.7-12.8C336.4 378.8 360 402.7 360 432c0 30.3-18.6 54.4-44.3 69.5c82.5-45.2 138.3-131.0 138.3-230.5C504 143.0 392.9 32 256 32z" />
                                    </svg>
                                    <span class="ml-3">Akun</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="flex items-center justify-between lg:order-2 ml-auto">
                <!-- User Menu -->
                <span class="hidden md:block text-sm font-medium text-white">
                    Selamat datang, <b>{{ auth()->user()->username }}</b>
                </span>
                <div>
                    <button type="button" id="user-menu-button" data-dropdown-toggle="dropdown"
                        aria-expanded="false"
                        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 
                        dark:focus:ring-gray-600">
                        <span class="sr-only">Open user menu</span>
                        <img id="profile-image" class="w-8 h-8 rounded-full"
                            src="{{ auth()->user()->foto ? asset('profile/' . auth()->user()->foto) : asset('assets/user-icon.png') }}"
                            alt="User Photo">
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="dropdown"
                        class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow 
                            dark:bg-gray-700 dark:divide-gray-600 rounded-xl">
                        <div class="py-3 px-4">
                            <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{ auth()->user()->nama }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                        <ul class="py-1 text-gray-700 dark:text-gray-300">
                            <li><a href=""
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 
                                    dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li><a href="/user-profile"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 
                                    :text-gray-400 dark:hover:text-white">Profile</a>
                            </li>
                            <!--<li><a href="#"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 
                                    dark:text-gray-400 dark:hover:text-white">Account
                                    settings</a></li>-->
                        </ul>
                        <ul class="py-1 text-gray-700 dark:text-gray-300">
                            <form id="logoutForm" action="/logout" method="POST">
                                @csrf
                                <button type="button" id="logoutButton"
                                    class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 
                                    dark:text-gray-400 dark:hover:text-white"
                                    role="menuitem">
                                    Sign out
                                </button>
                            </form>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<script>
    document.getElementById('logoutButton').addEventListener('click', function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Anda yakin ingin keluar?',
            text: 'Jika Anda keluar, Anda perlu login untuk masuk kembali.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF0000',
            cancelButtonColor: '#3085D6',
            confirmButtonText: 'Ya, Keluar!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    });
</script>
</nav>
</div>
