<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
    die("Akses ditolak!");
}

if (isset($_POST['simpan'])) {
    $jenis = $_POST['jenis'];
    $spesifikasi = $_POST['spesifikasi'];
    $harga = (int) $_POST['harga']; // pastikan angka
    $link = $_POST['link'];

    mysqli_query($koneksi, "
        INSERT INTO layanan (jenis, spesifikasi, harga, link)
        VALUES ('$jenis', '$spesifikasi', '$harga', '$link')
    ");

    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Layanan | Admin</title>

  <link rel="stylesheet" href="../assets/css/frontend.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<header>
  <nav class="admin-nav">
    <div class="admin-nav-left">
      <span class="admin-title">⚙️ Admin <span>Panel</span></span>
    </div>

    <div class="admin-nav-right">
      <a href="dashboard.php">Dashboard</a>
      <a href="tambah.php">Tambah Layanan</a>
      <a href="../index.php" target="_blank">🌐 Website</a>
      <a href="../auth/logout.php" class="logout">Logout</a>
    </div>
  </nav>
</header>

<main>
  <section class="admin-box">
    <h2>Tambah Layanan</h2>

    <form method="POST">
      <input 
        type="text" 
        name="jenis" 
        placeholder="Jenis Hosting" 
        required
      >

      <textarea 
        name="spesifikasi" 
        placeholder="Spesifikasi Layanan" 
        required
      ></textarea>

      <input 
        type="number" 
        name="harga" 
        placeholder="Harga (Rp)" 
        min="0"
        required
      >

      <input 
        type="text" 
        name="link" 
        placeholder="Link Pemesanan"
        required
      >

      <button type="submit" name="simpan">
        Simpan Layanan
      </button>
    </form>
  </section>
</main>

</body>
</html>
