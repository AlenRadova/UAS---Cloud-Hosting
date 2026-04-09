<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'admin') {
  header("Location: ../auth/login.php");
  exit;
}

include "../config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM layanan");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="../assets/css/frontend.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<header>
  <nav class="admin-nav">
    <div class="admin-nav-left">⚙️ Admin <span>Panel</span></div>
    <div class="admin-nav-right">
      <a href="dashboard.php">Dashboard</a>
      <a href="tambah.php">Tambah Layanan</a>
      <a href="../index.php">Website</a>
      <a href="../auth/logout.php" class="logout">Logout</a>
    </div>
  </nav>
</header>

<main>

  <section class="admin-box">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <?= $_SESSION['username']; ?></p>
  </section>

  <section>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Jenis</th>
          <th>Spesifikasi</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php $no=1; while($row=mysqli_fetch_assoc($data)): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['jenis'] ?></td>
          <td><?= $row['spesifikasi'] ?></td>
          <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>">Hapus</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </section>

</main>

</body>

</html>
