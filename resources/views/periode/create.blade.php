<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Tambah Periode PKL</h1>

            <!-- Form for creating a new period -->
            <form action="{{ route('periode.store') }}" method="POST">
                @csrf

                <!-- Dropdown untuk Multiple Siswa -->
                <div class="mb-4">
                    <label for="namasiswa" class="block text-gray-700 font-bold">Nama Siswa</label>
                    <select name="namasiswa[]" id="namasiswa" multiple class="w-full border border-gray-300 rounded-lg p-2" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }} - {{ $student->nis }}</option>
                        @endforeach
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Tekan Ctrl (Windows) atau Command (Mac) untuk memilih lebih dari satu siswa.</p>
                </div>

                <!-- Dropdown untuk DUDI -->
                <div class="mb-4">
                    <label for="namadudi" class="block text-gray-700 font-bold">Nama DUDI</label>
                    <select name="namadudi" id="namadudi" class="w-full border border-gray-300 rounded-lg p-2" required>
                        <option value="">Pilih DUDI</option>
                        @foreach($dudis as $dudi)
                            <option value="{{ $dudi->id }}">{{ $dudi->namadudi }}</option>
                        @endforeach
                    </select>
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
