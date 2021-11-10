<?php
date_default_timezone_set('Asia/Jakarta');
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'demo';

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
} else {
    // echo "Koneksi database Berhasi.";
    // mysqli_close($conn);
}
