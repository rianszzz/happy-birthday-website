<?php
include 'admin/koneksi.php'; // Pastikan path ini benar

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $harapan = mysqli_real_escape_string($conn, $_POST['harapan']);

    $query = "INSERT INTO wishes (nama, harapan) VALUES ('$nama', '$harapan')";
    
    if (mysqli_query($conn, $query)) {
        echo "Berhasil";
    } else {
        echo "Error SQL: " . mysqli_error($conn);
    }
}
?>