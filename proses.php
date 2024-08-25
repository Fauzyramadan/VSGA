<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $packageId = $_POST['package_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO bookings (package_id, name, email, quantity) VALUES (?, ?, ?, ?)");
    $stmt->execute([$packageId, $name, $email, $quantity]);

    echo "Terima kasih, $name. Pemesanan untuk paket wisata telah berhasil dilakukan.";
}
