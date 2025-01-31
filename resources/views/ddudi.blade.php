<?php
// Set the timezone (adjust if needed)
date_default_timezone_set('Asia/Makassar'); // Set to your desired timezone

// Format tanggal hari ini
$tanggalHariIni = date('d / m / Y'); // Example: "20 / 01 / 2025"
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Table Card -->
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar DUDI</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date"><?php echo $tanggalHariIni; ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0]">
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
                                    echo "<tr class='{$rowClass} hover:bg-gray-100 transition-all duration-200'>";
                                    echo "<td class='px-6 py-4 text-center border-b'>{$rowNumber}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['namadudi']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['lokasi']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$dudi['contactperson']}</td>"; 
                                    echo "<td class='px-6 py-4 border-b text-center'>
                                            <div class='flex justify-center gap-2'>
                                                <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300'>Edit</button>
                                                <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300'>Delete</button>
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
