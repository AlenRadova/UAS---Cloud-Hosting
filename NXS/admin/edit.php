<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    die("Akses ditolak!");
}

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM layanan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  mysqli_query($koneksi, "
    UPDATE layanan SET
      jenis='$_POST[jenis]',
      spesifikasi='$_POST[spesifikasi]',
      harga='$_POST[harga]',
      link='$_POST[link]'
    WHERE id='$id'
  ");
  header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/frontend.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <title>Edit Page</title>
</head>
<body>
  <div class="admin-nav">
  <div class="admin-nav-left">
    <span class="admin-title">⚙️ Admin Panel</span>
  </div>

  <div class="admin-nav-right">
    <a href="dashboard.php">Dashboard</a>
    <a href="tambah.php">Tambah Layanan</a>
    <a href="../index.php" target="_blank">🌐 Website</a>
    <a href="../auth/logout.php" class="logout">Logout</a>
  </div>
</div>

</body>
</html>

<h2>Edit Layanan</h2>
<form method="POST">
  <input type="text" name="jenis" value="<?= $row['jenis'] ?>"><br><br>
  <textarea name="spesifikasi"><?= $row['spesifikasi'] ?></textarea><br><br>
  <input type="text" name="harga" value="<?= $row['harga'] ?>"><br><br>
  <input type="text" name="link" value="<?= $row['link'] ?>"><br><br>
  <button name="update">Update</button>
</form>
