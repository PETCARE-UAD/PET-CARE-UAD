<?php 
include 'koneksi.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$query = mysql_query("select * from user where username='$username' and password='$password'");
$cek = mysql_num_rows($query);
if ($cek) {
    echo "<script>alert('Login sukses!');window.location='index.php'</script>";
  } else {
    echo "<script>alert('Login gagal!');window.location='index.php'</script>";
  }
?>
