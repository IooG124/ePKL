<?php
    // Prevent Caching
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Set timezone to Asia/Makassar (Jakarta time)
    date_default_timezone_set('Asia/Makassar');
    $currentDate = date('d / m / Y'); // Format date as dd / mm / yyyy
?>

<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <!-- Add Journal Button -->
        <div class="flex justify-end mb-6">
            <a href="/Jurnal" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Jurnal
            </a>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6 bg-gray-100 shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Jurnal</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date"><?php echo $currentDate; ?></span>
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
                        <?php 
                            $jurnals = [
                                ["nama" => "Dio", "nis" => "123456", "foto" => "foto1.jpg", "isi" => "Isi jurnal Dio", "verified" => false],
                                ["nama" => "Wika", "nis" => "654321", "foto" => "foto2.jpg", "isi" => "Isi jurnal Wika", "verified" => true],
                            ];
                            if (!empty($jurnals)) {
                                foreach ($jurnals as $index => $jurnal) {
                                    echo "<tr class='hover:bg-gray-100 transition-all text-center'>";
                                    echo "<td class='px-6 py-4 border-b'>" . ($index + 1) . "</td>";
                                    echo "<td class='px-6 py-4 border-b text-left'>{$jurnal['nama']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$jurnal['nis']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>
                                            <div class='flex justify-center'>
                                                <img src='{$jurnal['foto']}' alt='Foto' class='w-16 h-16 rounded-lg object-cover shadow-sm mx-auto'>
                                            </div>
                                          </td>";
                                    echo "<td class='px-6 py-4 border-b text-left'>{$jurnal['isi']}</td>";

                                    // Display the status instead of button
                                    echo "<td class='px-6 py-4 border-b text-center'>";

                                    if ($jurnal['verified']) {
                                        echo "<span class='px-4 py-2 text-sm rounded-full bg-green-500 text-white font-semibold'>Terverifikasi</span>";
                                    } else {
                                        echo "<span class='px-4 py-2 text-sm rounded-full bg-red-500 text-white font-semibold'>Belum Terverifikasi</span>";
                                    }

                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center text-gray-500 py-4'>Tidak ada data jurnal.</td></tr>";
                            }
                        ?>
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
