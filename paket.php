<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM packages WHERE id = ?");
$stmt->execute([$id]);
$package = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Paket Wisata</title>
    <link href="./output.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-3xl">Detail Paket Wisata</h1>
    </header>

    <main class="p-4">
        <h2 class="text-2xl mb-4"><?= $package['name'] ?></h2>
        <img src="assets/<?= $package['image'] ?>" alt="<?= $package['name'] ?>" class="rounded-lg">
        <p class="mt-4"><?= $package['description'] ?></p>
        <a href="booking.php?id=<?= $package['id'] ?>" class="text-blue-500 mt-4 block">Pesan Sekarang</a>
    </main>
</body>

</html>