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

?>