<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr class="text-left">
                            <th class="px-6 py-3 text-xs">No</th>
                            <th class="px-6 py-3 w-1/4">Nama DUDI</th>
                            <th class="px-6 py-3 w-1/4">Lokasi</th>
                            <th class="px-6 py-3 w-1/4">Contact Person</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dudis as $index => $dudi)
                            <tr class="hover:bg-gray-100 transition-all text-left">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">{{ $dudi->namadudi }}</td>
                                <td class="px-6 py-4">{{ $dudi->lokasi }}</td>
                                <td class="px-6 py-4">{{ $dudi->contactperson }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mainTemplate>
