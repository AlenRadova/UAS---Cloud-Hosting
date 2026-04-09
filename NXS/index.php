<?php
session_start();
include "config/koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM layanan ORDER BY id DESC");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>QueenCloud</title>
  <link rel="stylesheet" href="assets/css/frontend.css" />
</head>

<body>

<!-- ================= HEADER / NAVBAR ================= -->
<header class="nav">
  <img class="nxs" src="logos/nexus-logo-DIsJWsrL.png" alt="QueenCloud Logo">

  <h1>QUEEN<span class="highlight-nav">CLOUD</span></h1>

  <nav class="nav-links">
    <a href="#">Home</a>
    <a href="#">Hosting</a>
    <a href="#">Support</a>

    <?php if (!isset($_SESSION['login'])): ?>
      <!-- BELUM LOGIN -->
      <div class="account">
        <div class="account-btn">👤 Account ▾</div>
        <div class="account-popover">
          <a href="auth/login.php">Login</a>
          <a href="auth/register.php">Register</a>
        </div>
      </div>
    <?php else: ?>
      <!-- SUDAH LOGIN -->
      <div class="account">
        <div class="account-btn">👤 Dashboard ▾</div>
        <div class="account-popover">
          <a href="#">Dashboard</a>

          <?php if ($_SESSION['role'] === 'admin'): ?>
            <a href="admin/dashboard.php">Admin Panel</a>
          <?php endif; ?>

          <hr>
          <a href="auth/logout.php" class="logout">Logout</a>
        </div>
      </div>
    <?php endif; ?>
  </nav>
</header>

<!-- ================= HERO SECTION ================= -->
<section class="container">
  <p>Digital Solutions</p>
  <p>Game Hosting</p>
  <p>24/7 Support</p>
  <p>Trusted Partner</p>
</section>

<!-- ================= MAIN CONTENT ================= -->
<main class="content">

  <!-- TITLE -->
  <section class="title-main">
    <h1>
      Website & Hosting <span class="highlight">Solutions Indonesia</span>
    </h1>
    <img class="star" src="logos/star.png" alt="Star Decoration">
    <p>
      Professional website development & enterprise-grade game hosting
      with anti-swap protection, 24/7 support, and guaranteed performance.
    </p>
  </section>

  <!-- HOSTING LIST -->
  <section class="info-section">
    <h2>Daftar Layanan Hosting</h2>

    <section class="cards">
      <?php while ($row = mysqli_fetch_assoc($data)) : ?>
        <article class="card">
          <h3><?= htmlspecialchars($row['jenis']); ?></h3>

          <p class="spec">
            <?= nl2br(htmlspecialchars($row['spesifikasi'])); ?>
          </p>

          <div class="price">
            Rp <?= number_format((int)$row['harga'], 0, ',', '.'); ?> / bulan
          </div>

          <?php if (!empty($row['link'])) : ?>
            <a href="<?= htmlspecialchars($row['link']); ?>" 
               target="_blank" 
               class="btn">
              Pesan Sekarang
            </a>
          <?php endif; ?>
        </article>
      <?php endwhile; ?>
    </section>
  </section>

</main>

<!-- ================= FOOTER ================= -->
<footer>
  <p>© 2025 QueenCloud | All Rights Reserved</p>
</footer>

</body>
</html>
