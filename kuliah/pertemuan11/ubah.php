<?php 
require 'functions.php';

// jika tidak ada id di URL
if (!isset($_GET['$id'])) {
  header("location : index.php");
  exit;
}

// ambil id dari URL
$id = $_GET['id'];

// query santri berdasarkan id
$m = query("SELECT * FROM santri WHERE id = $id");
 
// cek apakah  ubah udah di tekan atau belum
 if (isset($_POST['ubah'])) {
   if (ubah($_POST) > 0) {
    echo "<script>
          alert('data berhasil diubah');
          document.location.href = 'index.php';
        </script>";
   }else {
     echo "data gagal diubah"; 
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ubah Data $santri</title>
</head>
<body>
  <h3>Form ubah Santri</h3>

<form action="" method="POST"></form>
<input type="hidden"name="id"value="<?= $m['id']; ?>>
<ul>
  <li>
    <label>
      ubah :
      <input type="text" name="ubah" autofocus required value="<?= $m['nama']; ?>">
    </label>  
  </li>
  <li>
    <label>
      nis :
      <input type="text" name="nis"value="<?= $m['nis']; ?>>
    </label>  
  </li>
  <li>
    <label>
      email :
      <input type="text" name="email"value="<?= $m['email']; ?>>
    </label>      
  </li>
  <li>
    <label>
      kelas : 
      <input type="text" name="kelas"value="<?= $m['kelas']; ?>>
    </label>
  </li>
  <li>
    <label>
      gambar
      <input type="text" name="gambar"value="<?= $m['gambar']; ?>>
    </label>
  </li>
  <li>
  <button type="submit" name="ubah"> ubah</button>
  </li>
</ul>

<a href="index.php">kembali kehalaman selanjutnya</a>
</body>
</html>