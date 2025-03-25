<x-layout_admin>
    <div class="mx-4 lg:mx-10 max-w-screen-2xl mt-8">
        <!-- Search Data -->
        <div class="w-full md:w-1/3 ml-auto">
            <label for="user-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="text" id="user-search"
                    class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 
                              focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 
                              dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    placeholder="Cari Pengguna">
            </div>
        </div>

        <!-- Table Data Pengguna -->
        <div class="overflow-x-auto relative sm:rounded-lg mt-5 shadow-md dark:bg-gray-800">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center text-sm text-white bg-[#16325B]">
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Username</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Jenis Kelamin</th>
                        <th scope="col" class="px-6 py-3">No Telepon</th>
                        <th scope="col" class="px-6 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        @if ($user->role === 'pelanggan')
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->nama }}
                                </td>
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->username }}
                                </td>
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->jenis_kelamin }}
                                </td>
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->no_telepon }}
                                </td>
                                <td class="px-4 py-2 text-center text-black border-r border-gray-200">
                                    {{ $user->alamat }}
                                </td>
                                <td class="px-4 py-2 text-center border-r border-gray-200">
                                    <img src="{{ asset('profile/' . $user->foto) }}" alt="Foto {{ $user->nama }}" class="h-12 w-12 rounded-full mx-auto">
                                </td>                                
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500">
                                Tidak ada data pengguna
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pesan jika data tidak ditemukan -->
            <p id="no-data-message" class="text-center mt-4 text-red-500" style="display: none;">Data tidak ditemukan
            </p>

            <!-- Pagination -->
            <div class="flex justify-between items-center px-4 py-3 bg-white border-t border-gray-200 dark:bg-gray-800">
                <div class="text-sm text-gray-800 dark:text-white font-bold">
                    Menampilkan {{ $users->where('role', 'pelanggan')->count() }} data pengguna
                </div>
                <div>
                    {{ $users->links('components.pagination') }}
                </div>
            </div>
        </div>

        <script>
            document.getElementById("user-search").addEventListener("keyup", function() {
                var value = this.value.toLowerCase();
                var rows = document.querySelectorAll("table tbody tr");
                var found = false;

                rows.forEach(function(row) {
                    var nama = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                    var username = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                    if (nama.includes(value) || username.includes(value)) {
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
    </div>
</x-layout_admin>
