<?php 

session_start();
// cek sessionnya, apakah sudah login atau blum
if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

require 'functions.php';


// if (!isset($_GET['$id'])) {
//   header("location : index.php");
//   exit;
// }


// mengambil id dari URL
$id = $_GET['id'];

if (hapus($id) > 0) {
echo  "<script>
        alert('data berhasil dihapus');
        document.location.href = 'index.php';
      </script>";
 }else {
   echo "<script>
   alert('data gagal dihapus');
   document.location.href = 'index.php';
 </script>";
 }

?>