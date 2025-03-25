<x-layout>
    <div class="container mx-auto mt-8 p-4 lg:p-6">
        <!-- Bagian Layanan Grooming Kucing -->
        <h2 class="text-2xl mb-6 font-bold text-[#01143B] text-center" style="font-family: 'Roboto', sans-serif;">
            LAYANAN GROOMING KUCING
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4 mt-10 items-start">
            <!-- Bagian foto grooming -->
            <div
                class="bg-white dark:border-gray-700 dark:bg-gray-800 flex justify-center items-center h-full rounded-lg transition-transform transform hover:scale-105">
                <div class="max-w-lg mb-4 mr-2">
                    <img class="h-full w-full object-cover rounded-lg" src="{{ asset('assets/grooming-kucing.jpg') }}"
                        alt="Grooming Kucing">
                </div>
            </div>

            <!-- Bagian pengertian grooming -->
            <div class="flex flex-col justify-start items-center sm:items-start h-full ml-2">
                <h3 class="text-xl font-bold text-black mb-2">Apa itu Grooming Kucing?</h3>
                <p class="text-gray-700 dark:text-gray-400 text-justify max-w-lg text-lg leading-relaxed">
                    <strong>Grooming kucing</strong> adalah perawatan rutin untuk menjaga kesehatan dan penampilan
                    kucing, termasuk pembersihan kuku, bulu, kulit, dan telinga.
                </p>
                <p class="text-gray-700 dark:text-gray-400 text-justify mt-2 max-w-lg text-lg leading-relaxed">
                    <strong>Fungsi grooming kucing :</strong>
                <p>
                <ol class="list-decimal ml-5">
                    <li class="text-gray-700 dark:text-gray-400 max-w-lg text-lg leading-relaxed">Menghilangkan bakteri,
                        virus, dan jamur yang
                        melekat pada kucing.</li>
                    <li class="text-gray-700 dark:text-gray-400 max-w-lg text-lg leading-relaxed">Mencegah kutu dan
                        tungau yang hidup di luar
                        tubuh kucing.</li>
                    <li class="text-gray-700 dark:text-gray-400 max-w-lg text-lg leading-relaxed">Membantu mencegah
                        penumpukan bulu yang dapat
                        menyebabkan gangguan pencernaan.</li>
                    <li class="text-gray-700 dark:text-gray-400 max-w-lg text-lg leading-relaxed">Mengurangi risiko
                        terjadinya hairball.</li>
                </ol>
                </p>
            </div>
        </div>

        <!-- Grid Jenis Grooming -->
        <div class="flex-1 mt-12 relative">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-2">
                @foreach ($jenisGrooming as $jenis)
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-4 shadow-md hover:shadow-lg transition-shadow flex flex-col h-full relative">
                        <div class="flex-grow">
                            <div class="h-32 mb-2 flex justify-center items-center">
                                @if ($jenis->foto)
                                    <img class="h-32 w-32 object-cover"
                                        src="{{ asset('jenis_grooming/' . $jenis->foto) }}"
                                        alt="{{ $jenis->nama_jenis }}" />
                                @else
                                    <span class="block mb-4 text-center text-gray-500">Tidak ada foto</span>
                                @endif
                            </div>
                            <h3 class="text-sm font-bold text-[#314F2A] ml-2">
                                {{ $jenis->nama_jenis }}
                            </h3>
                            <p class="flex justify-start text-gray-500 font-semibold text-sm mb-2 ml-2">
                                Rp {{ number_format($jenis->harga, 2, ',', '.') }}
                            </p>
                        </div>

                        <div class="flex justify-between items-center mt-auto">
                            <button onclick="openModal('modal-{{ $jenis->id }}')"
                                class="flex items-center text-gray-500 hover:text-gray-900">
                                <svg class="w-7 h-7 mr-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                    <path stroke="currentColor" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </button>

                            <a href="{{ url('grooming/booking-grooming?jenis_id=' . $jenis->id . '&durasi=' . $jenis->durasi) }}"
                                class="inline-flex items-center rounded-lg bg-blue-700 px-2.5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                                <svg class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                                Booking
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal untuk deskripsi -->
            @foreach ($jenisGrooming as $jenis)
                <div id="modal-{{ $jenis->id }}"
                    class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900 bg-opacity-50">
                    <div class="bg-white rounded-lg p-4 max-w-sm w-full mx-auto md:w-1/3 mt-10">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-bold text-[#314F2A]">{{ $jenis->nama_jenis }}</h3>
                        </div>
                        <p class="mt-2 text-justify text-gray-700">{{ $jenis->deskripsi }}</p>
                        <div class="flex justify-end mt-4">
                            <button onclick="closeModal('modal-{{ $jenis->id }}')"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tutup</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tabel Daftar Booking -->
        @if ($grooming->count() > 0)
            <h2 class="text-xl mb-4 font-bold mt-10">Daftar Booking Grooming</h2>
            <div class="overflow-x-auto relative sm:rounded-lg mt-5 shadow-md dark:bg-gray-800">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-center text-sm text-white bg-[#16325B]">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Nama Kucing</th>
                            <th scope="col" class="px-6 py-3">Jenis Grooming</th>
                            <th scope="col" class="px-6 py-3">Tanggal Booking</th>
                            <th scope="col" class="px-6 py-3">Berat Kucing</th>
                            <th scope="col" class="px-6 py-3">Total Harga</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grooming as $index => $groomings)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $index + 1 }}</td>
                                <td class="px-4 py-2 border-r text-black border-gray-200 text-center">
                                    {{ $groomings->nama_kucing }}</td>
                                <td class="px-4 py-2 text-black border-r border-gray-200">
                                    {{ $groomings->jenisGrooming->nama_jenis }}</td>
                                <td class="px-4 py-2 text-black border-r border-gray-200 text-center">
                                    {{ $groomings->tanggal_booking }}</td>
                                <td class="px-4 py-2 text-black border-r border-gray-200 text-center">
                                    {{ $groomings->berat }} Kg</td>
                                <td class="px-4 py-2 text-black border-r border-gray-200 text-center">Rp
                                    {{ number_format($groomings->harga_total, 2, ',', '.') }}</td>
                                <td class="px-4 py-2 text-black border-r border-gray-200 text-center">
                                    {{ $groomings->status }}</td>
                                <td class="px-4 py-2 text-black text-center">
                                    <div class="flex justify-center gap-2">
                                        @if ($groomings->status === 'payment')
                                            <a href="{{ route('grooming.transaksi-grooming', $groomings->id) }}"
                                                class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                Pembayaran
                                            </a>
                                        @elseif ($groomings->status === 'menunggu')
                                            <!-- Tombol Edit untuk status Menunggu -->
                                            <a href="{{ route('grooming.edit-booking', $groomings->id) }}"
                                                class="inline-flex items-center text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    class="w-6 h-6 text-black">
                                                    <path fill="#ffffff"
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                                </svg>
                                            </a>

                                            <!-- Tombol Cancel untuk status Menunggu -->
                                            <form action="{{ route('grooming.cancel', $groomings->id) }}"
                                                method="POST"
                                                onsubmit="return confirmCancel('{{ $groomings->status }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-status="{{ $groomings->status }}"
                                                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                        class="w-5 h-5">
                                                        <path fill="#ffffff"
                                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            <!-- Tombol untuk status selain 'menunggu' -->
                                            <form action="{{ route('grooming.cancel', $groomings->id) }}"
                                                method="POST"
                                                onsubmit="return confirmCancel('{{ $groomings->status }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-status="{{ $groomings->status }}"
                                                    class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                        class="w-5 h-5">
                                                        <path fill="#ffffff"
                                                            d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="mt-4 text-center text-gray-500">
                Belum ada booking grooming.
            </div>
        @endif
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Menutup modal ketika mengklik area luar
        window.onclick = function(event) {
            const modals = document.querySelectorAll('[id^="modal-"]');
            modals.forEach(modal => {
                if (event.target == modal) {
                    closeModal(modal.id);
                }
            });
        }

        function confirmCancel(status) {
            if (status === 'menunggu') {
                return Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Apakah Anda yakin ingin membatalkan booking grooming ini?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#FF0000',
                    cancelButtonColor: '#3085D6',
                    confirmButtonText: "Ya, batalkan!",
                    cancelButtonText: "Tidak"
                }).then((result) => {
                    return result.isConfirmed;
                });
            } else {
                return true; // Tidak ada konfirmasi jika bukan status 'menunggu'
            }
        }

        // SweetAlert untuk notifikasi sukses
        @if (session('status'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: 'Sukses!',
                html: "{{ session('status') }}"
            });
        @endif

        @if (session('message'))
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('message') }}"
            });
        @endif

        //Menampilkan jika pembayaran sukses
        @if (session('toast_success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: '{{ session('toast_success') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    </script>
</x-layout>
