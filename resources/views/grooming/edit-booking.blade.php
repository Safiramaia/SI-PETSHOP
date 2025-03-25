<x-layout>
    <div class="flex justify-center items-center min-h-screen mt-2 w-full">
        <div
            class="w-full md:w-2/3 border border-gray-300 p-12 rounded-lg bg-white shadow-md dark:bg-gray-800 dark:border-gray-600">
            <h2 class="mb-4 mt-2 text-xl font-bold text-center text-gray-900 dark:text-white">Edit Booking Grooming</h2>

            <form id="groomingEditForm" action="{{ route('grooming.update', $grooming->id) }}" method="POST"
                onsubmit="showOrderDetails(event)">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="id_jenis" class="block font-bold text-gray-700 mb-2">Jenis Grooming</label>
                    <select name="id_jenis" id="id_jenis"
                        class="form-select w-full border rounded-lg bg-gray-50 dark:bg-gray-700"
                        onchange="updateHargaTotal(); updateOrderSummary();">
                        <option value="" disabled>Pilih jenis grooming</option>
                        @foreach ($jenisGrooming as $jenis)
                            <option value="{{ $jenis->id }}"
                                {{ $grooming->id_jenis == $jenis->id ? 'selected' : '' }}>
                                {{ $jenis->nama_jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="durasi" class="block font-bold text-gray-700 mb-2">Durasi (mnt)</label>
                    <input type="text" id="durasi"
                        class="form-input w-full rounded-lg bg-gray-50 dark:bg-gray-700"
                        value="{{ old('durasi', $grooming->jenisGrooming->durasi) }}" readonly>
                </div>

                <div class="mb-4">
                    <label for="tanggal_booking" class="block font-bold text-gray-700 mb-2">Tanggal Booking</label>
                    <input type="datetime-local" name="tanggal_booking" id="tanggal_booking"
                        class="form-input w-full rounded-lg bg-gray-50 dark:bg-gray-700"
                        value="{{ old('tanggal_booking', \Carbon\Carbon::parse($grooming->tanggal_booking)->format('Y-m-d\TH:i')) }}"
                        required onchange="updateOrderSummary()">
                </div>

                <div class="mb-4">
                    <label for="nama_kucing" class="block font-bold text-gray-700 mb-2">Nama Kucing</label>
                    <input type="text" name="nama_kucing" id="nama_kucing"
                        class="form-input w-full rounded-lg bg-gray-50 dark:bg-gray-700"
                        value="{{ old('nama_kucing', $grooming->nama_kucing) }}" required
                        oninput="updateOrderSummary()">
                </div>

                <div class="mb-4 flex justify-between">
                    <div class="flex flex-col w-1/2 pr-2">
                        <label for="umur" class="font-bold text-gray-700">Umur Kucing (thn)</label>
                        <input type="number" step="0.01" name="umur" id="umur"
                            class="form-input w-full rounded-lg bg-gray-50 dark:bg-gray-700"
                            value="{{ old('umur', $grooming->umur) }}" required oninput="updateOrderSummary()">
                    </div>

                    <div class="flex flex-col w-1/2 pl-2">
                        <label for="berat" class="font-bold text-gray-700">Berat Kucing (kg)</label>
                        <input type="number" step="0.01" name="berat" id="berat"
                            class="form-input w-full rounded-lg bg-gray-50 dark:bg-gray-700"
                            value="{{ old('berat', $grooming->berat) }}" required
                            oninput="updateHargaTotal(); updateOrderSummary();">
                    </div>
                </div>

                <div class="flex justify-end gap-4 mt-4">
                    <a
                        href="{{ route('grooming.index') }}"class="bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-gray-900">Kembali</a>
                    <button type="submit"
                        class="bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg p-6 shadow-lg w-11/12 md:w-1/3">
            <h2 class="mb-4 text-xl text-center font-bold text-gray-900">Konfirmasi Pesanan</h2>
            <div id="orderSummary" class="text-gray-700"></div>
            <div id="hargaTotal" class="text-lg font-bold text-gray-800 mt-2"></div>

            <div class="flex justify-end space-x-2 mt-4">
                <button onclick="closeModal()"
                    class="bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-red-800">Batal</button>
                <button onclick="confirmOrder()"
                    class="bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 text-white font-medium rounded-lg px-5 py-2.5 hover:bg-blue-800">Konfirmasi</button>
            </div>
        </div>
    </div>

    <script>
        const jenisGroomingData = @json($jenisGrooming);

        function updateHargaTotal() {
            const idJenis = document.getElementById('id_jenis').value;
            const berat = parseFloat(document.getElementById('berat').value) || 0;

            if (!idJenis || isNaN(berat)) {
                document.getElementById('hargaTotal').innerText = "Total Harga : Rp. 0,00";
                document.getElementById('durasi').value = "";
                return;
            }

            const jenisGrooming = jenisGroomingData.find(j => j.id == idJenis);
            const hargaDasar = parseFloat(jenisGrooming?.harga || 0);
            const totalHarga = berat > 5 ? hargaDasar + (berat - 5) * 0.1 * hargaDasar : hargaDasar;

            document.getElementById('hargaTotal').innerHTML = `
                <span style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">
                    Total Harga : Rp. ${totalHarga.toLocaleString('id-ID', { minimumFractionDigits: 2 })}
                </span>
            `;

            document.getElementById('durasi').value = jenisGrooming?.durasi || 0;
        }

        function showOrderDetails(event) {
            event.preventDefault();
            updateOrderSummary();
            document.getElementById('confirmationModal').classList.remove('hidden');
        }

        function updateOrderSummary() {
            const idJenis = document.getElementById('id_jenis').value;
            const namaKucing = document.getElementById('nama_kucing').value;
            const umur = document.getElementById('umur').value;
            const berat = document.getElementById('berat').value;
            const tanggalBooking = document.getElementById('tanggal_booking').value;

            const jenisGrooming = jenisGroomingData.find(j => j.id == idJenis);

            // Format tanggal dan waktu ke bentuk hari/bulan/tahun jam:menit
            const formattedDate = new Date(tanggalBooking);
            const optionsDate = {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            };
            const optionsTime = {
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            };

            const formattedBookingDate = formattedDate.toLocaleDateString('id-ID', optionsDate);
            const formattedBookingTime = formattedDate.toLocaleTimeString('id-ID', optionsTime);

            document.getElementById('orderSummary').innerHTML = `
                <p style="font-weight: bold; margin-bottom: 10px;">Tanggal Booking : ${formattedBookingDate} ${formattedBookingTime}</p>
                <p style="font-weight: normal; margin-bottom: 10px;">Jenis Grooming : ${jenisGrooming?.nama_jenis || 'N/A'}</p>
                <p style="font-weight: normal; margin-bottom: 10px;">Durasi : ${jenisGrooming?.durasi || 0} menit</p>
                <p style="font-weight: normal; margin-bottom: 10px;">Nama Kucing : ${namaKucing}</p>
                <p style="font-weight: normal; margin-bottom: 10px;">Umur : ${umur} tahun</p>
                <p style="font-weight: normal; margin-bottom: 10px;">Berat : ${berat} kg</p>
            `;
        }

        function closeModal() {
            document.getElementById('confirmationModal').classList.add('hidden');
        }

        function confirmOrder() {
            document.getElementById('groomingEditForm').submit();
        }
    </script>
</x-layout>
