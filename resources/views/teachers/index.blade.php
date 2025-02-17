<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-end mb-6">
            <a href="{{ route('teachers.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Guru
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Guru</h1>
                <p class="text-lg text-gray-600">Hari ini: <span id="current-date">{{ now()->format('d / m / Y') }}</span></p>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs w-1/12">No</th>
                            <th class="px-6 py-3 w-1/4">Username</th>
                            <th class="px-6 py-3 w-1/4">Nama</th>
                            <th class="px-6 py-3 w-1/4">NIP</th>
                            <th class="px-6 py-3 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $index => $teacher)
                            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }} hover:bg-gray-100 transition-all duration-200">
                                <td class="px-6 py-4 text-center">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $teacher->username }}</td>
                                <td class="px-6 py-4">{{ $teacher->name }}</td>
                                <td class="px-6 py-4">{{ $teacher->nip }}</td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center">
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 mr-2">Edit</a>
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">Hapus</button>
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
