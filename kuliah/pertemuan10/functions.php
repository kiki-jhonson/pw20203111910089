<?php 
function koneksi(){
  //  koneksi ke database dan pilih database
return mysqli_connect('localhost', 'root','','pw2020311910089');

}
function query($query){
  $conn = koneksi();

  $result = mysqli_query($conn, $query);
  
  // jika hasil hanya 1 data
  if (mysqli_num_rows($result) == 1){
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
  $rows[] = $row;

}
  return $rows;
}

function tambah($data)
{
var_dump($data);
$conn = koneksi();


$nama = htmlspesialchar($data['nama']);
$nis = htmlspesialchar($data['nis']);
$email = htmlspesialchar($data['email']);
$kelas = htmlspesialchar($data['kelas']);
$gambar = htmlspesialchar($data['gambar']);

$query = "INSERT INTO
            santri
        VALUES
        (NULL,'$nama', '$nis', '$email', '$kelas','$gambar');
";

mysqli_query($conn,$query);

return mysqli_affected_rows($conn);
}

?>