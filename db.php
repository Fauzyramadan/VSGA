<?php
$host = 'localhost'; // Nama host, biasanya 'localhost'
$db = 'finaltask';  // Nama database
$user = 'root';      // Nama pengguna MySQL
$pass = '';          // Kata sandi MySQL

$conn = new mysqli($host, $user, $pass, $db);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi ke database gagal: " . $e->getMessage());
}
