<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add DUDI Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button id="addDUDIButton" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah DUDI
            </button>
        </div>

        <!-- Pop-up Modal -->
        <div id="addDUDIModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-4">Tambah DUDI</h2>
                <form id="addDUDIForm">
                    <div class="mb-4">
                        <label for="namaDUDI" class="block text-gray-700 font-bold">Nama Industri</label>
                        <input type="text" id="namaDUDI" name="namaDUDI" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="lokasiDUDI" class="block text-gray-700 font-bold">Lokasi Industri</label>
                        <input type="text" id="lokasiDUDI" name="lokasiDUDI" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="contactPerson" class="block text-gray-700 font-bold">Contact Person</label>
                        <input type="text" id="contactPerson" name="contactPerson" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="cancelDUDIButton" class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Tambah</button>
                    </div>
                </form>
            </div>
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
                        <th class="px-6 py-3 border-b">Nama DUDI</th>
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
                                echo "<td class='px-6 py-4 border-b'>{$dudi['contactperson']}</td>"; 
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center text-gray-500 py-4'>Tidak ada data DUDI.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript for Modal -->
    <script>
        // JavaScript to handle modal functionality
        const addDUDIButton = document.getElementById('addDUDIButton');
        const addDUDIModal = document.getElementById('addDUDIModal');
        const cancelDUDIButton = document.getElementById('cancelDUDIButton');

        // Show the modal when the button is clicked
        addDUDIButton.addEventListener('click', () => {
            addDUDIModal.classList.remove('hidden');
        });

        // Hide the modal when the cancel button is clicked
        cancelDUDIButton.addEventListener('click', () => {
            addDUDIModal.classList.add('hidden');
        });

        // Handle form submission
        const addDUDIForm = document.getElementById('addDUDIForm');
        addDUDIForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Get form data
            const formData = new FormData(addDUDIForm);
            const data = Object.fromEntries(formData.entries());

            console.log(data); // Replace with your logic to save data (e.g., AJAX or API call)

            // Close the modal after submission
            addDUDIModal.classList.add('hidden');
        });

        // Update the date dynamically
        document.getElementById("current-date").innerText = new Date().toLocaleDateString("id-ID", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric"
        });
    </script>
</x-mainTemplate>
