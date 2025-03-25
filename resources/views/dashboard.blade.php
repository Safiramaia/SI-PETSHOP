<x-layout>
    <div class="container mx-auto mt-8 p-4 lg:p-6">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Welcome Section -->
            <div class="flex justify-center items-center mb-2">
                <h1 class="text-4xl sm:text-3xl md:text-2xl text-center text-[#D17996] font-bold">
                    Selamat Datang di Katty PetShop
                </h1>
            </div>

            <!-- Carousel Section -->
            <div id="default-carousel" class="relative w-full h-[500px]" data-carousel="slide">
                <div class="relative w-full h-full overflow-hidden rounded-lg">
                    <a href="{{ route('dashboard') }}" class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/carousel/carousel-1.png"
                            class="absolute inset-0 block w-full h-full object-contain" alt="Carousel 1">
                    </a>
                    <a href="{{ route('grooming.index') }}" class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/carousel/carousel-2.png"
                            class="absolute inset-0 block w-full h-full object-contain" alt="Carousel 2">
                    </a>
                    <a href="{{ route('produk.index') }}" class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/assets/carousel/carousel-3.png"
                            class="absolute inset-0 block w-full h-full object-contain" alt="Carousel 3">
                    </a>
                </div>

                <!-- Slider Indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                </div>

                <!-- Slider Controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>

                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <!-- Favorite Products Section -->
            <div class="mt-6 bg-gray-white p-4">
                <h3 class="text-xl font-semibold">Produk Favorit Anda</h3>
                <div class="mt-4 overflow-x-auto">
                    <div class="flex space-x-6">
                        @foreach ($favoriteProducts as $produk)
                            <div class="flex-none w-60 border p-4 mt-2 mb-4 rounded-lg shadow-lg bg-white product-card hover:scale-105 transform transition-all duration-300 ease-in-out"
                                data-product-id="{{ $produk->id }}">
                                <div class="h-48 overflow-hidden rounded-md">
                                    <img src="{{ asset('produk/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <h4 class="mt-2 text-lg font-medium">{{ $produk->nama_produk }}</h4>
                                <p class="font-semibold mt-2">Rp {{ number_format($produk->harga_jual, 2, ',', '.') }}
                                </p>
                                <a href="{{ route('produk.detail-produk', $produk->id) }}"
                                    class="text-blue-500 mt-2 toggle-link">Lihat Detail</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.product-card').forEach(function(card) {
            card.addEventListener('click', function() {
                const link = card.querySelector('.toggle-link');
                // Toggle visibilitas link
                link.classList.toggle('hidden');
            });
        });

        // SweetAlert for Login Success
        @if (session('loginSuccess'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('loginSuccess') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>
</x-layout>
