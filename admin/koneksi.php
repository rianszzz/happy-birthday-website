<?php
session_start();
$host = "localhost";
$user = "root"; // sesuaikan dengan user mysql Anda
$pass = "";     // sesuaikan dengan password mysql Anda
$db   = "birthday";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>