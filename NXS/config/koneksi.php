<?php
define('BASE_URL', '/NXS/');

$koneksi = mysqli_connect("localhost", "root", "", "queencloud");

if (!$koneksi) {
    die("Koneksi database gagal");
}
?>