<?php 
//  koneksi ke database dan pilih database
$conn = mysqli_connect('localhost', 'root','','pw2020311910089');

//  Query isi tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM santri");

//  ubah data ke dalam array
// $row = mysqli_fetch_row($result);//array numeric
// $row = mysqli_fetch_assoc($result);//array assosiatif
// $row = mysqli_fetch_array($result);//array keduanya
$rows = [];
while ($row = mysqli_fetch_assoc($result)){
$rows[] = $row;

}

// tampung ke variabel mahasiswa 
$santri = $rows;

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
<table border="1" cellpadding="10" cellspacing="0">
<tr>
<th>id</th>
<th>Gambar</th>
<th>Nis</th>
<th>Nama</th>
<th>Email</th>
<th>Jurusan</th>
<th>Gambar</th>
<th>Aksi</th>
</tr>


<?php $i = 1;
 foreach($santri as $m): ?>
<tr>
  <td><?= $i++; ?></td>
  <td><img src="img/<?= $m['gambar']; ?>" width="50"></td>
  <td><?= $m['nama']; ?></td>
  <td><?= $m['nis']; ?></td>
<td><?= $m['email']; ?></td>
<td><?= $m['kelas']; ?></td>
<td><?= $m['gambar']; ?></td>
<td>
  <a href="">ubah</a> | <a href="">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>