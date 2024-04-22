<?php
//koneksi.php
$host = "localhost"; // Sesuaikan dengan host database Anda
$user = "username"; // Sesuaikan dengan username database Anda
$password = "password"; // Sesuaikan dengan password database Anda
$database = "db_kasir4"; // Sesuaikan dengan nama database Anda

$koneksi = mysqli_connect("localhost","root","","db_kasir4");  

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Pastikan untuk memulai session jika Anda menggunakan session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
