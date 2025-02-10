<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Tambah Periode PKL</h1>

            <!-- Form for creating a new period -->
            <form action="{{ route('periode.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="namasiswa" class="block text-gray-700 font-bold">Nama Siswa</label>
                    <!-- Dropdown for Students -->
                    <select name="namasiswa" id="namasiswa" class="w-full border border-gray-300 rounded-lg p-2" required>
                        <option value="">Pilih Siswa</option>
                        @foreach($students as $student)
                            <option value="{{ $student->name }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="namadudi" class="block text-gray-700 font-bold">Nama DUDI</label>
                    <input type="text" name="namadudi" id="namadudi" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggalmulai" class="block text-gray-700 font-bold">Tanggal Mulai</label>
                    <input type="date" name="tanggalmulai" id="tanggalmulai" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggalberakhir" class="block text-gray-700 font-bold">Tanggal Berakhir</label>
                    <input type="date" name="tanggalberakhir" id="tanggalberakhir" class="w-full border border-gray-300 rounded-lg p-2" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('periode.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg mr-4">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Tambah Periode</button>
                </div>
            </form>
        </div>
    </div>
</x-mainTemplate>
