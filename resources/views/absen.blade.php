<?php
// Set default timezone (adjust as per your location)
date_default_timezone_set('Asia/Jakarta'); // Change to your timezone if needed

// Contoh data pengguna dan tanggal
$user = [
    'nama' => 'Superadmin',
];

// Get the current date in the correct format
$tanggalHariIni = date('d / m / Y');

// Contoh data dari database (sesuaikan dengan query database Anda)
$dataChart = [
    // ['tanggal' => '19/01/2025', 'total_jam' => 8],
    // ['tanggal' => '20/01/2025', 'total_jam' => 7],
    // ['tanggal' => '21/01/2025', 'total_jam' => 9],
    // ['tanggal' => '22/01/2025', 'total_jam' => 5],
    // ['tanggal' => '23/01/2025', 'total_jam' => 6],
];

// Ekstrak data untuk grafik
$labels = [];
$values = [];
foreach ($dataChart as $data) {
    $labels[] = $data['tanggal'];
    $values[] = $data['total_jam'];
}
?>
<x-mainTemplate>
  <!-- Header -->
  <div class="flex justify-between items-center border-b pb-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($user['nama']); ?></h1>
    <p class="text-sm text-gray-500">Hari ini : <?php echo $tanggalHariIni; ?></p>
  </div>

  <!-- Chart Section -->
  <div class="bg-white p-8 rounded-md shadow-md mb-8">
    <?php if (empty($dataChart)): ?>
      <div class="flex items-center justify-center h-32">
        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
      </div>
    <?php else: ?>
      <div class="relative w-full h-72 sm:h-64 md:h-56"> <!-- Menambahkan tinggi lebih besar -->
        <canvas id="barChart" class="w-full"></canvas>
      </div>
    <?php endif; ?>
  </div>

  <!-- Table Section -->
  <div class="bg-white p-6 rounded-md shadow-md">
    <table class="min-w-full table-auto text-sm text-left text-gray-700">
      <thead class="bg-blue-100">
        <tr>
          <th class="px-6 py-3 border-b">No</th>
          <th class="px-6 py-3 border-b">Tanggal</th>
          <th class="px-6 py-3 border-b">Login Kerja</th>
          <th class="px-6 py-3 border-b">Logout Kerja</th>
          <th class="px-6 py-3 border-b">Bukti Presensi</th>
          <th class="px-6 py-3 border-b">Total Jam Kerja</th>
        </tr>
      </thead>
      <tbody class="bg-white">
        <?php if (empty($dataChart)): ?>
          <tr>
            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Tidak ada data untuk ditampilkan</td>
          </tr>
        <?php else: ?>
          <?php foreach ($dataChart as $index => $data): ?>
            <tr class="hover:bg-blue-50">
              <td class="px-6 py-4 border-b"><?php echo $index + 1; ?></td>
              <td class="px-6 py-4 border-b"><?php echo $data['tanggal']; ?></td>
              <td class="px-6 py-4 border-b">08:00</td> <!-- Contoh data login -->
              <td class="px-6 py-4 border-b">16:00</td> <!-- Contoh data logout -->
              <td class="px-6 py-4 border-b">Ya</td> <!-- Contoh data presensi -->
              <td class="px-6 py-4 border-b"><?php echo $data['total_jam']; ?> Jam</td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- ChartJS Configuration -->
  <script>
    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
          label: 'Total Jam Kerja',
          data: <?php echo json_encode($values); ?>,
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
  </script>
</x-mainTemplate>
