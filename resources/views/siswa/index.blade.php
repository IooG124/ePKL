<!-- resources/views/siswa/index.blade.php -->
<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="rounded-lg p-6 bg-[#f9fafb] shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Siswa</h1>
                <p class="text-lg text-[#4a5568]">Hari ini: <span id="current-date">{{ now()->format('d / m / Y') }}</span></p>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center w-1/12 text-xs">No</th>
                            <th class="px-6 py-3 w-1/6">Nama Siswa</th>
                            <th class="px-6 py-3 w-1/6">NIS</th>
                            <th class="px-6 py-3 w-1/6">Kelas</th>
                            <th class="px-6 py-3 w-1/6">Jurusan</th>
                            <th class="px-6 py-3 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        @forelse ($students as $index => $student)
                        <tr class="bg-gray-50 hover:bg-gray-100 transition-all duration-200">
                            <td class="px-6 py-4 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->nis }}</td>
                            <td class="px-6 py-4">{{ $student->kelas }}</td>
                            <td class="px-6 py-4">{{ $student->jurusan }}</td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex space-x-2 justify-center">
                                    <form action="{{ route('siswa.destroy', $student->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data siswa.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mainTemplate>
