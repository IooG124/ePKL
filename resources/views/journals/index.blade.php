<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <!-- Add Journal Button -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('journals.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Jurnal
            </a>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6 bg-gray-100 shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Jurnal</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date">{{ date('d / m / Y') }}</span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0]">
                        <tr>
                            <th class="px-6 py-4 text-center">No</th>
                            <th class="px-6 py-4">Nama</th>
                            <th class="px-6 py-4">NIS</th>
                            <th class="px-6 py-4">Foto Jurnal</th>
                            <th class="px-6 py-4">Isi Jurnal</th>
                            <th class="px-6 py-4 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($journals as $index => $journal)
                            <tr class="hover:bg-gray-100 transition-all text-center">
                                <td class="px-6 py-4 border-b">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-b text-left">{{ $journal->nama }}</td>
                                <td class="px-6 py-4 border-b">{{ $journal->nis }}</td>
                                <td class="px-6 py-4 border-b">
                                    <div class="flex justify-center">
                                        <img src="{{ Storage::url($journal->foto) }}" alt="Foto" class="w-16 h-16 rounded-lg object-cover shadow-sm mx-auto">
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b text-left">{{ $journal->isi }}</td>
                                <td class="px-6 py-4 border-b text-center">
                                    @if($journal->verified)
                                        <span class="px-4 py-2 text-sm rounded-full bg-green-500 text-white font-semibold">Terverifikasi</span>
                                    @else
                                        <span class="px-4 py-2 text-sm rounded-full bg-red-500 text-white font-semibold">Belum Terverifikasi</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data jurnal.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Function to update the date dynamically every minute
        setInterval(() => {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString('id-ID', {
                day: "2-digit",
                month: "2-digit",
                year: "numeric"
            });
            document.getElementById('current-date').textContent = formattedDate;
        }, 60000); // Update every minute
    </script>
</x-mainTemplate>
