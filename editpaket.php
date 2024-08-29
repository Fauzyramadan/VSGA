<?php
session_start();
require 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// Ambil data pesanan dari database
$sql = "SELECT * FROM booking";
$result = $conn->query($sql);
if (isset($_GET['success']) && $_GET['success'] == '1') {
    echo "<script>
    alert('Pesanan berhasil diperbarui!');
</script>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pesanan</title>
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 w-full">

    <header class="bg-indigo-600  text-white p-4">
        <h1 class="text-3xl font-bold text-center">Edit Pesanan</h1>
    </header>

    <main class="p-4">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Whatsapp</th>
                    <th class="py-2 px-4 border-b ">Hari Kunjungan</th>
                    <th class="py-2 px-4 border-b">Paket Inap</th>
                    <th class="py-2 px-4 border-b">Paket Transport</th>
                    <th class="py-2 px-4 border-b">Paket Makan</th>
                    <th class="py-2 px-4 border-b">Harga (Rp.)</th>
                    <th class="py-2 px-4 border-b">Jumlah Peserta</th>
                    <th class="py-2 px-4 border-b">Total (Rp.)</th>
                    <th class="py-2 px-4 border-b">Wisata</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['nama'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['whatsapp'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['hari_kunjungan'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . ($row['paket_inap'] ? 'Ya' : 'Tidak') . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . ($row['paket_transport'] ? 'Ya' : 'Tidak') . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . ($row['paket_makan'] ? 'Ya' : 'Tidak') . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['jml_peserta'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . number_format($row['total'], 0, ',', '.') . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>" . $row['package_id'] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-center'>";
                        echo "<div class='flex justify-center space-x-2'>";  // Flex container with space between items
                        echo "<a href='prosesedit.php?id=" . $row['id'] . "' class='px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700'>Edit</a>";
                        echo "<a href='deletepaket.php?id=" . $row['id'] . "' class='px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700' onclick='return confirm(\"Apakah Anda yakin ingin menghapus pesanan ini?\")'>Hapus</a>";
                    }
                } else {
                    echo "<tr><td colspan='12' class='py-2 px-4 border-b text-center'>Tidak ada pesanan yang ditemukan</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="mt-6 flex justify-end">
            <a href="index.php" class="inline-block px-6 py-2 text-white bg-gray-600 hover:bg-gray-700 rounded-md">
                Kembali
            </a>
        </div>
    </main>

</body>

</html>

<?php
$conn->close();
?>