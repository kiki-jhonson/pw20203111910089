<?php 
require 'functions.php';
// cek apakah tombol tambah sudah di tekan
if (isset($_POST['tambah'])) {
  if(tambah($_POST)>0)
  {
echo "data berhasil ditambahkan";
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
  <title>Tambah Data Santri</title>
</head>
<body>
  <h3> Tambah Data Santri</h3>
  <form action="" method="POST"></form>
  <ul>
    <li>
<label>
  nama
  <input type="text" name="nama" autofocus required>
</label>
    </li>
  <li>
<label>
  nis
  <input type="text" name="nis" required>
</label>
    </li>
  <li>
<label>
  email
  <input type="text" name="email" required>
</label>
    </li>
  <li>
<label>
  kelas
  <input type="text" name="kelas" required>
</label>
    </li>
  <li>
<label>
  gambat
  <input type="text" name="gambar" required>
</label>
    </li>
  <li>
<button type="submit" name="tambah">Tambah</button>
    </li>
  </ul>

</body>
</html>