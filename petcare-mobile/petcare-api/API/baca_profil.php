<?php
require_once 'koneksi.php';

$query = "SELECT * FROM tb_pemilikhewan ORDER BY id_pemilik";

$result = mysqli_query($conn, $query);

$array = array();

while ($row  = mysqli_fetch_assoc($result)) {
	$array[] = $row;
}


echo ($result) ?
	json_encode(array("kode" => 1, "result" => $array)) : json_encode(array("kode" => 0, "pesan" => "data tidak ditemukan"));
?>