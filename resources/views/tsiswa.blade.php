<?php
    // Example of fetching student data from a database
    $students = [
        // Example data
        // ['username' => 'Username1', 'password' => 'Password1', 'nama' => 'Nama 1', 'no_absen' => '01', 'kelas' => 'X-A'],
        // ['username' => 'Username2', 'password' => 'Password2', 'nama' => 'Nama 2', 'no_absen' => '02', 'kelas' => 'X-B'],
    ];
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
        <div class="bg-content rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Siswa</h1>
                <p class="text-lg text-gray-600">
                    Hari ini: <?php echo date('d / m / Y'); ?>
                </p>
            </div>

            <!-- Table -->
            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-gradient-to-r bg-content text-black">
                    <tr>
                        <th class="px-6 py-3 border-b">No</th>
                        <th class="px-6 py-3 border-b">Username</th>
                        <th class="px-6 py-3 border-b">Password</th>
                        <th class="px-6 py-3 border-b">Nama</th>
                        <th class="px-6 py-3 border-b">No. Absen</th>
                        <th class="px-6 py-3 border-b">Kelas</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    <?php 
                        // Start with index 1
                        foreach ($students as $index => $student) {
                            $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'; // Alternating row colors
                            $rowNumber = $index + 1; // To display proper row number starting from 1
                            echo "<tr class='{$rowClass} hover:bg-blue-50 transition-colors duration-200'>";
                            echo "<td class='px-6 py-4 border-b'>{$rowNumber}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$student['username']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$student['password']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$student['nama']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$student['no_absen']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$student['kelas']}</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</x-mainTemplate>
