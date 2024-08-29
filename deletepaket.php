<?php
session_start();
require 'db.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Cek apakah parameter ID telah diberikan
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Pastikan ID adalah bilangan bulat

    // Siapkan dan jalankan query untuk menghapus data
    $sql = "DELETE FROM booking WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Jika penghapusan berhasil, kembalikan ke halaman edit pesanan
        header("Location: editpaket.php?msg=Data berhasil dihapus");
    } else {
        // Jika gagal, beri tahu pengguna
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID tidak diberikan.";
}

$conn->close();
