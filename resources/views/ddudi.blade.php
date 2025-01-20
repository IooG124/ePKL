<?php
    // Prevent Caching
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Set default timezone (change to your specific timezone)
    date_default_timezone_set('Asia/Jakarta'); // Adjust this based on your location

    // Example of fetching dudi data from a database
    $dudis = [
        // Example data
        // ['namadudi' => 'Dudi 1', 'lokasi' => 'Location 1', 'contactperson' => 'John Doe'],
        // ['namadudi' => 'Dudi 2', 'lokasi' => 'Location 2', 'contactperson' => 'Jane Doe'],
    ];
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add dudi Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah DUDI
            </button>
        </div>

        <!-- Table Card -->
        <div class="bg-content rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar DUDI</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-gradient-to-r bg-content text-black">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Nama Dudi</th>
                        <th class="px-6 py-3 border-b">Lokasi</th>
                        <th class="px-6 py-3 border-b">Contact Person</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if (!empty($dudis)) {
                            foreach ($dudis as $index => $dudi) {
                                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'; // Alternating row colors
                                $rowNumber = $index + 1; // To display proper row number starting from 1
                                echo "<tr class='{$rowClass} hover:bg-blue-50 transition-colors duration-200'>";
                                echo "<td class='px-6 py-4 border-b'>{$rowNumber}</td>";
                                echo "<td class='px-6 py-4 border-b'>{$dudi['namadudi']}</td>";
                                echo "<td class='px-6 py-4 border-b'>{$dudi['lokasi']}</td>";
                                echo "<td class='px-6 py-4 border-b'>{$dudi['contactperson']}</td>"; // Fixed typo here
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-gray-500 py-4'>Tidak ada data DUDI.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // JavaScript to ensure date updates dynamically
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric"
        });
    </script>
</x-mainTemplate>
