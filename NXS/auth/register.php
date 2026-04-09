<?php
include "../config/koneksi.php";

if (isset($_POST['register'])) {

  $username = trim($_POST['username']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  mysqli_query($koneksi, "
    INSERT INTO users (username, password, role)
    VALUES ('$username', '$password', 'user')
  ");

  echo "
    <script>
      alert('Registrasi berhasil! Silakan login.');
      window.location.href = 'login.php';
    </script>
  ";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/frontend.css">
</head>

<body>

<header></header>

<main>
  <section class="admin-box">
    <h2>Register</h2>

    <form method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="register">Register</button>
    </form>

    <p style="margin-top:10px;">
      Sudah punya akun?
      <a href="login.php">Login</a>
    </p>
  </section>
</main>

<footer></footer>

</body>
</html>
