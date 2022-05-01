<?php 
require 'functions.php';

// cek apakah  tombol udah di tekan atau belum
 if (isset($_POST['tambah'])) {
   if (tambah($_POST) > 0) {
    echo "<script>
          alert('data berhasil ditambahkan');
          document.location.href = 'index.php';
        </script>";
   }else {
     echo "data gagal ditambahkan"; 
   }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data $santri</title>
</head>
<body>
  <h3>Form Data Santri</h3>

<form action="" method="POST">
<ul>
  <li>
    <label>
      nama :
      <input type="text" name="nama" autofocus required>
    </label>  
  </li>
  <li>
    <label>
      nis :
      <input type="text" name="nis" required>
    </label>  
  </li>
  <li>
    <label>
      email :
      <input type="text" name="email" required>
    </label>      
  </li>
  <li>
    <label>
      kelas : 
      <input type="text" name="kelas" required>
    </label>
  </li>
  <li>
    <label>
      gambar
      <input type="text" name="gambar" required>
    </label>
  </li>
  <li>
  <button type="submit" name="tambah"> tambah</button>
  </li>
</ul>
</form>
<a href="index.php">kembali kehalaman selanjutnya</a>
</body>
</html>