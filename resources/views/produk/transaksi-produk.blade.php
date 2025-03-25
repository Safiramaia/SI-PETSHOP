<x-layout>
    <div class="flex justify-center items-center min-h-screen mt-2 w-full">
        <div class="w-full md:w-2/3 border border-gray-300 p-12 mt-12 rounded-lg bg-white shadow-md dark:bg-gray-800 dark:border-gray-600">
            <div id="pembayaran-section" class="mt-2">
                @csrf
                <h3 class="text-center text-2xl font-bold text-gray-900 dark:text-white sm:text-2xl">Pembayaran</h3>
    
                <!-- Container for Product Details and Payment Form -->
                <div class="flex flex-col gap-4 mt-2">
                    
                    <!-- Product Details Section -->
                    <div class="bg-white p-4">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">Detail Produk yang Dibeli</h3>
                        <div class="mt-4" id="produk-list">
                            <!-- Product list will be added by JavaScript -->
                        </div>
                    </div>
    
                    <!-- Payment Form Section -->
                    <div class="bg-white p-4">
                        <form id="formPembayaran" action="{{ route('transaksi-produk.store') }}" method="POST">
                            <div class="flex flex-col gap-4">
    
                                <!-- Order Code -->
                                <div class="flex items-center gap-4">
                                    <label for="kode_pesanan" class="font-semibold w-1/3 bg-white p-2 rounded">
                                        Kode Pesanan
                                    </label>
                                    <input type="text" id="kode_pesanan" name="kode_pesanan" readonly
                                        class="flex-1 bg-[#f9fafb] p-2 rounded border border-gray-300" />
                                </div>
    
                                <!-- Payment Method -->
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
    
                                <!-- Total Price -->
                                <div class="flex items-center gap-4">
                                    <label for="total_harga" class="font-semibold w-1/3 bg-white p-2 rounded">
                                        Total Harga (Rp)
                                    </label>
                                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                                        <input type="text" id="total_harga" name="total_harga" readonly
                                            class="border-0 bg-transparent flex-1 text-right" />
                                    </div>
                                </div>
    
                                <!-- Amount Paid -->
                                <div class="flex items-center gap-4">
                                    <label for="jumlah_uang" class="font-semibold w-1/3 bg-white p-2 rounded">
                                        Jumlah Uang Yang Dibayarkan (Rp)
                                    </label>
                                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                                        <input type="text" id="jumlah_uang" name="jumlah_uang"
                                            class="border-0 bg-transparent flex-1 text-right" />
                                    </div>
                                </div>
    
                                <!-- Change -->
                                <div class="flex items-center gap-4">
                                    <label for="kembalian" class="font-semibold w-1/3 bg-white p-2 rounded">
                                        Kembalian
                                    </label>
                                    <div class="flex-1 flex items-center bg-[#f9fafb] p-2 rounded border border-gray-300">
                                        <span id="kembalian" class="flex-1 text-right">0</span>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Buttons -->
                            <div class="flex justify-end mt-5 space-x-4">
                                <button type="button" class="w-28 bg-red-700 rounded-md py-2 font-bold text-center text-white hover:bg-red-800" onclick="closePembayaran()">Tutup</button>
                                <button type="submit" class="w-28 bg-blue-700 rounded-md py-2 font-bold text-center text-white hover:bg-blue-800">Bayar</button>
                            </div>
                        </form>
                    </div>
    
                </div>
            </div>
        </div>
    </div>    

    <script>
        // Format untuk menampilkan uang dalam format Rupiah
        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(amount);
        }

         // Fungsi untuk menghasilkan nomor pesanan dengan format ORD-XXXXX
         function generateRandomOrderNumber() {
            return Math.floor(10000 + Math.random() * 90000); 
        }

        // Fungsi untuk menampilkan produk yang dibeli dari keranjang
        function loadProductList() {
            const orderData = JSON.parse(localStorage.getItem('orderData')) || [];
            const produkList = document.getElementById('produk-list');
            produkList.innerHTML = '';

            let totalHarga = 0;

            orderData.forEach(item => {
                const totalItemPrice = item.productPrice * item.quantity;
                totalHarga += totalItemPrice; 
                const productItem = document.createElement('div');
                productItem.className = 'flex items-center justify-between mb-4';
                productItem.innerHTML = `
                    <img src="${item.productImage}" alt="${item.productName}" class="w-20 h-20 object-cover" />
                    <div class="flex justify-between flex-grow items-center">
                        <div>
                            <h3 class="text-md font-semibold text-gray-800">${item.productName}</h3>
                            <p class="text-sm text-gray-500">Harga per item : ${formatRupiah(item.productPrice)}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-black">
                                Jumlah : <span id="quantity-${item.productId}">${item.quantity}</span>
                            </p>
                            <p class="text-sm font-bold text-green-700">
                                Total : ${formatRupiah(totalItemPrice)}
                            </p>
                        </div>
                    </div>
                `;
                produkList.appendChild(productItem);
            });

            document.getElementById('total_harga').value = (totalHarga);
            const kodePesanan = 'ORD-' + generateRandomOrderNumber();
            document.getElementById('kode_pesanan').value = kodePesanan;
        }
        loadProductList();

        // Menangani Proses Pembayaran
        document.addEventListener('DOMContentLoaded', function() {
            const formPembayaran = document.getElementById('formPembayaran');
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

            formPembayaran.addEventListener('submit', handleFormSubmit);

            function handleFormSubmit(e) {
                e.preventDefault();
                const totalHarga = parseFloat(document.getElementById('total_harga').value.replace(/\D/g, ''));
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
                formData.append('orderData', JSON.stringify(JSON.parse(localStorage.getItem('orderData')) || []));

                fetch('{{ route('transaksi-produk.store') }}', {
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
                    clearShoppingCart();
                    window.location.href = '{{ route('produk.index') }}';
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
                    timerProgressBar: true
                }).fire({
                    icon: 'success',
                    title: title,
                    html: html
                });
            }
        });

        function closePembayaran() {
            window.location.href = '{{ route('produk.index') }}';
        }

        // Fungsi untuk menghapus data keranjang
        function clearShoppingCart() {
            localStorage.removeItem('orderData');
            sessionStorage.removeItem('orderData');

            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            }).fire({
                icon: 'success',
                title: 'Pembayaran berhasil!',
                html: 'Keranjang belanja Anda telah kosong.'
            });
        }
    </script>
</x-layout>
