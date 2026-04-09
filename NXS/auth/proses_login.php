<?php
session_start();
include "../config/koneksi.php";

$username = trim($_POST['username']);
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$user = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['username'] = $user['username'];
    $_SESSION['role'] = $user['role'];

    // ADMIN ke dashboard, USER ke frontend
    if ($user['role'] === 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../index.php");
    }
    exit;

} else {
    header("Location: login.php?error=1");
    exit;
}
?>  