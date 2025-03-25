<x-layout_admin>
    <div class="p-4 sm:ml-30 md:ml-6 pt-4">
        <!-- Layout Informasi -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 p-2">
            <!-- Produk Selesai Transaksi -->
            <a href="{{ route('admin.data-pembelian-produk') }}"
                class="p-4 border border-gray-100 rounded-lg bg-purple-50 transition-transform transform hover:scale-105">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-10 h-10 text-gray-500 mr-3"
                        style="fill: #6B7280;">
                        <path
                            d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Selesai Transaksi</h3>
                        <p class="text-lg font-medium text-blue-500">{{ $totalTransaksiProduk }} produk</p>
                    </div>
                </div>
            </a>

            <!-- Pemesanan Grooming -->
            <a href="{{ route('admin.pemesanan-grooming') }}"
                class="p-4 border border-gray-100 rounded-lg bg-purple-50 transition-transform transform hover:scale-105">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="w-10 h-10 text-gray-500 mr-3"
                        style="fill: #6B7280;">
                        <path
                            d="M192 0c-41.8 0-77.4 26.7-90.5 64L64 64C28.7 64 0 92.7 0 128L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64l-37.5 0C269.4 26.7 233.8 0 192 0zm0 64a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM72 272a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm104-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zM72 368a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zm88 0c0-8.8 7.2-16 16-16l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16z" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Pemesanan Grooming</h3>
                        <p class="text-lg font-medium text-blue-500">{{ $totalGrooming }} pemesanan</p>
                    </div>
                </div>
            </a>

            <!-- Jumlah Pengguna -->
            <a href="{{ route('admin.data-pelanggan') }}"
                class="p-4 border border-gray-100 rounded-lg bg-purple-50 transition-transform transform hover:scale-105">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="w-10 h-10 text-gray-500 mr-3" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Jumlah Pengguna</h3>
                        <p class="text-lg font-medium text-blue-500">{{ $totalPengguna }} pengguna</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Grid Untuk Grafik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2 p-2">
            <!-- Kolom 1: Laporan Keuntungan -->
            <div class="flex flex-col justify-between border border-gray-100 bg-purple-50 rounded-lg">
                <div class="w-full bg-gray-50 dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-12 h-12 dark:bg-gray-700 flex items-center justify-center me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-10 h-10">
                                    <path fill="#000000"
                                        d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Laporan Keuntungan
                                    Produk</h3>
                                <select id="jenis-laporan" class="mt-2 mb-4 p-2 border rounded w-full md:w-auto"
                                    onchange="updateKeuntungan()">
                                    <option value="harian">Harian</option>
                                    <option value="mingguan">Mingguan</option>
                                    <option value="bulanan">Bulanan</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Informasi Keuntungan -->
                    <div id="laporan-keuntungan" class="mb-4">
                        <p id="keuntungan-harian" class="text-lg font-medium">Keuntungan Harian : <span
                                class="text-green-600">Rp
                                {{ number_format(array_sum($keuntungan['harian']), 2, ',', '.') }}</span></p>
                        <p id="keuntungan-mingguan" class="hidden text-lg font-medium">Keuntungan Mingguan : <span
                                class="text-green-600">Rp
                                {{ number_format(array_sum($keuntungan['mingguan']), 2, ',', '.') }}</span></p>
                        <p id="keuntungan-bulanan" class="hidden text-lg font-medium">Keuntungan Bulanan : <span
                                class="text-green-600">Rp
                                {{ number_format(array_sum($keuntungan['bulanan']), 2, ',', '.') }}</span></p>
                    </div>

                    <!-- Chart untuk tampilan keuntungan -->
                    <div class="flex justify-center">
                        <canvas id="keuntunganChart" class="w-full max-w-md sm:max-w-lg h-54 sm:h-20"></canvas>
                    </div>
                </div>
            </div>

            <!-- Kolom 2: Produk Terfavorit -->
            <div class="p-2 flex flex-col justify-between border border-gray-100 bg-purple-50 rounded-lg">
                <div class="w-full bg-gray-50 dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-2 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-12 h-12 dark:bg-gray-700 flex items-center justify-center me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-10 h-10">
                                    <path fill="#FFD43B"
                                        d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Produk Terfavorit</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik Produk Terfavorit -->
                    <div class="flex justify-center">
                        <canvas id="produkFavoritChart" class="w-full max-w-sm h-10 sm:h-20"></canvas>
                    </div>
                </div>
            </div>

            <!-- Kolom 3: Paket Grooming Terlaris -->
            <div class="p-2 flex flex-col justify-between border border-gray-100 bg-gray-50 rounded-lg">
                <div class="w-full bg-gray-50 dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-4 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <div class="w-12 h-12 dark:bg-gray-700 flex items-center justify-center me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" class="w-10 h-10">
                                    <path
                                        d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Paket Grooming Terlaris</h3>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Grooming Terlaris -->
                    <div class="flex justify-center">
                        <canvas id="groomingTerlarisChart" class="w-full max-w-md sm:max-w-lg h-54 sm:h-20"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Inisialisasi Chart.js untuk keuntungan
        const ctx = document.getElementById('keuntunganChart').getContext('2d');

        // Ambil data keuntungan harian, mingguan, dan bulanan dari PHP
        const labelsHarian = {!! json_encode($labels_harian) !!};
        const dataKeuntunganHarian = {!! json_encode(array_values($keuntungan['harian'])) !!};
        const labelsMingguan = {!! json_encode(array_keys($keuntungan['mingguan'])) !!};
        const dataKeuntunganMingguan = {!! json_encode(array_values($keuntungan['mingguan'])) !!};
        const labelsBulanan = {!! json_encode(array_keys($keuntungan['bulanan'])) !!};
        const dataKeuntunganBulanan = {!! json_encode(array_values($keuntungan['bulanan'])) !!};

        const keuntunganChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labelsHarian,
                datasets: [{
                    label: 'Keuntungan',
                    data: dataKeuntunganHarian,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    barThickness: 30,
                    categoryPercentage: 0.5,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Fungsi untuk update chart berdasarkan pilihan laporan (harian, mingguan, bulanan)
        function updateKeuntungan() {
            const laporanSelect = document.getElementById('jenis-laporan');
            const laporan = laporanSelect.value;

            document.getElementById('keuntungan-harian').classList.add('hidden');
            document.getElementById('keuntungan-mingguan').classList.add('hidden');
            document.getElementById('keuntungan-bulanan').classList.add('hidden');

            if (laporan === 'harian') {
                document.getElementById('keuntungan-harian').classList.remove('hidden');
                updateChartData(labelsHarian, dataKeuntunganHarian);
            } else if (laporan === 'mingguan') {
                document.getElementById('keuntungan-mingguan').classList.remove('hidden');
                updateChartData(labelsMingguan, dataKeuntunganMingguan);
            } else if (laporan === 'bulanan') {
                document.getElementById('keuntungan-bulanan').classList.remove('hidden');
                updateChartData(labelsBulanan, dataKeuntunganBulanan);
            }
        }

        // Update data chart dengan label dan data baru
        function updateChartData(labels, data) {
            keuntunganChart.data.labels = labels;
            keuntunganChart.data.datasets[0].data = data;
            keuntunganChart.update();
        }

        // Chart Produk Terfavorit
        document.addEventListener('DOMContentLoaded', function() {
            const ctxPie = document.getElementById('produkFavoritChart').getContext('2d');

            // Ambil nama produk dan data favorit dari PHP
            const produkNames = {!! json_encode($produkNames) !!};
            const produkFavoritData = {!! json_encode($produkFavorit) !!};

            // Siapkan data untuk grafik
            const labelsProduk = produkFavoritData.map(item => produkNames[item.id_produk]);
            const dataFavorit = produkFavoritData.map(item => item.total_favorit);

            // Total favorit untuk menghitung persentase
            const totalFavorit = dataFavorit.reduce((acc, val) => acc + val, 0);

            // Atur ukuran canvas chart
            ctxPie.canvas.width = 20;
            ctxPie.canvas.height = 20;

            // Inisialisasi chart
            new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: labelsProduk,
                    datasets: [{
                        data: dataFavorit,
                        backgroundColor: ['#4379F2', '#FFE31A', '#FF1E00', '#2FD426', '#CF3AE0'],
                        hoverBackgroundColor: ['#4379F2', '#FFE31A', '#FF1E00', '#2FD426',
                            '#CF3AE0'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                font: {
                                    size: 12,
                                    family: 'Arial',
                                },
                                color: '#333',
                                padding: 10,
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const percentage = (tooltipItem.raw / totalFavorit * 100).toFixed(
                                        2);
                                    return `${tooltipItem.label}: ${tooltipItem.raw} favorit (${percentage}%)`;
                                }
                            }
                        },
                        datalabels: {
                            formatter: function(value) {
                                const percentage = (value / totalFavorit * 100).toFixed(2);
                                return `${percentage}%`;
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold',
                                size: 14
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels] // Daftarkan plugin datalabels
            });
        });

        // Chart Untuk Grooming Terlaris
        const groomingTerlarisData = @json($groomingTerlaris);
        const jenisGroomingNames = @json($jenisGroomingNames);

        const labelsGrooming = groomingTerlarisData.map(item => jenisGroomingNames[item.id_jenis] || 'Tidak Ditemukan');
        const dataGrooming = groomingTerlarisData.map(item => item.jumlah);

        const ctxGrooming = document.getElementById('groomingTerlarisChart').getContext('2d');
        new Chart(ctxGrooming, {
            type: 'bar',
            data: {
                labels: labelsGrooming,
                datasets: [{
                    label: 'Paket Grooming Terlaris',
                    data: dataGrooming,
                    backgroundColor: 'rgba(34, 197, 94, 0.2)', // Hijau terang
                    borderColor: 'rgba(34, 197, 94, 1)', // Hijau gelap
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });

        // Menampilkan pesan sukses login jika ada
        @if (session('loginSuccess'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('loginSuccess') }}",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        @endif
    </script>
</x-layout_admin>
