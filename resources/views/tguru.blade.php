<?php
    // Example of fetching teacher data from a database
    $teachers = [
        // Example data
        // ['username' => 'guru1', 'password' => 'pass1', 'nama' => 'Guru 1', 'nip' => '123456'],
        // ['username' => 'guru2', 'password' => 'pass2', 'nama' => 'Guru 2', 'nip' => '654321'],
    ];

    // Prevent Caching Issues
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add Teacher Button -->
        <div class="flex justify-end mb-6">
            <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Guru
            </button>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Guru</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <table class="min-w-full table-auto text-sm text-left text-gray-700 border-collapse">
                <thead class="text-black">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Username</th>
                        <th class="px-6 py-3 border-b">Password</th>
                        <th class="px-6 py-3 border-b">Nama</th>
                        <th class="px-6 py-3 border-b">NIP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if (!empty($teachers)) {
                            foreach ($teachers as $index => $teacher) {
                                $rowClass = $index % 2 == 0; // Alternating row colors
                                $rowNumber = $index + 1; // Row number starts from 1

                                echo "<tr class='{$rowClass} transition-colors duration-200'>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($rowNumber) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($teacher['username']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($teacher['password']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($teacher['nama']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($teacher['nip']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-gray-500 py-4'>Tidak ada data guru.</td></tr>";
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
