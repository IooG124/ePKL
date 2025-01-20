<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add Teacher Button -->
        <div class="flex justify-end mb-6">
            <button id="addTeacherButton" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Guru
            </button>
        </div>

        <!-- Pop-up Modal -->
        <div id="addTeacherModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-4">Tambah Guru</h2>
                <form id="addTeacherForm">
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold">Username</label>
                        <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-bold">Password</label>
                        <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-bold">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="nip" class="block text-gray-700 font-bold">NIP</label>
                        <input type="text" id="nip" name="nip" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelTeacherButton" class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</button>
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
                                $rowClass = $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'; // Alternating row colors
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
        // JavaScript for modal functionality
        const addTeacherButton = document.getElementById('addTeacherButton');
        const addTeacherModal = document.getElementById('addTeacherModal');
        const cancelTeacherButton = document.getElementById('cancelTeacherButton');

        // Show modal
        addTeacherButton.addEventListener('click', () => {
            addTeacherModal.classList.remove('hidden');
        });

        // Hide modal
        cancelTeacherButton.addEventListener('click', () => {
            addTeacherModal.classList.add('hidden');
        });

        // Handle form submission
        const addTeacherForm = document.getElementById('addTeacherForm');
        addTeacherForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Gather form data
            const formData = new FormData(addTeacherForm);
            const data = Object.fromEntries(formData.entries());

            console.log(data); // Replace this with logic to save the data (e.g., AJAX or API call)

            // Close the modal
            addTeacherModal.classList.add('hidden');
        });

        // Update the date dynamically
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric"
        });
    </script>
</x-mainTemplate>
