<x-mainTemplate>
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <p class="text-gray-800 text-lg">Hari ini: <span class="font-semibold text-black"><?php echo date('d / m / Y'); ?></span></p>
        <button class="bg-blue-600 text-white py-3 px-6 rounded-lg shadow-md hover:bg-blue-700 transition-all text-lg font-semibold">Buat Jurnal</button>
    </div>
    
    <!-- Table -->
    <div class="overflow-x-auto rounded-lg">
        <table class="min-w-full table-auto text-md text-left text-gray-900 border-collapse rounded-lg">
            <thead class="text-black text-lg">
                <tr>
                    <th class="px-8 py-5 border-b">No</th>
                    <th class="px-8 py-5 border-b">Nama</th>
                    <th class="px-8 py-5 border-b">NIS</th>
                    <th class="px-8 py-5 border-b">Foto Jurnal</th>
                    <th class="px-8 py-5 border-b">Isi Jurnal</th>
                    <th class="px-8 py-5 border-b">Aktivitas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $jurnals = [
                        ["nama" => "Budi", "nis" => "12345", "foto" => "foto1.jpg", "isi" => "Isi jurnal Budi", "verified" => false],
                        ["nama" => "Ani", "nis" => "67890", "foto" => "foto2.jpg", "isi" => "Isi jurnal Ani", "verified" => true],
                    ];
                    foreach ($jurnals as $index => $jurnal) {
                        echo "<tr class='hover:bg-gray-50 transition-all'>";
                        echo "<td class='px-8 py-5 border-b font-medium text-center'>" . ($index + 1) . "</td>";
                        echo "<td class='px-8 py-5 border-b'>{$jurnal['nama']}</td>";
                        echo "<td class='px-8 py-5 border-b'>{$jurnal['nis']}</td>";
                        echo "<td class='px-8 py-5 border-b'><img src='{$jurnal['foto']}' alt='Foto' class='w-16 h-16 rounded-lg object-cover shadow-sm'></td>";
                        echo "<td class='px-8 py-5 border-b'>{$jurnal['isi']}</td>";
                        echo "<td class='px-8 py-5 border-b pl-6' id='activity-{$index}'>";
                        if (!$jurnal['verified']) {
                            echo "<button class='px-8 py-3 rounded-full bg-black text-white hover:bg-gray-700 transition-all transform hover:scale-105 font-semibold' onclick='verifyJournal({$index})'>Verifikasi</button>";
                        } else {
                            echo "<span class='font-semibold text-lg text-green-600'>Terverifikasi</span>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function verifyJournal(index) {
            document.getElementById(`activity-${index}`).innerHTML = "<span class='font-semibold text-lg text-green-600'>Terverifikasi</span>";
        }
    </script>
</x-mainTemplate>
