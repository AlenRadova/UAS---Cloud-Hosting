<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak!");
}

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM layanan WHERE id='$id'");
header("Location: dashboard.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/frontend.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <title>Halaman Hapus</title>
</head>
<body>
    
</body>
</html>