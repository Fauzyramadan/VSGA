<?php
$id = $_GET['id'];
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Paket Wisata</title>
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-3xl">Pemesanan Paket Wisata</h1>
    </header>

    <main class="p-4">
        <h2 class="text-2xl mb-4">Paket Wisata <?= $id ?></h2>
        <form action="process_booking.php" method="post" class="bg-white p-4 rounded-lg shadow">
            <input type="hidden" name="package_id" value="<?= $id ?>">
            <div class="mb-4">
                <label class="block text-gray-700">Nama:</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Email:</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700">Jumlah Orang:</label>
                <input type="number" name="quantity" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white p-2 rounded">Pesan Sekarang</button>
        </form>
    </main>
</body>

</html>