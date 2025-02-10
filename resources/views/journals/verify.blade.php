<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <!-- Table Card -->
        <div class="rounded-lg p-6 bg-[#f9fafb] shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Jurnal</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0]">
                        <tr>
                            <th class="px-4 py-3 text-center text-xs">No</th>
                            <th class="px-6 py-3 w-1/6">Nama</th>
                            <th class="px-4 py-3 w-1/12 text-center">NIS</th>
                            <th class="px-6 py-3 w-1/4 text-center">Foto Jurnal</th>
                            <th class="px-6 py-3 w-1/3">Isi Jurnal</th>
                            <th class="px-6 py-3 w-1/6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($journals as $index => $jurnal)
                            
                            <tr class='hover:bg-gray-100 transition-all text-center'>
                                <td class="px-4 py-3">{{ $index + 1 }}</td>
                                <td class="px-6 py-3">{{ $jurnal->nama }}</td>
                                <td class="px-4 py-3">{{ $jurnal->nis }}</td>
                                <td class="px-6 py-3">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset('storage/' . $jurnal->foto) }}" alt="Foto" class="w-16 h-16 rounded-lg object-cover shadow-sm border border-gray-300">
                                    </div>
                                </td>
                                <td class="px-6 py-3">{{ $jurnal->isi }}</td>
                                <td class="px-6 py-3">
                                    <div class="flex justify-center">
                                        @if(!$jurnal->verified)
                                            <form action="{{ route('journals.verify', $jurnal->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-4 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition-all transform hover:scale-105 font-semibold">
                                                    Verifikasi
                                                </button>
                                            </form>
                                        @else
                                            <span class="px-4 py-2 rounded-full bg-green-500 text-white font-semibold">
                                                Terverifikasi
                                            </span>
                                        @endif
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
