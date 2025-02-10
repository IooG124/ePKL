<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar DUDI</h1>
                <a href="{{ route('dudi.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">+ Tambah DUDI</a>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs">No</th>
                            <th class="px-6 py-3 w-1/4">Nama DUDI</th>
                            <th class="px-6 py-3 w-1/4">Lokasi</th>
                            <th class="px-6 py-3 w-1/4">Contact Person</th>
                            <th class="px-6 py-3 w-1/4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dudis as $index => $dudi)
                            <tr class="hover:bg-gray-100 transition-all text-center">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $dudi->namadudi }}</td>
                                <td class="px-6 py-4">{{ $dudi->lokasi }}</td>
                                <td class="px-6 py-4">{{ $dudi->contactperson }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('dudi.edit', $dudi->id) }}" class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600">Edit</a>
                                    <form action="{{ route('dudi.destroy', $dudi->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mainTemplate>
