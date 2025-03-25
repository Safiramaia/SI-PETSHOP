<x-layout>
    <div class="container mx-auto mt-8 p-4 lg:p-6">
        <h2 class="text-2xl mb-6 font-bold text-[#01143B] text-center" style="font-family: 'Roboto', sans-serif;">
            PILIH PRODUK
        </h2>

        <!-- Filter Kategori -->
        <div class="flex flex-col items-start mb-4">
            <form method="GET" action="{{ route('produk.filter') }}" class="flex flex-col items-start">
                <label for="kategori_filter" class="mb-1 text-sm font-bold text-black">Filter Kategori:</label>
                <select name="kategori" id="kategori_filter" onchange="this.form.submit()"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategoriProduk as $kategori)
                        <option value="{{ $kategori->id }}"
                            {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </form>
            @if ($produks->count())
                <p class="text-sm text-gray-900 dark:text-gray-400 mt-2">Menampilkan {{ $produks->count() }} produk</p>
            @else
                <p class="text-sm text-red-600 dark:text-red-600 mt-2">Tidak ada produk yang ditemukan untuk kategori
                    ini.</p>
            @endif
        </div>

        <!-- Kontainer untuk Daftar Produk dan Keranjang Belanja -->
        <div class="mx-auto max-w-screen-2xl px-4 2xl:px-0 mt-4 flex flex-col lg:flex-row gap-4">
            <!-- Daftar Produk -->
            <div class="flex-1">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($produks as $produk)
                        <div
                            class="rounded-lg border border-gray-200 bg-white p-4 shadow-md dark:border-gray-700 dark:bg-gray-800 transition-transform transform hover:scale-105 flex flex-col justify-between h-full">
                            <div>
                                <div class="h-40 mb-2">
                                    @if ($produk->foto)
                                        <img class="mx-auto h-full w-full object-contain"
                                            src="{{ asset('produk/' . $produk->foto) }}"
                                            alt="{{ $produk->nama_produk }}" />
                                    @else
                                        <span class="block mb-4 text-center text-gray-500">Tidak ada foto</span>
                                    @endif
                                </div>

                                <div class="pt-2">
                                    <a href="{{ route('produk.detail-produk', $produk->id) }}"
                                        class="text-lg font-bold text-[#01143B] hover:underline dark:text-white">
                                        {{ $produk->nama_produk }}
                                    </a>
                                </div>
                                <div class="flex flex-col justify-start h-full">
                                    <p class="text-sm text-gray-600 mb-1 leading-5">
                                        {{ $produk->kategoriProduk?->nama_kategori ?? 'Tidak ada kategori' }}
                                    </p>
                                    <p class="text-black font-bold text-left text-sm leading-5">
                                        Rp {{ number_format($produk->harga_jual, 2, ',', '.') }}
                                        @if ($produk->diskon > 0)
                                            <span
                                                class="text-red-500 text-sm ml-2">(-{{ number_format($produk->diskon, 0) }}%)</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('produk.detail-produk', $produk->id) }}"
                                    class="flex items-center text-gray-500 hover:text-gray-900">
                                    <svg class="w-8 h-8 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </a>

                                <form method="POST" action="{{ route('cart.add') }}" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                    <button type="button"
                                        class="add-to-cart-btn inline-flex items-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300"
                                        aria-label="Tambah {{ $produk->nama_produk }} ke keranjang"
                                        onclick="handleAddToCart('{{ $produk->id }}', this)">
                                        <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 4h1.5L8 16h8M8 16a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                        </svg>
                                        Produk
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Keranjang Belanja -->
            <div id="order-summary" class="hidden flex-1 mt-4 lg:mt-0">
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <h3 class="text-center text-xl font-bold text-gray-900 dark:text-white sm:text-2xl">Keranjang
                        Belanja</h3>
                    <div class="mt-6 sm:mt-8" id="order-items">
                        <div class="flex flex-col">
                            <!-- Produk akan ditambahkan di sini oleh JavaScript -->
                        </div>
                    </div>
                    <hr class="my-4 border-gray-300 dark:border-gray-600">
                    <div class="flex items-center justify-between mt-4">
                        <div class="text-lg font-bold text-gray-900 dark:text-white">Total Keseluruhan:</div>
                        <div id="total-display" class="text-lg font-semibold text-gray-900 dark:text-white">Rp 0,00
                        </div>
                    </div>
                    <div class="flex justify-end mt-4 space-x-4">
                        <button type="button"
                            class="text-white inline-flex items-center bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            onclick="closeOrderSummary()">Tutup</button>
                        <button type="button"
                            class="text-white inline-flex items-center bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-700 dark:hover:bg-green-700 dark:focus:ring-green-800"
                            onclick="checkout()">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            loadOrderItems();
            updateTotalOrder();
            loadProductList();
            loadOrderData();
        });

        // Fungsi menghitung harga setelah diskon
        function calculatePriceAfterDiscount(price, discount) {
            return price - (price * discount / 100);
        }

        function formatRupiah(amount) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
            }).format(amount);
        }

        function handleAddToCart(productId, buttonElement) {
            // Mencegah form submit otomatis
            buttonElement.closest('form').onsubmit = function(event) {
                event.preventDefault();
            };
            addToOrderSummary(productId);
        }

        // Fungsi untuk menambahkan produk ke keranjang
        function addToOrderSummary(productId) {
            fetch(`/api/produk/${productId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error: ${response.status} ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(product => {
                    const {
                        nama_produk,
                        harga_jual,
                        diskon,
                        foto
                    } = product;
                    const priceAfterDiscount = calculatePriceAfterDiscount(harga_jual, diskon);

                    let orderData = JSON.parse(localStorage.getItem('orderData')) || [];
                    const existingProduct = orderData.find(item => item.productId === productId);

                    const productImageUrl = `/produk/${foto}`;

                    if (existingProduct) {
                        existingProduct.quantity += 1;
                    } else {
                        orderData.push({
                            productId,
                            productName: nama_produk,
                            productPrice: priceAfterDiscount,
                            productImage: productImageUrl,
                            originalPrice: harga_jual,
                            discount: diskon,
                            quantity: 1,
                        });
                    }

                    localStorage.setItem('orderData', JSON.stringify(orderData));
                    loadOrderItems();
                    updateTotalOrder();
                    loadProductList();
                })
                .catch(error => {
                    console.error('Error fetching product data:', error);
                });
        }

        // Fungsi untuk memperbarui total keseluruhan di keranjang
        function updateTotalOrder() {
            const orderData = JSON.parse(localStorage.getItem('orderData')) || [];
            const total = orderData.reduce((sum, item) => sum + item.productPrice * item.quantity, 0);

            document.getElementById('total-display').innerText = formatRupiah(total);
            document.getElementById('total_harga').value = total;
        }

        // Fungsi untuk menghapus item dari keranjang
        function removeItemFromOrderSummary(productId) {
            let orderData = JSON.parse(localStorage.getItem('orderData')) || [];
            orderData = orderData.filter(item => item.productId !== productId);
            localStorage.setItem('orderData', JSON.stringify(orderData));

            loadOrderItems();
            updateTotalOrder();
            loadProductList();
        }

        // Fungsi untuk memuat data order dari localStorage
        function loadOrderItems() {
            const orderData = JSON.parse(localStorage.getItem('orderData')) || [];
            const orderItems = document.getElementById('order-items');
            orderItems.innerHTML = '';

            orderData.forEach(item => {
                const {
                    productId,
                    productName,
                    productPrice,
                    productImage,
                    quantity,
                    originalPrice,
                    discount
                } = item;
                const itemTotal = productPrice * quantity;

                const productItem = document.createElement('div');
                productItem.id = `item-${productId}`;
                productItem.className = 'flex items-center justify-between mb-4';

                // Cek apakah ada diskon
                const isDiscounted = discount > 0;

                productItem.innerHTML = `
                    <img src="${productImage}" alt="${productName}" class="w-16 h-16 object-cover rounded">
                    <div class="ml-8 flex-grow">
                        <p class="font-semibold">${productName}</p>
                        <p class="text-sm text-gray-500">
                            ${isDiscounted ? `<span class="line-through text-red-500">${formatRupiah(originalPrice)}</span>` : ''}
                            ${formatRupiah(productPrice)}
                        </p> 
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <button type="button" onclick="decrementQuantity('${productId}')" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>
                            <input type="text" id="counter-input-${productId}" value="${quantity}" class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" readonly />
                            <button type="button" onclick="incrementQuantity('${productId}')" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                        <button onclick="removeItemFromOrderSummary('${productId}')" class="p-1 bg-transparent rounded hover:bg-red-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6">
                                <path fill="#FF0000" d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z"/>
                            </svg>
                        </button>
                    </div>
                `;
                orderItems.appendChild(productItem);
            });

            const orderSummary = document.getElementById('order-summary');
            orderSummary.classList.toggle('hidden', orderData.length === 0);
        }

        // Fungsi untuk menambah quantity
        function incrementQuantity(productId) {
            const input = document.getElementById(`counter-input-${productId}`);
            let quantity = parseInt(input.value);
            input.value = ++quantity;
            updateQuantity(productId, 'increment');
        }

        // Fungsi untuk mengurangi quantity
        function decrementQuantity(productId) {
            const input = document.getElementById(`counter-input-${productId}`);
            let quantity = parseInt(input.value);
            if (quantity > 1) {
                input.value = --quantity;
                updateQuantity(productId, 'decrement');
            }
        }

        // Fungsi untuk memperbarui kuantitas produk dengan increment/decrement
        function updateQuantity(productId, operation) {
            let orderData = JSON.parse(localStorage.getItem('orderData')) || [];

            orderData = orderData.map(item => {
                if (item.productId === productId) {
                    if (operation === 'increment') {
                        item.quantity += 1;
                    } else if (operation === 'decrement' && item.quantity > 1) {
                        item.quantity -= 1;
                    }
                }
                return item;
            });

            localStorage.setItem('orderData', JSON.stringify(orderData));
            loadOrderItems();
            updateTotalOrder();
            loadProductList();
        }

        // Fungsi untuk menyimpan item ke localStorage
        function saveOrderItemToLocal(productId, productName, productPrice, productImage, quantity) {
            let orderData = JSON.parse(localStorage.getItem('orderData')) || [];
            orderData.push({
                productId,
                productName,
                productPrice,
                productImage,
                quantity
            });
            localStorage.setItem('orderData', JSON.stringify(orderData));
        }

        //Fungsi untuk menutup keranjang belanja tanpa menghapus item
        function closeOrderSummary() {
            document.getElementById('order-summary').classList.add('hidden');
        }

        function checkout() {
            const orderData = JSON.parse(localStorage.getItem('orderData')) || [];

            if (orderData.length === 0) {
                alert('Keranjang belanja Anda kosong!');
                return;
            }

            const total = orderData.reduce((sum, item) => sum + item.productPrice * item.quantity, 0);
            window.location.href =
                `/transaksi-produk?orderData=${encodeURIComponent(JSON.stringify(orderData))}&totalHarga=${total}`;
        }
    </script>
</x-layout>
