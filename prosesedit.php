<?php
session_start();
require 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah ID pesanan telah diberikan melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data pesanan berdasarkan ID
    $sql = "SELECT * FROM booking WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika pesanan ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Pesanan tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pesanan tidak diberikan.";
    exit();
}

// Proses update data pesanan jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $whatsapp = $_POST['whatsapp'];
    $hari_kunjungan = $_POST['hari_kunjungan'];
    $paket_inap = isset($_POST['paket_inap']) ? 1 : 0;
    $paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
    $paket_makan = isset($_POST['paket_makan']) ? 1 : 0;
    $harga = $_POST['harga'];
    $jml_peserta = $_POST['jml_peserta'];
    $total = $_POST['total'];
    $package_id = $_POST['package_id'];

    // Update data pesanan
    $sql = "UPDATE booking SET nama=?, whatsapp=?, hari_kunjungan=?, paket_inap=?, paket_transport=?, paket_makan=?, harga=?, jml_peserta=?, total=?, package_id=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiiiiiiisi", $nama, $whatsapp, $hari_kunjungan, $paket_inap, $paket_transport, $paket_makan, $harga, $jml_peserta, $total, $package_id, $id);

    if ($stmt->execute()) {
        header("Location: editpaket.php?id=" . $id . "success=1");
        exit();
    } else {
        echo "Terjadi kesalahan saat mengupdate data.";
    }
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

<body class="bg-gray-100 text-gray-800">
    <header class="bg-indigo-600 text-white p-4">
        <h1 class="text-3xl font-bold text-center">Edit Pesanan</h1>
    </header>

    <main class="max-w-lg mx-auto p-4 bg-white shadow-md rounded-lg mt-5">
        <form method="POST">
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['nama']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="whatsapp" class="block text-sm font-medium text-gray-700">Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['whatsapp']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="hari_kunjungan" class="block text-sm font-medium text-gray-700">Hari Kunjungan</label>
                <input type="number" name="hari_kunjungan" id="hari_kunjungan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['hari_kunjungan']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="paket_inap" class="block text-sm font-medium text-gray-700">Paket Inap</label>
                <input type="checkbox" name="paket_inap" id="paket_inap" class="mt-1" <?php echo $row['paket_inap'] ? 'checked' : ''; ?>>
            </div>

            <div class="mb-4">
                <label for="paket_transport" class="block text-sm font-medium text-gray-700">Paket Transport</label>
                <input type="checkbox" name="paket_transport" id="paket_transport" class="mt-1" <?php echo $row['paket_transport'] ? 'checked' : ''; ?>>
            </div>

            <div class="mb-4">
                <label for="paket_makan" class="block text-sm font-medium text-gray-700">Paket Makan</label>
                <input type="checkbox" name="paket_makan" id="paket_makan" class="mt-1" <?php echo $row['paket_makan'] ? 'checked' : ''; ?>>
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga (Rp.)</label>
                <input type="number" name="harga" id="harga" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['harga']; ?>" required readonly>
            </div>

            <div class="mb-4">
                <label for="jml_peserta" class="block text-sm font-medium text-gray-700">Jumlah Peserta</label>
                <input type="number" name="jml_peserta" id="jml_peserta" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['jml_peserta']; ?>" required>
            </div>

            <div class="mb-4">
                <label for="total" class="block text-sm font-medium text-gray-700">Total (Rp.)</label>
                <input type="number" name="total" id="total" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="<?php echo $row['total']; ?>" required readonly>
            </div>

            <div class="mb-4">
                <label for="package_id" class="block text-sm font-medium text-gray-700">Pilih Wisata</label>
                <select name="package_id" id="package_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                    <option>Ciboerpass</option>
                    <option>Panyaweuyan</option>
                    <option>Situ Cipanten</option>
                    <option>Curug Cipeuteuy</option>
                </select>
            </div>

            <div class="flex justify-between">
                <button type="submit" class="bg-indigo-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700">Update Pesanan</button>
                <a href="edit.php" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded-md shadow-sm hover:bg-gray-700">Kembali</a>
            </div>
        </form>
    </main>
</body>

</html>

<script>
    //tentukan konstanta biaya masing-masing
    const paket_inap = 1000000;
    const paket_transport = 1200000;
    const paket_makan = 500000;

    function updateTotalCost() {
        //inisisi harga paket 0
        let totalCost = 0;

        //referensi dari checkbox
        const inapCheckbox = document.getElementById('paket_inap');
        const transportCheckbox = document.getElementById('paket_transport');
        const makanCheckbox = document.getElementById('paket_makan');

        //jika inap checkbox ter-check
        if (inapCheckbox.checked) {
            totalCost += paket_inap;
        }

        //jika transport checkbox ter-check
        if (transportCheckbox.checked) {
            totalCost += paket_transport;
        }

        //jika makan checkbox ter-check
        if (makanCheckbox.checked) {
            totalCost += paket_makan;
        }

        document.getElementById('harga').value = totalCost;
    }

    function updateTotal() {
        let TotalTagihan = 0;

        var hari_kunjungan = document.getElementById('hari_kunjungan').value;
        var jml_peserta = document.getElementById('jml_peserta').value;
        var harga = document.getElementById('harga').value;

        TotalTagihan = hari_kunjungan * jml_peserta * harga;

        document.getElementById('total').value = TotalTagihan;
    }

    document.getElementById('paket_inap').addEventListener('change', updateTotalCost);
    document.getElementById('paket_transport').addEventListener('change', updateTotalCost);
    document.getElementById('paket_makan').addEventListener('change', updateTotalCost);

    document.getElementById('paket_inap').addEventListener('change', updateTotal);
    document.getElementById('paket_transport').addEventListener('change', updateTotal);
    document.getElementById('paket_makan').addEventListener('change', updateTotal);

    document.getElementById('hari_kunjungan').addEventListener('change', updateTotalCost);
    document.getElementById('jml_peserta').addEventListener('change', updateTotalCost);

    document.getElementById('hari_kunjungan').addEventListener('change', updateTotal);
    document.getElementById('jml_peserta').addEventListener('change', updateTotal);

    updateTotalCost();
    updateTotal();
</script>
<?php
$conn->close();
?>