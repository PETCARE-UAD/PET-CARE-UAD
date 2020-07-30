<?php
  include "koneksi.php";
  $nama_hewan  = $_REQUEST['nama_hewan'];
  $usia  = $_REQUEST['usia'];
  $keluhan  = $_REQUEST['keluhan'];
  $fasilitas  = $_REQUEST['fasilitas'];
  $jk  = $_REQUEST['jk'];
  $mysqli  = "INSERT INTO petcare (nama_hewan, usia, keluhan, fasilitas, jk) VALUES ('$nama_hewan', '$usia',  '$keluhan',  '$fasilitas',  '$jk')";
  $result  = mysqli_query($koneksi, $mysqli);
  if ($result) {
    echo "<script>alert('Hewan anda bisa kami rawat!');window.location='index.php'</script>";
  } else {
    echo "<script>alert('Mohon maaf hewan anda tidak bisa kami rawat.');window.location='index.php'</script>";
  }
  mysqli_close($koneksi);
?>
