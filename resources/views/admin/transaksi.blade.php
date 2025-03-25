<x-layout_admin>
    <div class="mx-4 lg:mx-10 max-w-screen-2xl mt-8">
        <!-- Search Data -->
        <div class="w-full md:w-1/3 ml-auto mb-6">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
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

        <!-- Keuntungan -->
        {{-- <div class="bg-white p-4 rounded-lg shadow-md mb-5 border-t-2 border-gray-200">
            <h3 class="text-lg font-semibold">Laporan Keuntungan</h3>

            <!-- Dropdown untuk memilih jenis laporan -->
            <select id="jenis-laporan" class="mt-2 mb-4 p-2 border rounded" onchange="updateKeuntungan()">
                <option value="harian">Harian</option>
                <option value="mingguan">Mingguan</option>
                <option value="bulanan">Bulanan</option>
            </select>

            <div id="laporan-keuntungan">
                <p id="keuntungan-harian" class="text-sm font-medium">Keuntungan Harian :
                    <span class="text-green-600">Rp {{ number_format($keuntungan['harian'], 2, ',', '.') }}</span>
                </p>
                <p id="keuntungan-mingguan" class="hidden text-sm font-medium">Keuntungan Mingguan :
                    <span class="text-green-600">Rp {{ number_format($keuntungan['mingguan'], 2, ',', '.') }}</span>
                </p>
                <p id="keuntungan-bulanan" class="hidden text-sm font-medium">Keuntungan Bulanan :
                    <span class="text-green-600">Rp {{ number_format($keuntungan['bulanan'], 2, ',', '.') }}</span>
                </p>
            </div>
        </div> --}}

        <!-- Table Data -->
        <div class="overflow-x-auto relative sm:rounded-lg mt-5 shadow-md dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-sm text-white bg-[#16325B]">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Kode Pesanan</th>
                        <th scope="col" class="px-6 py-3">Metode Pembayaran</th>
                        <th scope="col" class="px-6 py-3">Total Harga</th>
                        <th scope="col" class="px-6 py-3">Tanggal Transaksi</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $index => $transaksis)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-2 text-center text-black border-r border-gray-200">{{ $index + 1 }}
                            </td>
                            <td class="px-4 py-2 border-r text-black border-gray-200 text-center">
                                {{ $transaksis->kode_pesanan }}
                            </td>
                            <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                {{ $transaksis->metode_pembayaran }}</td>
                            <td class="px-4 py-2 text-black border-r border-gray-200">Rp
                                {{ number_format($transaksis->total_harga, 2, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                {{ (new DateTime($transaksis->tanggal_transaksi))->format('d-m-Y H:i') }}</td>
                            <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                {{ $transaksis->status }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">
                                <button onclick="deleteTransaction('{{ $transaksis->id }}')"
                                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6">
                                        <path fill="#ffffff"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </td>

                            <form id="delete-form-{{ $transaksis->id }}"
                                action="{{ route('transaksi.destroy', $transaksis->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pesan jika data tidak ditemukan -->
            <p id="no-data-message" class="text-center mt-4 text-red-500" style="display: none;">Data tidak ditemukan
            </p>

            <!-- Pagination -->
            <div class="flex justify-between items-center px-4 py-3 bg-white border-t border-gray-200 dark:bg-gray-800">
                <div class="text-sm text-gray-800 dark:text-white font-bold">
                    Showing {{ $transaksi->firstItem() ?? 0 }} to {{ $transaksi->lastItem() ?? 0 }} of
                    {{ $transaksi->total() }} data
                </div>
                <div>
                    {{ $transaksi->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateKeuntungan() {
            const selected = document.getElementById('jenis-laporan').value;

            // Sembunyikan semua laporan
            document.getElementById('keuntungan-harian').classList.add('hidden');
            document.getElementById('keuntungan-mingguan').classList.add('hidden');
            document.getElementById('keuntungan-bulanan').classList.add('hidden');

            // Tampilkan laporan berdasarkan pilihan
            if (selected === 'harian') {
                document.getElementById('keuntungan-harian').classList.remove('hidden');
            } else if (selected === 'mingguan') {
                document.getElementById('keuntungan-mingguan').classList.remove('hidden');
            } else if (selected === 'bulanan') {
                document.getElementById('keuntungan-bulanan').classList.remove('hidden');
            }
        }

        // Inisialisasi tampilan awal
        updateKeuntungan();

        function deleteTransaction(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Data ini akan dihapus secara permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#FF0000',
                cancelButtonColor: '#3085D6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${id}`).submit();
                }
            });
        }

        document.getElementById("simple-search").addEventListener("keyup", function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll("table tbody tr");
            var found = false;

            rows.forEach(function(row) {
                var kodePesanan = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                var metodePembayaran = row.querySelector("td:nth-child(3)").textContent.toLowerCase();

                if (kodePesanan.includes(value) || metodePembayaran.includes(value)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
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
