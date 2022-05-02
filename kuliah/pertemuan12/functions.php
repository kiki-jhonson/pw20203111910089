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
  $conn = koneksi();

$nama = htmlspecialchars($data['nama']);
$nis = htmlspecialchars($data['nis']);
$email = htmlspecialchars($data['email']);
$kelas = htmlspecialchars($data['kelas']);
$gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
            santri
            VALUES
            (null,'$nama','$nis', '$email','$kelas','$gambar');
             ";
mysqli_query($conn, $query) or die(mysqli_error($conn));

// echo mysqli_error($conn); 
return mysqli_affected_rows($conn);
}



function hapus($id)
{
$conn =  koneksi();
mysqli_query($conn, "DELETE FROM santri WHERE id = $id") or die(mysqli_error($conn)); 
return mysqli_affected_rows($conn);

}



function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
$nama = htmlspecialchars($data['nama']);
$nis = htmlspecialchars($data['nis']);
$email = htmlspecialchars($data['email']);
$kelas = htmlspecialchars($data['kelas']);
$gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE santri SET 
          nama = '$nama',
          nis = '$nis',
          email = '$email',
          kelas = '$kelas',
          gambar = '$gambar',
          WHERE id = $id";

 mysqli_query($conn, $query) or die(mysqli_error($conn));
 echo mysqli_error($conn); 
  return mysqli_affected_rows($conn);
}


function cari($keyword){
$conn = koneksi();
 
$query = "SELECT * FROM santri
          WHERE 
          nama LIKE '%$keyword%' OR
          nis LIKE '%$keyword%' OR
          email LIKE '%$keyword%' OR
          kelas LIKE '%$keyword%' OR
          gambar LIKE '%$keyword%' OR
          "; 
  $result = mysqli_query($conn, $query);
  
  $rows = [];
  
  while ($row = mysqli_fetch_assoc($result)){
  $rows[] = $row;

}
  return $rows;
}

function login($data)
{
$conn = koneksi();

$username = htmlspecialchars($data['username']);
$password = htmlspecialchars($data['password']);

if (query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {
  // set session dlu
 $_SESSION['login'] = true;

  header("location: index.php");
  exit;
} else {
  return [
    'error' => true,
    'pesan' => 'username atau pasword salah'
 ];
} 

}

function registrasi($data)
{
$conn = koneksi();

$username = htmlspecialchars(strtolower($data['username']));
$password1 = mysqli_real_escape_string($conn,$data['password1']);
$password2 = mysqli_real_escape_string($conn,$data['password2']);

//jika username atau password kosong
if (empty($username) || empty($password1) || empty($password2)) {
  echo"<script>
      alert('username / password tidak boleh kosong');
      document.location.href = 'registrasi.php';
      </script>";

return false;

  } 

// jika username sudah ada
if (query("SELECT * FROM user WHERE username = '$username'")) {
  echo"<script>
      alert('username sudah terdaftar');
      document.location.href = 'registrasi.php';
      </script>";
return false;
}


  //jika konfirmasi password tidak sesuai
  if ($password1 !== $password2){
    echo"<script>
        alert('password tidak sesuai');
        document.location.href='registrasi.php';
        </script>";

return false;
  }

  
// jika password < 5 digit
if (strlen($password1) < 5){
  echo"<script>
        alert('password tidak sesuai');
        document.location.href='registrasi.php';
        </script>";
  
  return false;
}


// jika username & password sudah sesuai
// enrkripsi password
$passwor_baru = password_hash($password1, PASSWORD_DEFAULT);
// insert ke table user

$query = "INSERT INTO user
          VALUES 
          (null,'$username', '$password_baru')
          ";
  mysqli_query($conn,$query) or die (mysqli_error($conn));
  return mysqli_affected_rows($conn);

}


?>