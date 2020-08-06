<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nh = $_POST['nama_hewan'];
	$usia = $_POST['usia'];
	$keluhan = $_POST['keluhan'];
	$fasilitas = $_POST['fasilitas'];
	$jk = $_POST['jk'];

	$query = "INSERT INTO tb_reservasi (nama_hewan, usia, keluhan, fasilitas, jk) 
		 VALUES 
		('$nh', '$usia', '$keluhan', '$fasilitas', '$jk')";

	$exeQuery = mysqli_query($conn, $query);

	echo ($exeQuery) ? json_encode(array('kode' => 1, 'pesan' => 'berhasil menambahkan data')) : json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
}

else {
	echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?>