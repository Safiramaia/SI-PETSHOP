<x-layout>
    <div class="flex justify-center items-center min-h-screen mt-2 w-full">
        <div
            class="w-full md:w-2/3 border border-gray-300 p-12 rounded-lg bg-white shadow-md dark:bg-gray-800 dark:border-gray-600">
            <h3 class="text-center text-2xl font-bold text-gray-900 dark:text-white">Pembayaran Grooming</h3>

            <form id="groomingTransactionForm" method="POST">
                @csrf
                <input type="hidden" name="id_grooming" value="{{ $grooming->id }}">
                <div class="mt-2 mb-4">
                    <div class="mt-2">
                        <h3 class="text-md text-black font-semibold">Nama : {{ $grooming->nama_kucing }}</h3>
                    </div>
                    <div class="mt-2">
                        <p class="text-black font-semibold">Jenis : {{ $grooming->jenisGrooming->nama_jenis }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-blue-600 font-semibold">Durasi :
                            {{ $grooming->jenisGrooming->durasi }} menit</span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <label for="metode_pembayaran" class="font-semibold w-1/3 bg-white p-2 rounded">
                        Metode Pembayaran
                    </label>
                    <select id="metode_pembayaran" name="metode_pembayaran"
                        class="flex-1 bg-[#f9fafb] p-2 rounded border border-gray-300">
                        <option value="cash">Cash</option>
                        <option value="credit_card">Kartu Kredit</option>
                    </select>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <label for="harga_total" class="font-semibold w-1/3 bg-white p-2 rounded">
                        Total Harga (Rp)
                    </label>
                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                        <input type="text" id="harga_total" name="harga_total"
                            value="{{ number_format($grooming->harga_total, 0, ',', '.') }}" readonly
                            class="border-0 bg-transparent flex-1 text-right" />
                    </div>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <label for="jumlah_uang" class="font-semibold w-1/3 bg-white p-2 rounded">
                        Jumlah Uang Yang Dibayarkan (Rp)
                    </label>
                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                        <input type="text" id="jumlah_uang" name="jumlah_uang"
                            class="border-0 bg-transparent flex-1 text-right" />
                    </div>
                </div>
                <div class="flex items-center gap-4 mt-2">
                    <label for="kembalian" class="font-semibold w-1/3 bg-white p-2 rounded">
                        Kembalian
                    </label>
                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                        <span class="mr-2">Rp</span>
                        <span id="kembalian" class="flex-1 text-right">0</span>
                    </div>
                </div>
                <div class="flex justify-end mt-5 space-x-4">
                    <button type="button"
                        class="w-28 bg-red-700 rounded-md py-2 font-bold text-center text-white hover:bg-red-800"
                        onclick="closePembayaran()">Tutup</button>
                    <button type="submit"
                        class="w-28 bg-blue-700 rounded-md py-2 font-bold text-center text-white hover:bg-blue-800">Bayar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const formPembayaran = document.getElementById('groomingTransactionForm');
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            formPembayaran.addEventListener('submit', handleFormSubmit);

            function handleFormSubmit(e) {
                e.preventDefault();
                const totalHarga = parseFloat(document.getElementById('harga_total').value.replace(/\D/g, ''));
                const jumlahUang = parseFloat(document.getElementById('jumlah_uang').value.replace(/\D/g, ''));

                if (jumlahUang < totalHarga) {
                    showError('Pembayaran Gagal', 'Jumlah uang yang dibayarkan tidak cukup!');
                    return;
                }

                const kembalian = jumlahUang - totalHarga;
                document.getElementById('kembalian').innerText = kembalian.toLocaleString('id-ID');
                showToast('Pembayaran Sukses', `Kembalian: Rp ${kembalian.toLocaleString('id-ID')}`);

                const formData = new FormData(formPembayaran);
                formData.append('jumlah_uang', jumlahUang);
                formData.append('kembalian', kembalian);

                fetch('{{ route('transaksi-grooming.store', ['id' => $grooming->id]) }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: formData,
                    })
                    .then(handleResponse)
                    .catch(error => showError('Terjadi Kesalahan', 'Terjadi kesalahan: ' + error.message));
            }

            function handleResponse(response) {
                if (!response.ok) {
                    return response.json().then(err => {
                        throw new Error(err.message || 'Gagal menyimpan transaksi!');
                    });
                }
                return response.json().then(data => {
                    showToast('Transaksi Berhasil', data.toast_succes);
                    window.location.href = '{{ route('grooming.index') }}';
                });
            }

            function showError(title, text) {
                Swal.fire({
                    icon: 'error',
                    title: title,
                    text: text
                });
            }

            function showToast(title, html) {
                Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                }).fire({
                    icon: 'success',
                    title: title,
                    html: html
                });
            }

            function closePembayaran() {
                window.location.href = '{{ route('grooming.index') }}';
            }
        });
    </script>
</x-layout>
