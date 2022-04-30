<?php 


require "functions.php";

// tampung ke variabel mahasiswa 
$mahasiswa = query("SELECT * FROM santri");

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

<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>id</th>
<th>Gambar</th>
<th>Nama</th>
<th>Lihat Detail</th> 
</tr>


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