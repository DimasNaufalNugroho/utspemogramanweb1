<?php
// Hubungkan ke database
include 'koneksi.php';

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk memeriksa user
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verifikasi password
    if (md5($password) === $user['password']) {
        // Redirect ke halaman dashboard jika login berhasil
        header("Location: main.html");
    } else {
        // Redirect kembali ke login dengan pesan error
        header("Location: login.php?error=Invalid password");
    }
} else {
    // Redirect kembali ke login dengan pesan error
    header("Location: login.php?error=User not found");
}

$stmt->close();
$conn->close();
?>
