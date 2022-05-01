<?php 


require "functions.php";

// tampung ke variabel mahasiswa 
$mahasiswa = query("SELECT * FROM santri");

//ketika tombol cari di klik
if (isset($_POST['CARI'])) {
  $mahasiswa = cari($_POST['keyword']);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Mahasiswa</title>
</head>
<body>
  <h3>Daftar Mahasiswa</h3>
<a href="tambah.php">Tambah data Mahasiswa</a>
<br><br>


<form action="" method="POST">
<input type="text" name="keyword" size="30" placeholder="masukan pencarian" autocomplete="off" autofocus>
<button type="submit" name="cari">cari !</button>

</form>
<br><br>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>id</th>
<th>Gambar</th>
<th>Nama</th>
<th>Lihat Detail</th> 
</tr>


<?php if(empty($mahasiswa)) : ?>

<tr>
<td colspan="4">
  <p style="color: red; font-style:italic;">data mahasiswa tidak di temukan</p>
</td>
</tr>
<?php endif; ?>



<?php $i = 1;
 foreach($mahasiswa as $m): ?>
<tr>
  <td><?= $i++; ?></td>
  <td><img src="img/<?= $m['gambar']; ?>" width="50"></td>
  <td><?= $m['nama']; ?></td>
<td>
   <a href="detail.php?id=<?= $m['id']; ?>">Lihat Detail</a>

</td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>