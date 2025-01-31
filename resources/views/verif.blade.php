<?php
// Set the timezone to 'Asia/Makassar' to ensure the server's time is accurate.
date_default_timezone_set('Asia/Makassar'); // Set your timezone accordingly

// Prevent Caching
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

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
                        <?php 
                        $jurnals = [
                            ["nama" => "Budi", "nis" => "12345", "foto" => "foto1.jpg", "isi" => "Isi jurnal Budi", "verified" => false],
                            ["nama" => "Ani", "nis" => "67890", "foto" => "foto2.jpg", "isi" => "Isi jurnal Ani", "verified" => true],
                        ];
                        if (!empty($jurnals)) {
                            foreach ($jurnals as $index => $jurnal) {
                                echo "<tr class='hover:bg-gray-100 transition-all text-center'>";
                                echo "<td class='px-4 py-3'>" . ($index + 1) . "</td>";
                                echo "<td class='px-6 py-3'>{$jurnal['nama']}</td>";
                                echo "<td class='px-4 py-3'>{$jurnal['nis']}</td>";

                                // Centered Foto Jurnal
                                echo "<td class='px-6 py-3'>
                                        <div class='flex justify-center items-center'>
                                            <img src='{$jurnal['foto']}' alt='Foto' class='w-16 h-16 rounded-lg object-cover shadow-sm border border-gray-300'>
                                        </div>
                                      </td>";

                                echo "<td class='px-6 py-3'>{$jurnal['isi']}</td>";

                                // Centered Button
                                echo "<td class='px-6 py-3'>
                                        <div class='flex justify-center'>";

                                if (!$jurnal['verified']) {
                                    echo "<button class='px-4 py-2 rounded-full bg-blue-500 text-white hover:bg-blue-600 transition-all transform hover:scale-105 font-semibold flex items-center gap-2' onclick='verifyJurnal(this)'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                                                <path fill-rule='evenodd' d='M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2z' clip-rule='evenodd'/>
                                            </svg>
                                            Verifikasi
                                        </button>";
                                } else {
                                    echo "<span class='px-4 py-2 rounded-full bg-green-500 text-white font-semibold flex items-center gap-2'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' viewBox='0 0 20 20' fill='currentColor'>
                                                <path fill-rule='evenodd' d='M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z' clip-rule='evenodd'/>
                                            </svg>
                                            Terverifikasi
                                        </span>";
                                }
                                echo "</div></td>";

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
        // Update date dynamically using JavaScript
        function updateDate() {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString("id-ID", {
                day: "2-digit",
                month: "2-digit",
                year: "numeric"
            });
            document.getElementById("current-date").innerText = formattedDate;
        }

        // Initial date update
        updateDate();

        // Update the date every minute (60000 milliseconds)
        setInterval(updateDate, 60000);
        
        function verifyJurnal(button) {
            const verifiedLabel = `
                <span class="px-4 py-2 rounded-full bg-green-500 text-white font-semibold flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd"/>
                    </svg>
                    Terverifikasi
                </span>`;
            button.outerHTML = verifiedLabel; 
        }
    </script>
</x-mainTemplate>
