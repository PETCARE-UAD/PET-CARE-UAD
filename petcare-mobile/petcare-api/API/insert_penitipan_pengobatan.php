<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nh = $_POST['nama_hewan'];
	$jh = $_POST['jenis_hewan'];
	$usia = $_POST['usia'];
	$cirkus = $_POST['ciri_khusus'];
	$jk = $_POST['jk'];
	$fasilitas = $_POST['fasilitas'];
	$catkus = $_POST['catatan_khusus'];
	$keluhan = $_POST['keluhan'];
	$lp = $_POST['lama_penitipan'];

	$query = "INSERT INTO tb_penitipan_dan_reservasi 
		(nama_hewan, jenis_hewan, usia, 
		 ciri_khusus, jk, fasilitas, 
		 catatan_khusus, keluhan, lama_penitipan) 
		 VALUES 
		('$nh', '$jh', '$usia', 
		 '$cirkus', '$jk', '$fasilitas',
		 '$catkus', '$keluhan', '$lp')";

	$exeQuery = mysqli_query($conn, $query);

	echo ($exeQuery) ? json_encode(array('kode' => 1, 'pesan' => 'berhasil menambahkan data')) : json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
}

else {
	echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?>