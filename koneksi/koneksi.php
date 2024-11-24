<?php
// Konfigurasi database
$host = "localhost"; // Host server database
$username = "root"; // Username MySQL (default: root)
$password = ""; // Password MySQL (kosong untuk server lokal)
$database = "wisata"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
} else {
    echo "Koneksi berhasil!";
}
?>
