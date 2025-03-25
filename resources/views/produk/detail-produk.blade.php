<x-layout>
    <div class="container mx-auto mt-8 p-4 lg:p-6">
        <div class="flex justify-center">
            <div class="bg-white border border-gray-200 rounded-lg shadow-md p-6 w-full max-w-4xl">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div
                        class="bg-white dark:border-gray-700 dark:bg-gray-800 flex justify-center items-center mx-auto w-auto">
                        <div class="h-72 mb-2">
                            @if ($produk->foto)
                                <img class="mx-auto h-full w-full object-contain"
                                    src="{{ asset('produk/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}" />
                            @else
                                <span class="block mb-4 text-center text-gray-500">Tidak ada foto</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-col justify-center">
                        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">
                            {{ $produk->nama_produk }}
                        </h1>
                        <div class="mt-2">
                            <p class="text-xl font-extrabold text-gray-900 dark:text-white">
                                Rp {{ number_format($produk->harga_jual, 2, ',', '.') }}
                                @if ($produk->diskon > 0)
                                    <span class="text-red-500 text-sm ml-2">
                                        (-{{ number_format($produk->diskon, 0) }}%))
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="mt-2">
                            <p class="text-gray-600 dark:text-gray-400">
                                Stok : <span class="font-semibold">{{ $produk->stok ?? 'Belum ditambahkan' }}</span>
                            </p>
                        </div>

                        <div class="mt-4 flex flex-col sm:flex-row sm:gap-4 sm:items-center">
                            <!-- Cek jika produk sudah favorit -->
                            @php
                                $isFavorited = Auth::check() ? $produk->isFavoritedByUser(Auth::id()) : false;
                            @endphp
                            <!-- Form untuk menambah atau menghapus favorit -->
                            <form
                                action="{{ $isFavorited ? route('produk.favorite.destroy', $produk) : route('produk.favorite.store', $produk) }}"
                                method="POST">
                                @csrf
                                @if ($isFavorited)
                                    @method('DELETE')
                                @endif
                                <button type="submit"
                                    class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-6 h-6 {{ $isFavorited ? 'fill-yellow-500' : 'fill-gray-400' }} mr-2">
                                        <path
                                            d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                    </svg>
                                    {{ $isFavorited ? 'Hapus dari Favorit' : 'Tambah ke Favorit' }}
                                </button>
                            </form>
                        </div>

                        <hr class="my-4 md:my-6 border-gray-200 dark:border-gray-800" />

                        <!-- Deskripsi produk -->
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ $produk->deskripsi_produk }}
                        </p>

                        <div class="mt-6 mb-2">
                            <a href="{{ route('produk.index') }}" title="Kembali"
                               class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Kembali
                            </a>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('toast_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('toast_success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif
</x-layout>
