<x-layout_auth>
    <div class="inset-0 overflow-hidden h-screen flex items-center justify-center p-4 bg-[#E1E9F2]">
        <div class="max-w-3xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Header Image Section -->
            <div class="bg-[#295F98] h-28"></div>
            <div class="relative -mt-16 w-32 h-32 mx-auto rounded-full overflow-hidden border-4 border-white">
                <img src="{{ auth()->user()->foto ? asset('profile/' . auth()->user()->foto) : asset('assets/user-icon.png') }}"
                    alt="Foto Profil" class="w-full h-full object-cover foto-profil">
            </div>

            <!-- Edit Profile Section -->
            <div class="text-center mt-6">
                <h2 class="text-2xl font-semibold text-gray-800">Edit Profile</h2>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data"
                class="mt-6 mb-4 px-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username"
                            value="{{ old('username', auth()->user()->username) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama"
                            value="{{ old('nama', auth()->user()->nama) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email"
                            value="{{ old('email', auth()->user()->email) }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="mb-4">
                        <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon"
                            value="{{ old('no_telepon', auth()->user()->no_telepon) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="Laki-laki"
                                {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan"
                                {{ old('jenis_kelamin', auth()->user()->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Ganti Foto Profil</label>
                        <input type="file" name="foto" id="foto" accept="image/*"
                            class="mt-1 block w-full border-gray-500 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>
                </div>

                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                </div>

                <div class="flex justify-end mt-6 px-6 pb-6">
                    <div class="flex justify-between mt-6">
                        <a href="{{ route('profile.profile') }}"
                            class="text-white bg-gray-600 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:focus:ring-gray-800 font-medium rounded-lg text-sm px-5 py-2.5">Kembali</a>

                        <button type="submit"
                            class="ml-4 text-white inline-flex items-center bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Perbarui
                            Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Ambil elemen input file dan gambar profil
        const fotoInput = document.getElementById('foto');
        const fotoProfil = document.querySelector('.foto-profil'); 

        fotoInput.addEventListener('change', function(event) {
            const file = event.target.files[0];

            if (file) {
                // Buat URL objek untuk gambar yang dipilih
                const objectURL = URL.createObjectURL(file);

                // Set gambar profil dengan URL objek tersebut
                fotoProfil.src = objectURL;
            }
        });
    </script>
</x-layout_auth>
