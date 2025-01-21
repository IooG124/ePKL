<?php
    // Set the timezone to Asia/Makassar (Jakarta Time Zone)
    date_default_timezone_set('Asia/Makassar');

    // Example of fetching student data from a database
    $students = [
        // Example data:
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
        <!-- Add/Edit Student Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button id="addStudentButton" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Siswa
            </button>
        </div>

        <!-- Pop-up Form (Wider) -->
        <div id="addStudentModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[450px]"> <!-- Wider Modal -->
                <h2 class="text-2xl font-bold mb-4">Tambah Siswa</h2>
                <form id="addStudentForm">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold">Username</label>
                        <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold">Password</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm_password" class="block text-gray-700 font-bold">Konfirmasi Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="w-full border border-gray-300 rounded-lg p-2" required>
                        <p id="passwordError" class="text-red-600 text-sm hidden">Password tidak cocok.</p>
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
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="rounded-lg p-6 bg-[#f9fafb] shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Siswa</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date"><?php echo date('d / m / Y'); ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0]">
                        <tr>
                            <th class="px-6 py-3 text-center w-1/12 text-xs">No</th>
                            <th class="px-6 py-3 w-1/4">Username</th>
                            <th class="px-6 py-3 w-1/4">Nama</th>
                            <th class="px-6 py-3 w-1/6">No. Absen</th>
                            <th class="px-6 py-3 w-1/4">Kelas</th>
                            <th class="px-6 py-3 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!empty($students)) {
                                foreach ($students as $index => $student) {
                                    echo "<tr class='bg-gray-50 hover:bg-gray-100 transition-all duration-200'>";
                                    echo "<td class='px-6 py-4 text-center'>" . ($index + 1) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($student['username']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($student['nama']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($student['no_absen']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($student['kelas']) . "</td>";
                                    echo "<td class='px-6 py-4 text-center'>
                                            <div class='flex space-x-2 justify-center'>
                                                <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300' onclick='editStudent(" . htmlspecialchars(json_encode($student)) . ")'>Edit</button>
                                                <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300'>Hapus</button>
                                            </div>
                                          </td>";
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
    </div>

    <script>
        const addStudentModal = document.getElementById('addStudentModal');
        const cancelButton = document.getElementById('cancelButton');
        const addStudentButton = document.getElementById('addStudentButton');
        const addStudentForm = document.getElementById('addStudentForm');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm_password');
        const passwordError = document.getElementById('passwordError');

        // Show modal
        addStudentButton.addEventListener('click', () => {
            resetForm();
            addStudentModal.classList.remove('hidden');
        });
        cancelButton.addEventListener('click', () => addStudentModal.classList.add('hidden'));

        // Edit student data
        function editStudent(student) {
            document.getElementById('username').value = student.username;
            document.getElementById('password').value = student.password;
            document.getElementById('confirm_password').value = student.password;
            document.getElementById('nama').value = student.nama;
            document.getElementById('no_absen').value = student.no_absen;
            document.getElementById('kelas').value = student.kelas;

            addStudentModal.classList.remove('hidden');
        }

        // Validate password confirmation
        addStudentForm.addEventListener('submit', (e) => {
            e.preventDefault();
            if (passwordField.value !== confirmPasswordField.value) {
                passwordError.classList.remove('hidden');
            } else {
                passwordError.classList.add('hidden');
                console.log(Object.fromEntries(new FormData(addStudentForm).entries()));
                addStudentModal.classList.add('hidden');
            }
        });

        // Reset form
        function resetForm() {
            addStudentForm.reset();
            passwordError.classList.add('hidden');
        }

        // Update date dynamically
        function updateDate() {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', year: 'numeric' });
            document.getElementById('current-date').textContent = formattedDate;
        }

        setInterval(updateDate, 60000); // Update every minute
        updateDate(); // Initial update
    </script>
</x-mainTemplate>
