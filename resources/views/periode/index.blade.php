<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <!-- Table Card -->
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Periode PKL</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date">{{ date('d / m / Y') }}</span>
                </p>
                <a href="{{ route('periode.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700">Tambah Periode</a>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs w-1/12 border-b">No</th>
                            <th class="px-6 py-3 w-1/4 border-b">Nama Siswa</th>
                            <th class="px-6 py-3 w-1/4 border-b">Nama DUDI</th>
                            <th class="px-6 py-3 w-1/4 border-b">Tanggal Mulai</th>
                            <th class="px-6 py-3 w-1/4 border-b">Tanggal Berakhir</th>
                            <th class="px-6 py-3 w-1/6 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periodePKL as $index => $periode)
                            <tr class="{{ $index % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} hover:bg-gray-100 transition-all duration-200">
                                <td class="px-6 py-4 text-center border-b">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-b">{{ $periode->namasiswa }}</td>
                                <td class="px-6 py-4 border-b">{{ $periode->namadudi }}</td>
                                <td class="px-6 py-4 border-b">{{ $periode->tanggalmulai }}</td>
                                <td class="px-6 py-4 border-b">{{ $periode->tanggalberakhir }}</td>
                                <td class="px-6 py-4 border-b text-center">
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('periode.edit', $periode->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Edit</a>
                                        <form action="{{ route('periode.destroy', $periode->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mainTemplate>
