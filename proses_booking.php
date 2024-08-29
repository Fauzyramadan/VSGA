<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Mengambil koneksi dari file koneksi.php
require 'db.php';

if ($conn === null) {
    die("Koneksi ke database gagal.");
}

// Ambil data dari form
$nama = $_POST['name'];
$whatsapp = $_POST['whatsapp'];
$hari_kunjungan = $_POST['hari_kunjungan'];
$paket_inap = isset($_POST['paket_inap']) ? 1 : 0;
$paket_transport = isset($_POST['paket_transport']) ? 1 : 0;
$paket_makan = isset($_POST['paket_makan']) ? 1 : 0;
$harga = $_POST['harga'];
$jml_peserta = $_POST['jml_peserta'];
$total = $_POST['total'];
$package_id = $_POST['package_id'];

// Siapkan pernyataan SQL
$sql = "INSERT INTO booking (nama, whatsapp, hari_kunjungan, paket_inap, paket_transport, paket_makan, harga, jml_peserta, total, package_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

// Gunakan prepared statement untuk mencegah SQL Injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssiiiisis", $nama, $whatsapp, $hari_kunjungan, $paket_inap, $paket_transport, $paket_makan, $harga, $jml_peserta, $total, $package_id);

// Eksekusi pernyataan dan periksa apakah berhasil
if ($stmt->execute()) {
    $_SESSION['success_message'] = "Pemesanan berhasil disimpan.";
    // Anda bisa mengarahkan pengguna ke halaman sukses atau dashboard di sini
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Tutup pernyataan dan koneksi
$stmt->close();
$conn->close();
