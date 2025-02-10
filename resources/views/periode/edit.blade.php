<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <h1 class="text-3xl font-bold text-[#2d3748] mb-6">Edit Periode PKL</h1>

            <!-- Form for editing an existing period -->
            <form action="{{ route('periode.update', $periode->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Dropdown Nama Siswa (Multiple Selection) -->
                <div class="mb-4">
                    <label for="namasiswa" class="block text-gray-700 font-bold">Nama Siswa</label>
                    <select name="students[]" id="namasiswa" class="w-full border border-gray-300 rounded-lg p-2" multiple required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}"
                                {{ in_array($student->id, $periode->students->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $student->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-gray-500">Gunakan CTRL / CMD untuk memilih lebih dari satu.</small>
                </div>

                <!-- Dropdown Nama DUDI -->
                <div class="mb-4">
                    <label for="namadudi" class="block text-gray-700 font-bold">Nama DUDI</label>
                    <select name="dudi_id" id="namadudi" class="w-full border border-gray-300 rounded-lg p-2" required>
                        <option value="">Pilih DUDI</option>
                        @foreach($dudis as $dudi)
                            <option value="{{ $dudi->id }}"
                                {{ $periode->dudi_id == $dudi->id ? 'selected' : '' }}>
                                {{ $dudi->namadudi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Tanggal Mulai -->
                <div class="mb-4">
                    <label for="tanggalmulai" class="block text-gray-700 font-bold">Tanggal Mulai</label>
                    <input type="date" name="tanggalmulai" id="tanggalmulai" class="w-full border border-gray-300 rounded-lg p-2"
                           value="{{ $periode->tanggalmulai }}" required>
                </div>

                <!-- Input Tanggal Berakhir -->
                <div class="mb-4">
                    <label for="tanggalberakhir" class="block text-gray-700 font-bold">Tanggal Berakhir</label>
                    <input type="date" name="tanggalberakhir" id="tanggalberakhir" class="w-full border border-gray-300 rounded-lg p-2"
                           value="{{ $periode->tanggalberakhir }}" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('periode.index') }}" class="bg-gray-500 text-white py-2 px-6 rounded-lg mr-4">Batal</a>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-mainTemplate>
