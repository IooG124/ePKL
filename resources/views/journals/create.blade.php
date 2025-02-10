<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Tambah Jurnal</h1>

        <form action="{{ route('journals.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="nis" class="block text-gray-700">NIS</label>
                <input type="text" id="nis" name="nis" class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="foto" class="block text-gray-700">Foto Jurnal</label>
                <input type="file" id="foto" name="foto" class="mt-2 p-2 w-full border border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="isi" class="block text-gray-700">Isi Jurnal</label>
                <textarea id="isi" name="isi" class="mt-2 p-2 w-full border border-gray-300 rounded-md" rows="4" required></textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg">Simpan Jurnal</button>
            </div>
        </form>
    </div>
</x-mainTemplate>
