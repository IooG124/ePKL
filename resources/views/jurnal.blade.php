<?php
// Simulasi data pengguna yang login
$user = [
    'username' => 'john_doe',
    'nama' => 'John Doe',
];

// Tanggal hari ini
$tanggalHariIni = date('d / m / Y');
?>

<x-mainTemplate>
  <!-- Header -->
  <div class="flex justify-between items-center border-b pb-4 mb-6">
    <h1 class="text-2xl font-bold text-gray-800"><?php echo htmlspecialchars($user['nama']); ?></h1>
    <p class="text-sm text-gray-500">Hari ini : <?php echo $tanggalHariIni; ?></p>
  </div>

  <!-- Formulir -->
  <form method="POST" action="proses_form.php" enctype="multipart/form-data">
    <!-- Input Fields -->
    <div class="grid grid-cols-3 gap-4 mb-6">
      <!-- Nama Kegiatan -->
      <div>
        <label for="nama-kegiatan" class="block text-sm font-medium text-gray-700">Nama Kegiatan</label>
        <input type="text" name="nama_kegiatan" id="nama-kegiatan" 
               placeholder="Masukkan nama kegiatan" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3" 
               required>
      </div>
      
      <!-- Tempat Kegiatan -->
      <div>
        <label for="tempat-kegiatan" class="block text-sm font-medium text-gray-700">Tempat Kegiatan</label>
        <input type="text" name="tempat_kegiatan" id="tempat-kegiatan" 
               placeholder="Masukkan tempat kegiatan" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3" 
               required>
      </div>
      
      <!-- Waktu Kegiatan -->
      <div>
        <label for="waktu-kegiatan" class="block text-sm font-medium text-gray-700">Waktu Kegiatan</label>
        <input type="text" name="waktu_kegiatan" id="waktu-kegiatan" 
               placeholder="Masukkan waktu kegiatan" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3" 
               required>
      </div>
    </div>

    <!-- Laporan Kegiatan -->
    <div class="mb-6">
      <label for="laporan-kegiatan" class="block text-sm font-medium text-gray-700">Laporan Kegiatan</label>
      <textarea name="laporan_kegiatan" id="laporan-kegiatan" rows="5" 
                placeholder="Tulis laporan kegiatan Anda di sini..." 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm px-4 py-3" 
                required></textarea>
    </div>

    <!-- Pilihan File dan Tombol Simpan -->
    <div class="flex items-center justify-between">
      <!-- Pilihan File -->
      <div class="flex items-center space-x-2">
        <label for="file-upload" 
               class="cursor-pointer bg-blue-500 text-white text-sm px-4 py-2 rounded-md shadow hover:bg-blue-600">
          Pilih File
          <input id="file-upload" name="file_kegiatan" type="file" class="hidden">
        </label>
        <span class="text-sm text-gray-500">Opsional</span>
      </div>

      <!-- Tombol Simpan -->
      <button type="submit" 
              class="bg-blue-500 text-white text-sm px-6 py-3 rounded-md shadow hover:bg-blue-600">
        Simpan
      </button>
    </div>
  </form>
</x-mainTemplate>
