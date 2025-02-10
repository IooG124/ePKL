<x-mainTemplate>
    <!-- Header -->
    <div class="flex justify-between items-center border-b pb-4 mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Absensi Karyawan</h1>
        <p class="text-lg text-gray-600">
            Hari ini: <span id="current-date">{{ \Carbon\Carbon::now()->format('d / m / Y') }}</span>
        </p>
    </div>

    <!-- Chart Section -->
    <div class="bg-white p-8 rounded-md shadow-md mb-8">
        @if ($attendances->isEmpty())
            <div class="flex items-center justify-center h-32">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @else
            <div class="relative w-full h-72 sm:h-64 md:h-56">
                <canvas id="barChart" class="w-full"></canvas>
            </div>
        @endif
    </div>

    <!-- Table Section -->
    <div class="bg-white p-6 rounded-md shadow-md">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-[#e2e8f0]">
                <tr>
                    <th class="px-6 py-3 border-b">No</th>
                    <th class="px-6 py-3 border-b">Kondisi</th>
                    <th class="px-6 py-3 border-b">Tanggal</th>
                    <th class="px-6 py-3 border-b">Waktu</th>
                    <th class="px-6 py-3 border-b">Total Jam Kerja</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @php $no = 1; @endphp
                @foreach($attendances as $attendance)
                    <tr>
                        <td class="px-6 py-4 border-b">{{ $no++ }}</td>
                        <td class="px-6 py-4 border-b">{{ $attendance->condition }}</td>
                        <td class="px-6 py-4 border-b">{{ $attendance->login_date->format('d/m/Y') }}</td>
                        <td class="px-6 py-4 border-b">{{ $attendance->login_time->format('H:i') }}</td>
                        <td class="px-6 py-4 border-b">{{ $attendance->total_login_hours ?? '-' }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <!-- ChartJS Configuration -->
    <script>
        const ctx = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($dataChart->pluck('tanggal')),
                datasets: [{
                    label: 'Total Jam Kerja',
                    data: @json($dataChart->pluck('total_jam')),
                    backgroundColor: 'rgba(59, 130, 246, 0.8)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // JavaScript Configuration: Client-Side Date Update
        setInterval(() => {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString('en-GB'); // Update with the correct format
            document.getElementById('current-date').textContent = formattedDate;
        }, 60000); // Update every minute
    </script>
</x-mainTemplate>
