<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Edit Periode PKL</h1>

            <!-- Form for editing an existing period -->
            <form action="{{ route('periode.update', $periode->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="namasiswa" class="block text-gray-700 font-bold">Nama Siswa</label>
                    <input type="text" name="namasiswa" id="namasiswa" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $periode->namasiswa }}" required>
                </div>

                <div class="mb-4">
                    <label for="namadudi" class="block text-gray-700 font-bold">Nama DUDI</label>
                    <input type="text" name="namadudi" id="namadudi" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $periode->namadudi }}" required>
                </div>

                <div class="mb-4">
                    <label for="tanggalmulai" class="block text-gray-700 font-bold">Tanggal Mulai</label>
                    <input type="date" name="tanggalmulai" id="tanggalmulai" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $periode->tanggalmulai }}" required>
                </div>

                <div class="mb-4">
                    <label for="tanggalberakhir" class="block text-gray-700 font-bold">Tanggal Berakhir</label>
                    <input type="date" name="tanggalberakhir" id="tanggalberakhir" class="w-full border border-gray-300 rounded-lg p-2" value="{{ $periode->tanggalberakhir }}" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('periode.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg mr-4">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-mainTemplate>
