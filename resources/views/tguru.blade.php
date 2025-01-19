<?php
    // Example of fetching teacher data from a database
    $teachers = [
        // Example data
        // ['username' => 'Username1', 'password' => 'Password1', 'nama' => 'Nama 1', 'no_absen' => '01', 'kelas' => 'X-A'],
        // ['username' => 'Username2', 'password' => 'Password2', 'nama' => 'Nama 2', 'no_absen' => '02', 'kelas' => 'X-B'],
    ];
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add teacher Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Guru
            </button>
        </div>

        <!-- Table Card -->
        <div class="bg-content rounded-lg p-6">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Daftar Guru</h1>
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
                        <th class="px-6 py-3 border-b">NIP</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50">
                    <?php 
                        // Start with index 1
                        foreach ($teachers as $index => $teacher) {
                            $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'; // Alternating row colors
                            $rowNumber = $index + 1; // To display proper row number starting from 1
                            echo "<tr class='{$rowClass} hover:bg-blue-50 transition-colors duration-200'>";
                            echo "<td class='px-6 py-4 border-b'>{$rowNumber}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$teacher['username']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$teacher['password']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$teacher['nama']}</td>";
                            echo "<td class='px-6 py-4 border-b'>{$teacher['nip']}</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</x-mainTemplate>
