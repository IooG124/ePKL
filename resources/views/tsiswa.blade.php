<?php
    // Set the timezone to Asia/Makassar (Jakarta Time Zone)
    date_default_timezone_set('Asia/Makassar');

    // Example of fetching student data from a database
    $students = [
        // Example data:
        ['username' => 'Dio', 'password' => '123456789', 'nama' => 'Dio', 'nis' => '123456', 'no_absen' => '12', 'kelas' => 'XII-RPL-3'],
        ['username' => 'Wika', 'password' => '123456789', 'nama' => 'Wika', 'nis' => '654321', 'no_absen' => '24', 'kelas' => 'XII-RPL-3'],
    ];

    // Prevent Caching Issues
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
?>

<x-mainTemplate>
    <div class="container mx-auto px-6 py-8">
        <div class="flex justify-end mb-6">
            <button id="addStudentButton" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Siswa
            </button>
        </div>

        <!-- Modal for Adding/Editing Student -->
        <div id="addStudentModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[450px]">
                <h2 id="modalTitle" class="text-2xl font-bold mb-4">Tambah Siswa</h2>
                <form id="addStudentForm">
                    <input type="hidden" id="studentIndex">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold">Username</label>
                        <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold">Password</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="nis" class="block text-gray-700 font-bold">NIS</label>
                        <input type="text" id="nis" name="nis" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="no_absen" class="block text-gray-700 font-bold">No. Absen</label>
                        <input type="text" id="no_absen" name="no_absen" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="kelas" class="block text-gray-700 font-bold">Kelas</label>
                        <input type="text" id="kelas" name="kelas" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelButton" class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="rounded-lg p-6 bg-[#f9fafb] shadow-md">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Siswa</h1>
                <p class="text-lg text-[#4a5568]">Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span></p>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center w-1/12 text-xs">No</th>
                            <th class="px-6 py-3 w-1/6">Username</th>
                            <th class="px-6 py-3 w-1/6">Nama</th>
                            <th class="px-6 py-3 w-1/6">NIS</th>
                            <th class="px-6 py-3 w-1/6">No. Absen</th>
                            <th class="px-6 py-3 w-1/6">Kelas</th>
                            <th class="px-6 py-3 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <?php 
                            if (!empty($students)) {
                                foreach ($students as $index => $student) {
                                    echo "<tr class='bg-gray-50 hover:bg-gray-100 transition-all duration-200'>"
                                        . "<td class='px-6 py-4 text-center'>" . ($index + 1) . "</td>"
                                        . "<td class='px-6 py-4'>" . htmlspecialchars($student['username']) . "</td>"
                                        . "<td class='px-6 py-4'>" . htmlspecialchars($student['nama']) . "</td>"
                                        . "<td class='px-6 py-4'>" . htmlspecialchars($student['nis']) . "</td>"
                                        . "<td class='px-6 py-4'>" . htmlspecialchars($student['no_absen']) . "</td>"
                                        . "<td class='px-6 py-4'>" . htmlspecialchars($student['kelas']) . "</td>"
                                        . "<td class='px-6 py-4 text-center'>
                                              <div class='flex space-x-2 justify-center'>
                                                  <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 editButton' data-index='$index'>Edit</button>
                                                  <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300'>Hapus</button>
                                              </div>
                                          </td>"
                                    . "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-gray-500 py-4'>Tidak ada data siswa.</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Show Add Student Modal
        document.getElementById('addStudentButton').addEventListener('click', function() {
            document.getElementById('addStudentModal').classList.remove('hidden');
            document.getElementById('modalTitle').innerText = 'Tambah Siswa';
            document.getElementById('addStudentForm').reset();
            document.getElementById('studentIndex').value = '';
        });

        // Close the modal
        document.getElementById('cancelButton').addEventListener('click', function() {
            document.getElementById('addStudentModal').classList.add('hidden');
        });

        // Edit Student
        document.querySelectorAll('.editButton').forEach(button => {
            button.addEventListener('click', function() {
                const index = this.getAttribute('data-index');
                const students = <?php echo json_encode($students); ?>;
                const student = students[index];

                document.getElementById('modalTitle').innerText = 'Edit Siswa';
                document.getElementById('username').value = student.username;
                document.getElementById('password').value = student.password;
                document.getElementById('nis').value = student.nis;
                document.getElementById('nama').value = student.nama;
                document.getElementById('no_absen').value = student.no_absen;
                document.getElementById('kelas').value = student.kelas;
                document.getElementById('studentIndex').value = index;

                document.getElementById('addStudentModal').classList.remove('hidden');
            });
        });

        // Submit the form to add/edit student
        document.getElementById('addStudentForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const index = document.getElementById('studentIndex').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const nis = document.getElementById('nis').value;
            const nama = document.getElementById('nama').value;
            const noAbsen = document.getElementById('no_absen').value;
            const kelas = document.getElementById('kelas').value;

            if (index === '') {
                // Add new student
                const newRow = `
                    <tr class="bg-gray-50 hover:bg-gray-100 transition-all duration-200">
                        <td class="px-6 py-4 text-center">${document.querySelectorAll('.editButton').length + 1}</td>
                        <td class="px-6 py-4">${username}</td>
                        <td class="px-6 py-4">${nama}</td>
                        <td class="px-6 py-4">${nis}</td>
                        <td class="px-6 py-4">${noAbsen}</td>
                        <td class="px-6 py-4">${kelas}</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex space-x-2 justify-center">
                                <button class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 editButton" data-index="${index}">Edit</button>
                                <button class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">Hapus</button>
                            </div>
                        </td>
                    </tr>`;
                document.getElementById('studentTableBody').insertAdjacentHTML('beforeend', newRow);
            } else {
                // Update existing student
                const row = document.querySelectorAll('.editButton')[index].closest('tr');
                row.cells[1].innerText = username;
                row.cells[2].innerText = nama;
                row.cells[3].innerText = nis;
                row.cells[4].innerText = noAbsen;
                row.cells[5].innerText = kelas;
            }

            document.getElementById('addStudentModal').classList.add('hidden');
        });
    </script>
</x-mainTemplate>
