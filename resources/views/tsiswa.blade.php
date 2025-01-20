<?php
    // Example of fetching student data from a database
    $students = [
        // Example data
        // ['username' => 'User1', 'password' => 'Pass1', 'nama' => 'Nama 1', 'no_absen' => '01', 'kelas' => 'X-A'],
        // ['username' => 'User2', 'password' => 'Pass2', 'nama' => 'Nama 2', 'no_absen' => '02', 'kelas' => 'X-B'],
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
        <!-- Add Student Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Siswa
            </button>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Siswa</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <table class="min-w-full table-auto text-sm text-left text-gray-700 border-collapse">
                <thead class=" text-black">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Username</th>
                        <th class="px-6 py-3 border-b">Password</th>
                        <th class="px-6 py-3 border-b">Nama</th>
                        <th class="px-6 py-3 border-b">No. Absen</th>
                        <th class="px-6 py-3 border-b">Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if (!empty($students)) {
                            foreach ($students as $index => $student) {
                                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'; // Alternating row colors
                                $rowNumber = $index + 1; // Row number starts from 1
                                
                                echo "<tr class='{$rowClass} hover:bg-blue-50 transition-colors duration-200'>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($rowNumber) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($student['username']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($student['password']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($student['nama']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($student['no_absen']) . "</td>";
                                echo "<td class='px-6 py-4 border-b'>" . htmlspecialchars($student['kelas']) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center text-gray-500 py-4'>Tidak ada data siswa.</td></tr>";
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
