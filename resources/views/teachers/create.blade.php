<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold mb-6">Tambah Guru</h1>

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700 font-bold">Nama Guru</label>
                <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label for="nip" class="block text-gray-700 font-bold">NIP</label>
                <input type="text" name="nip" id="nip" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label for="username" class="block text-gray-700 font-bold">Username</label>
                <input type="text" name="username" id="username" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold">Password</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="mb-4">
                <label for="telepon" class="block text-gray-700 font-bold">No Telepon</label>
                <input type="text" name="telepon" id="telepon" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Tambah Guru</button>
            </div>
        </form>
    </div>
</x-mainTemplate>
