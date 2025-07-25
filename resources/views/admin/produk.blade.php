<x-layout_admin>
    <div class="mx-4 lg:mx-10 max-w-screen-2xl mt-8">
        <div
            class="relative bg-white shadow-md dark:bg-gray-400 sm:rounded-lg border-t border-gray-200 dark:border-gray-300">
            <div
                class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4 sm:rounded-lg">
                <div
                    class="flex flex-col items-stretch justify-start flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                    <button data-modal-target="tambahModal" data-modal-toggle="tambahModal"
                        class="block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah Produk
                    </button>
                    <!-- Main Modal Tambah -->
                    <div id="tambahModal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-2xl max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <!-- Header Modal -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Produk
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="tambahModal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>

                                <!-- Form Tambah Produk -->
                                <form action="{{ route('produk.store') }}" method="POST"
                                    class="p-6 md:p-8 bg-white rounded-lg shadow-md" id="tambahForm"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                                        <div class="flex flex-col">
                                            <label for="nama_produk"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                Produk</label>
                                            <input type="text" name="nama_produk" id="nama_produk"
                                                placeholder="Masukkan nama produk"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required />
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="id_kategori"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                                            <select name="id_kategori" id="id_kategori"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($kategoriProduk as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="flex flex-col col-span-1 md:col-span-2">
                                            <label for="deskripsi_produk"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                                                Produk</label>
                                            <textarea name="deskripsi_produk" id="deskripsi_produk" rows="4"
                                                placeholder="Masukkan deskripsi produk"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required></textarea>
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="harga_beli"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Beli</label>
                                            <div class="flex items-center">
                                                <input type="number" name="harga_beli" id="harga_beli" placeholder="Contoh: 80000"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="harga_jual"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Jual</label>
                                            <div class="flex items-center">
                                                <input type="number" name="harga_jual" id="harga_jual" placeholder="Contoh: 80000"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required />
                                            </div>
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="diskon"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Diskon (%)</label>
                                            <input type="number" name="diskon" id="diskon"
                                                placeholder="Masukkan diskon (contoh: 10)"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="stok"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stok</label>
                                            <input type="number" name="stok" id="stok"
                                                placeholder="Masukkan jumlah stok"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required />
                                        </div>

                                        <div class="flex flex-col">
                                            <label for="foto"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto
                                                Produk</label>
                                            <input type="file" name="foto" id="foto"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-6">
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Simpan Data
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search data -->
                <div class="w-full md:w-1/3">
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
                            class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Cari Data">
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Data -->
        <div class="overflow-x-auto relative sm:rounded-lg mt-5 shadow-md dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-sm text-white bg-[#16325B]">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">Kategori</th>
                        <th scope="col" class="px-6 py-3">Deskripsi</th>
                        <th scope="col" class="px-6 py-3">Stok</th>
                        <th scope="col" class="px-6 py-3">Harga Beli</th>
                        <th scope="col" class="px-6 py-3">Harga Jual</th>
                        <th scope="col" class="px-6 py-3">Diskon</th>
                        <th scope="col" class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $index => $produk)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-r border-gray-200">{{ $produk->nama_produk }}</td>
                            <td class="px-4 py-2 border-r border-gray-200 flex justify-center items-center">
                                @if ($produk->foto)
                                    <img src="{{ asset('produk/' . $produk->foto) }}" alt="{{ $produk->nama_produk }}"
                                        class="w-20 h-20 object-cover">
                                @else
                                    <span>Tidak ada foto</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border-r border-gray-200">{{ $produk->kategoriProduk->nama_kategori }}</td>
                            <td class="px-4 py-2 border-r border-gray-200">{{ $produk->deskripsi_produk }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">{{ $produk->stok }}</td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">Rp
                                {{ number_format($produk->harga_beli, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">Rp
                                {{ number_format($produk->harga_jual, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">
                                {{ number_format($produk->diskon, 0) }}%
                            </td>
                            <td class="px-4 py-2 text-center border-r border-gray-200">
                                <!-- Modal Edit -->
                                <button data-modal-target="editModal{{ $produk->id }}"
                                    data-modal-toggle="editModal{{ $produk->id }}"
                                    class="inline-flex mr-2 items-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800"
                                    type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-6 h-6 text-black">
                                        <path fill="#ffffff"
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                    </svg>
                                </button>
                                <!-- Main Modal Edit -->
                                <div id="editModal{{ $produk->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Produk
                                                </h3>
                                            </div>
                                            <form id="editForm" action="{{ route('produk.update', $produk->id) }}"
                                                method="POST" class="p-4 md:p-5" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="grid gap-4 mb-4">
                                                    <div class="col-span-2 flex">
                                                        <label for="nama_produk"
                                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Nama
                                                            Produk</label>
                                                        <input type="text" name="nama_produk" id="nama_produk"
                                                            value="{{ $produk->nama_produk }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="id_kategori"
                                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Kategori</label>
                                                        <select name="id_kategori" id="kategori_id{{ $produk->id }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            @foreach ($kategoriProduk as $kategori)
                                                                <option value="{{ $kategori->id }}" {{ $produk->id_kategori == $kategori->id ? 'selected' : '' }}>
                                                                    {{ $kategori->nama_kategori }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="deskripsi_produk"
                                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Deskripsi</label>
                                                        <textarea name="deskripsi_produk" id="deskripsi_produk" rows="4"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ $produk->deskripsi_produk }}</textarea>
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="harga_beli"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Harga Beli</label>
                                                        <div class="flex items-center w-full">
                                                            <input type="text" name="harga_beli" id="harga_beli"
                                                                value="{{ $produk->harga_beli }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="harga_jual"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Harga Jual</label>
                                                        <div class="flex items-center w-full">
                                                            <input type="text" name="harga_jual" id="harga_jual"
                                                                value="{{ $produk->harga_jual }}"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                        </div>
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="diskon"
                                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">
                                                            Diskon (%)</label>
                                                        <input type="number" name="diskon" id="diskon"
                                                            value="{{ $produk->diskon }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="stok"
                                                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Stok</label>
                                                        <input type="number" name="stok" id="stok"
                                                            value="{{ $produk->stok }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                                    </div>
                                                    <div class="col-span-2 flex">
                                                        <label for="foto"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mr-4 w-1/3">Foto</label>
                                                        <div class="relative flex items-center w-full">
                                                            @if($produk->foto)
                                                                <img id="preview" src="{{ asset('produk/' . $produk->foto) }}"
                                                                    alt="{{ $produk->nama_produk }}"
                                                                    class="w-full h-auto object-contain rounded-lg border border-gray-300 dark:border-gray-600 mb-2"
                                                                    style="max-height: 200px;">
                                                            @else
                                                                <img id="preview"
                                                                    class="w-full h-auto object-contain rounded-lg border border-gray-300 dark:border-gray-600 mb-2 hidden"
                                                                    style="max-height: 200px;">
                                                            @endif
                                                            <input type="file" name="foto" id="foto"
                                                                onchange="previewImage(event)"
                                                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end mt-4">
                                                    <button data-modal-hide="editModal{{ $produk->id }}" type="submit"
                                                        class="text-white inline-flex items-center bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                                        Ubah Data
                                                    </button>
                                                    <button onclick="closeModal('editModal{{ $produk->id }}')" type="button"
                                                        class="ml-4 text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                                        Batal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Hapus -->
                                <button onclick="openDeleteModal('{{ $produk->id }}')"
                                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 h-6">
                                        <path fill="#ffffff"
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                                <!-- Modal Hapus -->
                                <div id="deleteModal" tabindex="-1" aria-hidden="true"
                                    class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50 overflow-y-auto overflow-x-hidden">
                                    <div class="relative w-full max-w-md p-4 max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div class="p-4 md:p-5 text-center">
                                                <div
                                                    class="flex items-center justify-center p-4 md:p-2 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white"
                                                        id="deleteModalLabel">
                                                        Konfirmasi Hapus
                                                    </h3>
                                                </div>

                                                <h3 class="mb-5 text-lg text-gray-500 dark:text-gray-400">
                                                    Apakah Anda yakin ingin menghapus produk ini?
                                                </h3>

                                                <form id="deleteForm" action="{{ route('produk.destroy', $produk->id) }}"
                                                    method="POST" class="inline-flex items-center">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                                        Hapus
                                                    </button>
                                                </form>
                                                <button onclick="closeModal('deleteModal')" type="button"
                                                    class="ml-4 text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
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
                    Showing {{ $produks->firstItem() ?? 0 }} to {{ $produks->lastItem() ?? 0 }} of
                    {{ $produks->total() }} data
                </div>
                <div>
                    {{ $produks->links('components.pagination') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function openEditModal(id, namaProduk, deskripsiProduk, harga_beli, harga_jual, diskon, stok, foto) {
            const modal = document.getElementById(`editModal${id}`);
            modal.classList.remove('hidden');

            document.getElementById('nama_produk').value = namaProduk;
            document.getElementById('kategori_id').value = kategori_id;
            document.getElementById('deskripsi_produk').value = deskripsiProduk;
            document.getElementById('harga_beli').value = harga_beli;
            document.getElementById('harga_jual').value = harga_jual;
            document.getElementById('diskon').value = diskon;
            document.getElementById('stok').value = stok;

            const editForm = document.getElementById(`editForm${id}`);
            editForm.action = `/admin/produk/${id}`;
        }

        // Fungsi untuk pratinjau gambar
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }

        function openDeleteModal(id) {
            const form = document.getElementById('deleteForm');
            form.action = `/admin/produk/${id}`;

            const deleteModal = document.getElementById('deleteModal');
            deleteModal.classList.remove('hidden');
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.add('hidden');
                document.body.classList.add('pointer-events-none');

                setTimeout(() => {
                    document.body.classList.remove('pointer-events-none');
                }, 100);
            }
        }
        
        document.getElementById("simple-search").addEventListener("keyup", function () {
            var value = this.value.toLowerCase();
            var rows = document.querySelectorAll("table tbody tr");
            var found = false;

            rows.forEach(function (row) {
                var namaProduk = row.querySelector("td:nth-child(2)").textContent.toLowerCase();
                if (namaProduk.includes(value)) {
                    row.style.display = "";
                    found = true;
                } else {
                    row.style.display = "none";
                }
            });
            // Jika tidak ada data yang ditemukan, tampilkan pesan "Data tidak ditemukan"
            var noDataMessage = document.getElementById("no-data-message");
            if (!found) {
                noDataMessage.style.display = "block";
            } else {
                noDataMessage.style.display = "none";
            }
        });
    </script>
</x-layout_admin>