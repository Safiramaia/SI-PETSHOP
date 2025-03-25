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

        <!-- Table Pemesanan Grooming -->
        <div class="overflow-x-auto relative sm:rounded-lg mt-5 shadow-md dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-sm text-white bg-[#16325B]">
                        <th scope="col" class="px-4 py-3">No</th>
                        <th scope="col" class="px-4 py-3">ID User</th>
                        <th scope="col" class="px-4 py-3">Nama Kucing</th>
                        <th scope="col" class="px-4 py-3">Jenis Grooming</th>
                        <th scope="col" class="px-4 py-3">Tanggal Booking</th>
                        <th scope="col" class="px-4 py-3">Total Harga</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($grooming as $index => $order)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ $order->id_user }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ $order->nama_kucing }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">
                                {{ $order->jenisGrooming->nama_jenis }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">
                                {{ \Carbon\Carbon::parse($order->tanggal_booking)->format('d-m-Y H:i') }}
                            </td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">Rp.
                                {{ number_format($order->harga_total, 2, ',', '.') }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ ucfirst($order->status) }}
                            </td>
                            <td class="px-4 py-2 text-center">
                                @if ($order->status == 'menunggu')
                                    <button onclick="confirmCompletion({{ $order->id }})"
                                        class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6">
                                            <path fill="#ffffff"
                                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        </svg>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center border border-gray-300 px-4 py-2 text-gray-500">
                                Tidak ada pemesanan grooming
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginasi -->
            <div class="mt-4">
                {{ $grooming->links() }}
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi Selesai -->
    <div id="completionModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-6 shadow-lg w-11/12 md:w-1/3">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900">Konfirmasi Penyelesaian Pemesanan</h2>
            <p class="text-gray-700 text-center">Apakah Anda yakin ingin menandai pemesanan ini sebagai selesai?</p>
            <div class="flex justify-center items-center space-x-2 mt-4">
                <button onclick="closeCompletionModal()"
                    class="bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-red-800">Batal</button>
                <button id="confirmCompleteButton"
                    class="bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-blue-800">Konfirmasi</button>
            </div>
        </div>
    </div>

    <script>
        let selectedOrderId;

        function confirmCompletion(orderId) {
            selectedOrderId = orderId;
            document.getElementById('completionModal').classList.remove('hidden');
        }

        function closeCompletionModal() {
            document.getElementById('completionModal').classList.add('hidden');
        }

        document.getElementById('confirmCompleteButton').addEventListener('click', function() {
            const url = `/pemesanan-grooming/${selectedOrderId}/payment`;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses!',
                            text: data.message,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        });
                    } else {
                        alert('Gagal menandai pemesanan sebagai selesai.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan. Coba lagi nanti.');
                });
        });
        
        document.getElementById("simple-search").addEventListener("keyup", function() {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll("table tbody tr");
            var found = false;

            rows.forEach(function(row) {
                var namaKucing = row.querySelector("td:nth-child(3)").textContent.toLowerCase();
                var jenisGroomings = row.querySelector("td:nth-child(4)").textContent.toLowerCase();

                if (namaKucing.includes(value) || jenisGroomings.includes(value)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            });

            var noDataMessage = document.getElementById("no-data-message");
            if (!found) {
                noDataMessage.style.display = "";
            } else {
                noDataMessage.style.display = "none";
            }
        });
    </script>
</x-layout_admin>
