<?php 
    // Dummy data for PKL periods
    $periodePKL = [
        ["namasiswa" => "Siswa 1", "namadudi" => "DUDI 1", "tanggalmulai" => "2025-02-01", "tanggalberakhir" => "2025-05-01", "id" => 1],
        ["namasiswa" => "Siswa 2", "namadudi" => "DUDI 2", "tanggalmulai" => "2025-02-05", "tanggalberakhir" => "2025-05-10", "id" => 2],
        ["namasiswa" => "Siswa 3", "namadudi" => "DUDI 3", "tanggalmulai" => "2025-03-01", "tanggalberakhir" => "2025-06-01", "id" => 3]
    ];

    $tanggalHariIni = date('d / m / Y'); // Example: "20 / 01 / 2025"
?>

<x-mainTemplate>
    <!-- Main container -->
    <div class="container mx-auto px-6 py-8">
        <!-- Add Periode Button positioned at the top right -->
        <div class="flex justify-end mb-6">
            <button id="addPeriodeButton" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                + Tambah Periode
            </button>
        </div>

        <!-- Pop-up Modal -->
        <div id="addPeriodeModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[450px]">
                <h2 class="text-2xl font-bold mb-4">Tambah Periode PKL</h2>
                <form id="addPeriodeForm">
                    <!-- Nama Siswa section -->
                    <div id="siswaSection" class="mb-4">
                        <label for="namaSiswa" class="block text-gray-700 font-bold">Nama Siswa</label>
                        <select id="namaSiswa1" name="namaSiswa[]" class="w-full border border-gray-300 rounded-lg p-2" required>
                            <option value="">Pilih Siswa</option>
                            <!-- Replace with dynamic list of students -->
                            <option value="Siswa 1">Siswa 1</option>
                            <option value="Siswa 2">Siswa 2</option>
                            <option value="Siswa 3">Siswa 3</option>
                        </select>
                    </div>

                    <!-- Add additional siswa dropdown -->
                    <div class="mb-4">
                        <button type="button" id="addSiswaButton" class="bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
                            + Tambah Siswa
                        </button>
                    </div>

                    <!-- Nama DUDI section -->
                    <div class="mb-4">
                        <label for="namaDUDI" class="block text-gray-700 font-bold">Nama DUDI</label>
                        <select id="namaDUDI" name="namaDUDI" class="w-full border border-gray-300 rounded-lg p-2" required>
                            <option value="">Pilih DUDI</option>
                            <!-- Replace with dynamic list of DUDI -->
                            <option value="DUDI 1">DUDI 1</option>
                            <option value="DUDI 2">DUDI 2</option>
                            <option value="DUDI 3">DUDI 3</option>
                        </select>
                    </div>

                    <!-- Tanggal Mulai and Tanggal Berakhir section -->
                    <div class="mb-4">
                        <label for="tanggalMulai" class="block text-gray-700 font-bold">Tanggal Mulai</label>
                        <input type="date" id="tanggalMulai" name="tanggalMulai" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanggalBerakhir" class="block text-gray-700 font-bold">Tanggal Berakhir</label>
                        <input type="date" id="tanggalBerakhir" name="tanggalBerakhir" class="w-full border border-gray-300 rounded-lg p-2" required>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="cancelPeriodeButton" class="bg-gray-500 text-white py-2 px-4 rounded-lg mr-2">Batal</button>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-[#f9fafb] rounded-lg p-6 shadow-md">
            <!-- Header Section with Date -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-[#2d3748]">Daftar Periode PKL</h1>
                <p class="text-lg text-[#4a5568]">
                    Hari ini: <span id="current-date"><?php echo $tanggalHariIni; ?></span>
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto rounded-lg shadow-sm">
                <table class="min-w-full table-auto text-sm text-gray-900 border-collapse rounded-lg">
                    <thead class="bg-[#e2e8f0] text-left">
                        <tr>
                            <th class="px-6 py-3 text-center text-xs w-1/12 border-b">No</th>
                            <th class="px-6 py-3 w-1/4 border-b">Nama Siswa</th>
                            <th class="px-6 py-3 w-1/4 border-b">Nama DUDI</th>
                            <th class="px-6 py-3 w-1/4 border-b">Tanggal Mulai</th>
                            <th class="px-6 py-3 w-1/4 border-b">Tanggal Berakhir</th>
                            <th class="px-6 py-3 w-1/6 border-b text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if (!empty($periodePKL)) {
                                foreach ($periodePKL as $index => $periode) {
                                    $rowClass = $index % 2 == 0 ? 'bg-gray-50' : 'bg-white'; // Alternating row colors
                                    $rowNumber = $index + 1; // To display proper row number starting from 1
                                    echo "<tr id='periode-{$periode['id']}' class='{$rowClass} hover:bg-gray-100 transition-all duration-200'>";
                                    echo "<td class='px-6 py-4 text-center border-b'>{$rowNumber}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$periode['namasiswa']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$periode['namadudi']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$periode['tanggalmulai']}</td>";
                                    echo "<td class='px-6 py-4 border-b'>{$periode['tanggalberakhir']}</td>";
                                    echo "<td class='px-6 py-4 border-b text-center'>
                                            <div class='flex justify-center gap-2'>
                                                <button class='bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300' onclick='editPeriode(" . htmlspecialchars(json_encode($periode)) . ")'>Edit</button>
                                                <button class='bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300' onclick='deletePeriode({$periode['id']})'>Hapus</button>
                                            </div>
                                          </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center text-gray-500 py-4'>Tidak ada data Periode PKL.</td></tr>";
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
        const addPeriodeButton = document.getElementById('addPeriodeButton');
        const addPeriodeModal = document.getElementById('addPeriodeModal');
        const cancelPeriodeButton = document.getElementById('cancelPeriodeButton');
        const addSiswaButton = document.getElementById('addSiswaButton');
        let siswaCount = 1;  // Initial siswa select dropdown count

        // Show the modal when the button is clicked
        addPeriodeButton.addEventListener('click', () => {
            addPeriodeModal.classList.remove('hidden');
        });

        // Hide the modal when the cancel button is clicked
        cancelPeriodeButton.addEventListener('click', () => {
            addPeriodeModal.classList.add('hidden');
        });

        // Add another dropdown for "Nama Siswa"
        addSiswaButton.addEventListener('click', () => {
            if (siswaCount < 4) {
                siswaCount++;
                const siswaSection = document.getElementById('siswaSection');
                const newSiswaSelect = document.createElement('div');
                newSiswaSelect.classList.add('mb-4');
                newSiswaSelect.innerHTML = `\
                    <label for="namaSiswa${siswaCount}" class="block text-gray-700 font-bold">Nama Siswa</label>\
                    <select id="namaSiswa${siswaCount}" name="namaSiswa[]" class="w-full border border-gray-300 rounded-lg p-2" required>\
                        <option value="">Pilih Siswa</option>\
                        <option value="Siswa 1">Siswa 1</option>\
                        <option value="Siswa 2">Siswa 2</option>\
                        <option value="Siswa 3">Siswa 3</option>\
                    </select>\
                `;
                siswaSection.appendChild(newSiswaSelect);

                // Hide the button when we reach the maximum of 6
                if (siswaCount === 4) {
                    addSiswaButton.style.display = 'none';
                }
            } else {
                alert('Maksimum 6 siswa hanya bisa dipilih.');
            }
        });

        // Handle form submission
        const addPeriodeForm = document.getElementById('addPeriodeForm');
        addPeriodeForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Get form data
            const formData = new FormData(addPeriodeForm);
            const data = Object.fromEntries(formData.entries());

            console.log(data); // Replace with your logic to save data (e.g., AJAX or API call)

            // Close the modal after submission
            addPeriodeModal.classList.add('hidden');
        });

        // Edit Periode function
        function editPeriode(periode) {
            // Populate form fields with the data from the selected periode
            document.getElementById('namaSiswa1').value = periode.namasiswa;
            document.getElementById('namaDUDI').value = periode.namadudi;
            document.getElementById('tanggalMulai').value = periode.tanggalmulai;
            document.getElementById('tanggalBerakhir').value = periode.tanggalberakhir;

            // Show modal for editing
            addPeriodeModal.classList.remove('hidden');
        }

        // Delete Periode function
        function deletePeriode(id) {
            const confirmation = confirm("Apakah Anda yakin ingin menghapus periode ini?");
            if (confirmation) {
                // Make AJAX request to delete the period from the server
                // Example (this needs a real back-end route):
                // fetch(`/deletePeriode/${id}`, { method: 'DELETE' })
                //     .then(response => response.json())
                //     .then(data => {
                //         if (data.success) {
                //             document.getElementById(`periode-${id}`).remove();
                //         } else {
                //             alert("Gagal menghapus periode.");
                //         }
                //     });

                // For demo purposes, just remove the row from the table
                document.getElementById(`periode-${id}`).remove();
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
