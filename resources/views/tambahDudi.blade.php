<?php
    // Prevent Caching
    header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");

    // Set timezone to Asia/Makassar (Jakarta time)
    date_default_timezone_set('Asia/Makassar');
    $currentDate = date('d / m / Y'); // Format date as dd / mm / yyyy

    $dudis = [
        [
            'id' => 1,
            'namadudi' => 'PT. Teknologi Nusantara',
            'lokasi' => 'Jakarta, Indonesia',
            'contactperson' => 'Budi Santoso (08123456789)'
        ],
        [
            'id' => 2,
            'namadudi' => 'CV. Inovasi Kreatif',
            'lokasi' => 'Bandung, Indonesia',
            'contactperson' => 'Ani Wibowo (08129876543)'
        ],
        [
            'id' => 3,
            'namadudi' => 'UD. Sukses Mandiri',
            'lokasi' => 'Surabaya, Indonesia',
            'contactperson' => 'Dewi Kartika (08234567890)'
        ],
        [
            'id' => 4,
            'namadudi' => 'PT. Digital Solution',
            'lokasi' => 'Yogyakarta, Indonesia',
            'contactperson' => 'Hendra Wijaya (08567891234)'
        ],
        [
            'id' => 5,
            'namadudi' => 'CV. Media Cerdas',
            'lokasi' => 'Semarang, Indonesia',
            'contactperson' => 'Siti Rahma (08134567891)'
        ]
    ];
    

?>

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
            <div class="bg-white p-6 rounded-lg shadow-lg w-[450px]">
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
                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar DUDI</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date"><?php echo $currentDate; ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0]  text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs w-1/12 border-b">No</th>
                            <th class="px-6 py-3 w-1/4 border-b">Nama DUDI</th>
                            <th class="px-6 py-3 w-1/4 border-b">Lokasi</th>
                            <th class="px-6 py-3 w-1/4 border-b">Contact Person</th>
                            <th class="px-6 py-3 w-1/6 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!empty($dudis)) {
                                foreach ($dudis as $index => $dudi) {
                                    $rowClass = $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; // Alternating row colors
                                    $rowNumber = $index + 1; // To display proper row number starting from 1
                                    echo "<tr id='dudi-{$dudi['id']}' class='{$rowClass} hover:bg-gray-100 transition-all duration-200'>";
                                    echo "<td class='px-6 py-4 text-center border-b'>{$rowNumber}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['namadudi']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['lokasi']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['contactperson']}</td>"; 
                                    echo "<td class='px-6 py-4 border-b text-center'>
                                            <div class='flex justify-center gap-2'>
                                                <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300' onclick='editDUDI(" . htmlspecialchars(json_encode($dudi)) . ")'>Edit</button>
                                                <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300' onclick='deleteDUDI({$dudi['id']})'>Hapus</button>
                                            </div>
                                          </td>";
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
    </div>

    <!-- JavaScript for Modal and Buttons -->
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

        // Edit DUDI Function
        function editDUDI(dudi) {
            // Prefill the modal or a new form with the current DUDI data
            document.getElementById('namaDUDI').value = dudi.namadudi;
            document.getElementById('lokasiDUDI').value = dudi.lokasi;
            document.getElementById('contactPerson').value = dudi.contactperson;
            addDUDIModal.classList.remove('hidden');
        }

        // Delete DUDI Function
        function deleteDUDI(id) {
            const confirmation = confirm('Apakah Anda yakin ingin menghapus DUDI ini?');
            if (confirmation) {
                // Remove the row from the table (for frontend deletion)
                const row = document.getElementById(`dudi-${id}`);
                row.remove();

                // You can make an AJAX call here to delete the DUDI from the database
                console.log('DUDI dengan ID ' + id + ' dihapus.');
            }
        }

        // Update the date dynamically using JavaScript
        setInterval(() => {
            const currentDate = new Date();
            const formattedDate = currentDate.toLocaleDateString('id-ID', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            });
            document.getElementById('current-date').textContent = formattedDate;
        }, 60000); // Update every minute
    </script>
</x-mainTemplate>
