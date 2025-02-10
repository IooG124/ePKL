<?php
    $currentDate = date('d / m / Y'); // Format date as dd / mm / yyyy

    $teachers = [
        [
            'username' => 'budi_santoso',
            'nama' => 'Budi Santoso',
            'nip' => '19781231 202012 1 001',
            'password' => 'password123'
        ],
        [
            'username' => 'ani_wibowo',
            'nama' => 'Ani Wibowo',
            'nip' => '19850615 201301 2 002',
            'password' => 'ani1234'
        ],
        [
            'username' => 'dewi_kartika',
            'nama' => 'Dewi Kartika',
            'nip' => '19900222 201801 3 003',
            'password' => 'dewi5678'
        ],
        [
            'username' => 'hendra_wijaya',
            'nama' => 'Hendra Wijaya',
            'nip' => '19891111 201501 4 004',
            'password' => 'hendra8765'
        ],
        [
            'username' => 'siti_rahma',
            'nama' => 'Siti Rahma',
            'nip' => '19930808 202001 5 005',
            'password' => 'siti4321'
        ]
    ];
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add Teacher Button -->
        <div class="flex justify-end mb-6">
            <button id="addTeacherButton"
                class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Guru
            </button>
        </div>

        <!-- Pop-up Modal -->
        <div id="addTeacherModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-4">Tambah Guru</h2>
                <form action="" method="POST" id="addTeacherForm">
                    @csrf
                    <div class="mb-4">
                        <label for="nama_guru" class="block text-gray-700 font-bold">Nama Guru</label>
                        <input type="text" id="nama_guru" name="nama_guru"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="NIP" class="block text-gray-700 font-bold">NIP</label>
                        <input type="text" id="NIP" name="NIP"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="alamat" class="block text-gray-700 font-bold">Alamat</label>
                        <input type="text" id="alamat" name="alamat"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="telepon" class="block text-gray-700 font-bold">No Telepon</label>
                        <input type="text" id="telepon" name="telepon"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold">Username</label>
                        <input type="text" id="username" name="username"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="cancelTeacherButton"
                            class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Tambah</button>
                    </div>
                </form>
            </div>
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
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs w-1/12">No</th>
                            <th class="px-6 py-3 w-1/4">Username</th>
                            <th class="px-6 py-3 w-1/4">Nama</th>
                            <th class="px-6 py-3 w-1/4">NIP</th>
                            <th class="px-6 py-3 text-center w-1/6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!empty($teachers)) {
                                foreach ($teachers as $index => $teacher) {
                                    $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-50'; // Alternating row colors
                                    $rowNumber = $index + 1; // Row number starts from 1

                                    echo "<tr class='{$rowClass} hover:bg-gray-100 transition-all duration-200'>";
                                    echo "<td class='px-6 py-4 text-center'>" . htmlspecialchars($rowNumber) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($teacher['username']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($teacher['nama']) . "</td>";
                                    echo "<td class='px-6 py-4'>" . htmlspecialchars($teacher['nip']) . "</td>";
                                    echo "<td class='px-6 py-4 text-center'>
                                            <div class='flex justify-center'>
                                                <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 mr-2' onclick='editTeacher(" . htmlspecialchars(json_encode($teacher)) . ")'>Edit</button>
                                                <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300'>Hapus</button>
                                            </div>
                                          </td>";
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
    </div>

    <script>
        // JavaScript for modal functionality
        const addTeacherButton = document.getElementById('addTeacherButton');
        const addTeacherModal = document.getElementById('addTeacherModal');
        const cancelTeacherButton = document.getElementById('cancelTeacherButton');
        const addTeacherForm = document.getElementById('addTeacherForm');

        // Show modal
        addTeacherButton.addEventListener('click', () => {
            addTeacherModal.classList.remove('hidden');
            // Clear the form for new entry
            addTeacherForm.reset();
        });

        // Hide modal
        cancelTeacherButton.addEventListener('click', () => {
            addTeacherModal.classList.add('hidden');
        });

        // Handle form submission
        addTeacherForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Gather form data
            const formData = new FormData(addTeacherForm);
            const data = Object.fromEntries(formData.entries());

            console.log(data); // Replace this with logic to save the data (e.g., AJAX or API call)

            // Close the modal
            addTeacherModal.classList.add('hidden');
        });

        // Function to edit teacher
        function editTeacher(teacher) {
            // Show the modal
            addTeacherModal.classList.remove('hidden');
            
            // Fill the form with teacher data
            document.getElementById('username').value = teacher.username;
            document.getElementById('nama').value = teacher.nama;
            document.getElementById('nip').value = teacher.nip;
            
            // Empty the password field for security
            document.getElementById('password').value = ''; 
            
            // Change the form submit logic to update
            addTeacherForm.onsubmit = (e) => {
                e.preventDefault();

                const updatedData = new FormData(addTeacherForm);
                const updatedTeacher = Object.fromEntries(updatedData.entries());

                console.log(updatedTeacher); // Send this data to update the teacher's details (e.g., AJAX or API call)

                // Close the modal
                addTeacherModal.classList.add('hidden');
            };
        }

        // Update the current date on page load
        document.getElementById('current-date').textContent = '<?php echo $currentDate; ?>';
    </script>
</x-mainTemplate>