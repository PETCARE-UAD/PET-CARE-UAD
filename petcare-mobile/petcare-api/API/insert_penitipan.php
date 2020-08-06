<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nh = $_POST['nama_hewan'];
	$jh = $_POST['jenis_hewan'];
	$cirkus = $_POST['ciri_khusus'];
	$lp = $_POST['lama_penitipan'];
	$fasilitas = $_POST['fasilitas'];
	$catkus = $_POST['catatan_khusus'];

	$query = "INSERT INTO tb_penitipan 
		(nama_hewan, jenis_hewan, ciri_khusus, 
		 lama_penitipan, fasilitas, catatan_khusus) 
		 VALUES 
		('$nh', '$jh', '$cirkus', '$lp', '$fasilitas', '$catkus')";

	$exeQuery = mysqli_query($conn, $query);

	echo ($exeQuery) ? json_encode(array('kode' => 1, 'pesan' => 'berhasil menambahkan data')) : json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
}

else {
	echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?>