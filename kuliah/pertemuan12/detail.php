<?php 

session_start();
// cek sessionnya, apakah sudah login atau blum
if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

// ambil id dari URL
$id = $_GET['id'];

// query santri berdasarkan id
$santri = query("SELECT * FROM santri WHERE id = $id");
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Mahasiswa</title>
</head>
<body> 
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $santri['gambar']; ?>" width="50"></li>
    <li>Nama : <?= $santri['nama']; ?></li>
    <li>Nis :  <?= $santri['nis']; ?></li>
    <li>Email : <?= $santri['email']; ?></li>
    <li>Kelas : <?= $santri['kelas']; ?></li> 
    <li> <a href="ubah.php?id=<?= $santri['id'];?>">ubah</a> | 
    <a href="hapus.php?id=<?= $santri['id'];?>" onclick="return confirm ('apakah anda yakin menghapus data ini?')">Hapus</a>
  </li>
    <li><a href="index.php">kembali ke halaman selanjutnya</a></li>
  </ul>
</body>
</html>