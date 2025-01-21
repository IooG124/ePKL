<?php
    // Prevent Caching
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <!-- Add Journal Button -->
        <div class="flex justify-end mb-6">
            <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Jurnal
            </button>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Jurnal</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-left text-gray-900 border-collapse rounded-lg">
                    <thead class="text-black">
                        <tr>
                            <th class="px-8 py-5 border-b">No</th>
                            <th class="px-8 py-5 border-b">Nama</th>
                            <th class="px-8 py-5 border-b">NIS</th>
                            <th class="px-8 py-5 border-b">Foto Jurnal</th>
                            <th class="px-8 py-5 border-b">Isi Jurnal</th>
                            <th class="px-8 py-5 border-b">Aktivitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $jurnals = [
                                // ["nama" => "Budi", "nis" => "12345", "foto" => "foto1.jpg", "isi" => "Isi jurnal Budi", "verified" => false],
                                // ["nama" => "Ani", "nis" => "67890", "foto" => "foto2.jpg", "isi" => "Isi jurnal Ani", "verified" => true],
                            ];
                            if (!empty($jurnals)) {
                                foreach ($jurnals as $index => $jurnal) {
                                    echo "<tr class='hover:bg-gray-50 transition-all'>";
                                    echo "<td class='px-8 py-5 border-b font-medium text-center'>" . ($index + 1) . "</td>";
                                    echo "<td class='px-8 py-5 border-b'>{$jurnal['nama']}</td>";
                                    echo "<td class='px-8 py-5 border-b'>{$jurnal['nis']}</td>";
                                    echo "<td class='px-8 py-5 border-b'><img src='{$jurnal['foto']}' alt='Foto' class='w-16 h-16 rounded-lg object-cover shadow-sm'></td>";
                                    echo "<td class='px-8 py-5 border-b'>{$jurnal['isi']}</td>";
                                    echo "<td class='px-8 py-5 border-b pl-6' id='activity-{$index}'>";
                                    if (!$jurnal['verified']) {
                                        echo "<button class='px-6 py-2 rounded-full bg-yellow-500 text-white hover:bg-yellow-600 transition-all transform hover:scale-105 font-semibold' onclick='verifyJournal({$index})'>Verifikasi</button>";
                                    } else {
                                        echo "<span class='font-semibold text-lg text-green-600'>Terverifikasi</span>";
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
        // Update date dynamically using JavaScript (in case PHP is cached)
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric"
        });

        // Function to verify a journal entry
        function verifyJournal(index) {
            document.getElementById(`activity-${index}`).innerHTML = "<span class='font-semibold text-lg text-green-600'>Terverifikasi</span>";
        }
    </script>
</x-mainTemplate>
