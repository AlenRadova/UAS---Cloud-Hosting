<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/frontend.css">
</head>

<body>

<header></header>

<main>
  <section class="admin-box">
    <h2>Login</h2>

    <form action="proses_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <p style="margin-top:10px;">
      Belum punya akun?
      <a href="register.php">Daftar di sini</a>
    </p>

    <?php if (isset($_GET['error'])): ?>
      <p class="error">Username atau password salah</p>
    <?php endif; ?>
  </section>
</main>

<footer></footer>

</body>
</html>
