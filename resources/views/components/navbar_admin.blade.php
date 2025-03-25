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

            <a href="/admin/dashboard" class="flex items-center">
                <img class="w-14 h-14" src="{{ asset('assets/logo-petshop.png') }}" alt="PetShop Logo">
                <span class="text-xl font-semibold text-white ml-2">Katty PetShop</span>
            </a>

            <div id="drawer-sidebar"
                class="fixed top-0 left-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform -translate-x-full bg-[#F2F5F7] dark:bg-gray-800"
                tabindex="-1" aria-hidden="true" aria-labelledby="drawer-sidebar-label">
                <div class="flex items-center justify-between mb-2">
                    <a href="/admin/dashboard" class="flex items-center">
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
                        <ul class="space-y-2 pt-3">
                            <li>
                                <a href="/admin/dashboard"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                                    <svg aria-hidden="true"
                                        class="w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                    <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/data-pelanggan"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-3">Data Pelanggan</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pt-2 mt-2 space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="/admin/kategori-produk"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                                    </svg>
                                    <span class="ml-3">Kategori Produk</span>
                                </a>
                            </li>
                            <li class="ml-2">
                                <a href="/admin/produk"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                    </svg>
                                    <span class="ml-3">Produk</span>
                                </a>
                            </li>
                            <li class="ml-2">
                                <a href="/admin/data-pembelian-produk"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                    </svg>
                                    <span class="ml-3">Data Pembelian Produk</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pt-2 mt-2 space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="/admin/jenis-grooming"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
                                    </svg>

                                    <span class="ml-3">Jenis Grooming</span>
                                </a>
                            </li>
                            <li class="ml-2">
                                <a href="/admin/pemesanan-grooming"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-6 8a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1 3a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-3">Pemesanan Grooming</span>
                                </a>
                            </li>
                            <li class="ml-2">
                                <a href="/admin/data-grooming"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12.006 2a9.847 9.847 0 0 0-6.484 2.44 10.32 10.32 0 0 0-3.393 6.17 10.48 10.48 0 0 0 1.317 6.955 10.045 10.045 0 0 0 5.4 4.418c.504.095.683-.223.683-.494 0-.245-.01-1.052-.014-1.908-2.78.62-3.366-1.21-3.366-1.21a2.711 2.711 0 0 0-1.11-1.5c-.907-.637.07-.621.07-.621.317.044.62.163.885.346.266.183.487.426.647.71.135.253.318.476.538.655a2.079 2.079 0 0 0 2.37.196c.045-.52.27-1.006.635-1.37-2.219-.259-4.554-1.138-4.554-5.07a4.022 4.022 0 0 1 1.031-2.75 3.77 3.77 0 0 1 .096-2.713s.839-.275 2.749 1.05a9.26 9.26 0 0 1 5.004 0c1.906-1.325 2.74-1.05 2.74-1.05.37.858.406 1.828.101 2.713a4.017 4.017 0 0 1 1.029 2.75c0 3.939-2.339 4.805-4.564 5.058a2.471 2.471 0 0 1 .679 1.897c0 1.372-.012 2.477-.012 2.814 0 .272.18.592.687.492a10.05 10.05 0 0 0 5.388-4.421 10.473 10.473 0 0 0 1.313-6.948 10.32 10.32 0 0 0-3.39-6.165A9.847 9.847 0 0 0 12.007 2Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-3">Data Grooming</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pt-3 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="/admin/transaksi"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z" />
                                    </svg>
                                    <span class="ml-3">Transaksi Produk</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/grooming-transaksi"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-7 h-7 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 576 512">
                                        <path
                                            d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-224c0-35.3-28.7-64-64-64L80 128c-8.8 0-16-7.2-16-16s7.2-16 16-16l368 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L64 32zM416 272a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                    </svg>
                                    <span class="ml-3">Transaksi Grooming</span>
                                </a>
                            </li>
                            <!--
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M19 6c0 1.657-3.134 3-7 3S5 7.657 5 6m14 0c0-1.657-3.134-3-7-3S5 4.343 5 6m14 0v6M5 6v6m0 0c0 1.657 3.134 3 7 3s7-1.343 7-3M5 12v6c0 1.657 3.134 3 7 3s7-1.343 7-3v-6" />
                                    </svg>
                                    <span class="ml-3">Data Penjualan</span>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                    <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-3">Data Pembelian</span>
                                </a>
                            </li>
                            <li>
                                <button type="button"
                                    class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                                    aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                                    <svg aria-hidden="true"
                                        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                        <path fill-rule="evenodd"
                                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="flex-1 ml-3 text-left whitespace-nowrap">Laporan</span>
                                    <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                                    <li>
                                        <a href="#"
                                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Stok
                                            Barang</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Layanan
                                            Grooming</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Penjualan</a>
                                    </li>
                                </ul>
                            </li>
                        -->
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
