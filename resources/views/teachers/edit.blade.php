<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Edit Guru</h1>

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT untuk update -->

            <!-- Nama Guru -->
            <div class="mb-4">
                <label for="nama_guru" class="block text-gray-700 font-bold">Nama Guru</label>
                <input type="text" name="nama" id="nama_guru" value="{{ old('nama', $teacher->nama) }}"
                    class="w-full border border-gray-300 rounded-lg p-2" required>
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- NIP -->
            <div class="mb-4">
                <label for="NIP" class="block text-gray-700 font-bold">NIP</label>
                <input type="text" name="nip" id="NIP" value="{{ old('nip', $teacher->nip) }}"
                    class="w-full border border-gray-300 rounded-lg p-2" required>
                @error('nip')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold">Username</label>
                <input type="text" name="username" id="username" value="{{ old('username', $teacher->username) }}"
                    class="w-full border border-gray-300 rounded-lg p-2" required>
                @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold">Password (Kosongkan jika tidak ingin mengganti)</label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 rounded-lg p-2">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $teacher->alamat) }}"
                    class="w-full border border-gray-300 rounded-lg p-2" required>
                @error('alamat')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Telepon -->
            <div class="mb-4">
                <label for="telepon" class="block text-gray-700 font-bold">No Telepon</label>
                <input type="text" name="telepon" id="telepon" value="{{ old('telepon', $teacher->telepon) }}"
                    class="w-full border border-gray-300 rounded-lg p-2" required>
                @error('telepon')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('teachers.index') }}" class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</a>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Perbarui Guru</button>
            </div>
        </form>
    </div>
</x-mainTemplate>
