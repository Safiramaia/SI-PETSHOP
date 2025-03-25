<x-layout_admin>
    <div class="mx-4 lg:mx-10 max-w-screen-2xl mt-8">
        <!-- Search Data -->
        <div class="w-full md:w-1/3 ml-auto">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                              focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 
                              dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Cari Data">
            </div>
        </div>

        <!-- Container untuk Kotak Transaksi -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-5" id="transaksi-list">
            @forelse ($transaksi as $index => $pembelian)
                <div class="bg-gray-50 border rounded-lg shadow-md p-4 transaksi-item" data-kode-pesanan="{{ $pembelian->kode_pesanan }}" data-nama-produk="{{ $pembelian->detailTransaksi->pluck('produk.nama_produk')->join(', ') }}">
                    <h3 class="text-lg font-bold text-center text-black">ID Transaksi : {{ $pembelian->id }}</h3>
                    <div class="mt-4">
                        <div class="flex justify-between">
                            <p class="text-black font-semibold">Kode Pesanan</p>
                            <p class="text-black font-semibold">{{ $pembelian->kode_pesanan }}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-black font-semibold">Tanggal Transaksi</p>
                            <p class="text-black font-semibold">
                                {{ (new DateTime($pembelian->tanggal_transaksi))->format('d-m-Y H:i') }}</p>
                        </div>
                    </div>

                    <div class="mt-2 space-y-2">
                        @foreach ($pembelian->detailTransaksi as $detail)
                            <div class="border-t pt-2">
                                <div class="flex justify-between">
                                    <p class="text-black">Nama Produk</p>
                                    <p class="text-black">{{ $detail->produk->nama_produk }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Jumlah Pembelian</p>
                                    <p class="text-black">{{ $detail->jumlah }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Harga Modal</p>
                                    <p class="text-black">Rp
                                        {{ number_format($detail->produk->harga_beli, 2, ',', '.') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Harga Jual</p>
                                    <p class="text-black">Rp
                                        {{ number_format($detail->produk->harga_jual, 2, ',', '.') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Diskon Produk</p>
                                    <p class="text-black">{{ number_format($detail->produk->diskon, 0) }}%</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Harga Setelah Diskon</p>
                                    <p class="text-black">Rp {{ number_format($detail->total_harga, 2, ',', '.') }}</p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-black">Keuntungan</p>
                                    <p class="text-black">Rp
                                        {{ number_format($detail->produk->harga_jual - $detail->produk->harga_beli - ($detail->produk->harga_jual * $detail->produk->diskon) / 100, 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    Tidak ada data pembelian
                </div>
            @endforelse
        </div>

        <!-- Pesan jika data tidak ditemukan -->
        <p id="no-data-message" class="text-center mt-4 text-red-500" style="display: none;">Data tidak ditemukan</p>

        <!-- Pagination -->
        <div class="flex justify-between items-center py-3 dark:bg-gray-800">
            <div class="text-sm text-gray-800 dark:text-white font-bold">
                Menampilkan {{ $transaksi->sum(function ($pembelian) {return $pembelian->detailTransaksi->count();}) }}
                data produk
            </div>
            <div>
                {{ $transaksi->links('components.pagination') }}
            </div>
        </div>
    </div>

    <script>
        document.getElementById("simple-search").addEventListener("keyup", function() {
            var value = this.value.toLowerCase();
            var transaksiItems = document.querySelectorAll(".transaksi-item");
            var found = false;

            transaksiItems.forEach(function(item) {
                var kodePesanan = item.getAttribute('data-kode-pesanan').toLowerCase();
                var namaProduk = item.getAttribute('data-nama-produk').toLowerCase();

                if (kodePesanan.includes(value) || namaProduk.includes(value)) {
                    item.style.display = "";
                    found = true;
                } else {
                    item.style.display = "none";
                }
            });

            var noDataMessage = document.getElementById("no-data-message");
            if (!found) {
                noDataMessage.style.display = "block";
            } else {
                noDataMessage.style.display = "none";
            }
        });
    </script>
</x-layout_admin>
