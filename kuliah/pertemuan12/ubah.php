<?php 

session_start();
// cek sessionnya, apakah sudah login atau blum
if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("location: index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query santri berdasarkan id
$santri = query("SELECT * FROM santri WHERE id=$id");


// cek apakah  tombol udah di tekan atau belum
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
   echo "<script>
         alert('data berhasil ditambahkan');
         document.location.href = 'index.php';
       </script>";
  }else {
    echo "<script>
         alert('data tidak berhasil ditambahkan');
         document.location.href = 'index.php';
       </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data $santri</title>
</head>
<body>
  <h3>Form Ubah Santri</h3>

<form action="" method="POST">
  <input type="hidden" name="id" value="<?= $santri['id']; ?>">
<ul>
  <li>
    <label>
      nama :
      <input type="text" name="nama" autofocus required value="<?= $santri['nama']; ?>">
    </label>  
  </li>
  <li>
    <label>
      nis :
      <input type="text" name="nis" required value="<?= $santri['nis']; ?>">
    </label>  
  </li>
  <li>
    <label>
      email :
      <input type="text" name="email" required value="<?= $santri['email']; ?>">
    </label>      
  </li>
  <li>
    <label>
      kelas : 
      <input type="text" name="kelas" required value="<?= $santri['kelas']; ?>">
    </label>
  </li>
  <li>
    <label>
      gambar
      <input type="text" name="gambar" required value="<?= $santri['gambar']; ?>">
    </label>
  </li>
  <li>
  <button type="submit" name="ubah"> Ubah</button>
  </li>
</ul>
</form>
<a href="index.php">kembali kehalaman selanjutnya</a>
</body>
</html>