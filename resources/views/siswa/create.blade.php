<!-- resources/views/siswa/create.blade.php -->
<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-end mb-6">
            <a href="{{ route('siswa') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-gray-600 transition duration-300">
                Kembali
            </a>
        </div>

        <div class="rounded-lg p-6 bg-[#f9fafb] shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Tambah Siswa</h1>

            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold">Nama Siswa</label>
                    <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="mb-4">
                    <label for="nis" class="block text-gray-700 font-bold">NIS</label>
                    <input type="text" id="nis" name="nis" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="mb-4">
                    <label for="kelas" class="block text-gray-700 font-bold">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="mb-4">
                    <label for="jurusan" class="block text-gray-700 font-bold">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-mainTemplate>
