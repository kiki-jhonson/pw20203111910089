<?php 
session_start();

  
if (isset($_SESSION['login'])) {
  header("location: index.php");
  exit;
}

require 'functions.php';


//ketika login di klik
if (isset($_POST['login'])) {
  $login = login($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h3>From Login</h3>
  <?php if(isset($login['error'])) : ?>
  <p style="font-style: italic; color :red"><?= $login['pesan']; ?></p>
    <?php endif; ?>
    <form action="" method="POST">
<ul>
  <li>
    <label>
      Username : 
      <input type="text" name="username" autofocus autocomplete="off" required>
    </label>
  </li>
  <li>
    <label>
      Pasword :
      <input type="password" name="password" autofocus autocomplete="off" required>
    </label>
  </li>
  <li>
    <button type="submit" name="login">Loign</button>
  </li>
  <li>
    <a href="registrasi.php">tambah user baru </a>
  </li>
</ul>

  </form>
</body>
</html>