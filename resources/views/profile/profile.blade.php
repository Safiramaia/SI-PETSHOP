<x-layout_auth>
    <div class="inset-0 overflow-hidden h-screen flex items-center justify-center p-4 bg-[#E1E9F2]">
        <div class="max-w-3xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header Image Section -->
            <div class="bg-[#295F98] h-32"></div>
            <div class="relative -mt-16 w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white">
                <img src="{{ auth()->user()->foto ? asset('profile/' . auth()->user()->foto) : asset('assets/user-icon-2.png') }}"
                    alt="Foto Profile" class="w-full h-full object-cover">
            </div>

            <!-- User Information Section -->
            <div class="text-center mt-6">
                <h2 class="text-2xl font-bold text-gray-900">{{ auth()->user()->nama }}</h2>
                <p class="text-gray-600">{{ auth()->user()->email }}</p>
            </div>

            <!-- Contact Information Section -->
            <div class="mt-8 flex flex-col justify-center items-center">
                <h3 class="text-lg font-bold text-gray-900">Informasi Kontak</h3>
                <div class="flex flex-row gap-4 mt-4 justify-center">
                    <ul class="text-gray-700 space-y-4 pl-14">
                        <li>
                            <span class="font-bold">Username</span>
                        </li>
                        <li>
                            <span class="font-bold">Jenis Kelamin</span>
                        </li>
                        <li>
                            <span class="font-bold">No Telepon</span>
                        </li>
                        <li>
                            <span class="font-bold">Alamat</span>
                        </li>
                    </ul>
                    <ul class="text-gray-700 space-y-4">
                        <li>
                            <span>{{ auth()->user()->username }}</span>
                        </li>
                        <li>
                            <span>{{ auth()->user()->jenis_kelamin ?? 'Belum diisi' }}</span>
                        </li>
                        <li>
                            <span>{{ auth()->user()->no_telepon ?? 'Belum diisi' }}</span>
                        </li>
                        <li>
                            <span>{{ auth()->user()->alamat ?? 'Belum diisi' }}</span>
                        </li>
                    </ul>
                </div>               
            
                <div class="flex justify-end mt-6 px-6 pb-6">
                    <!-- Kembali Button -->
                    <a href="{{ $redirectUrl }}"
                        class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">Kembali</a>
                    <!-- Edit Profile Button -->
                    <a href="{{ route('profile.edit-profile') }}"
                        class="ml-4 text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit
                        Profile</a>
                </div>
            </div>            
        </div>
        <script>
            @if (session('success'))
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
                    title: 'Berhasil',
                    html: '{{ session('success') }}'
                });
            @endif
        </script>
</x-layout_auth>
