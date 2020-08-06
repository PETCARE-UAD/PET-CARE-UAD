<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$jh = $_POST['jenis_hewan'];
	$rh = $_POST['ras_hewan'];
	$cirkus = $_POST['ciri_khusus'];
	$jk = $_POST['jk'];

	$query = "INSERT INTO tb_hewan (jenis_hewan, ras_hewan, ciri_khusus, jk) 
		 VALUES 
		('$jh', '$rh', '$cirkus', '$jk')";

	$exeQuery = mysqli_query($conn, $query);

	echo ($exeQuery) ? json_encode(array('kode' => 1, 'pesan' => 'berhasil menambahkan data')) : json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
}

else {
	echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?>