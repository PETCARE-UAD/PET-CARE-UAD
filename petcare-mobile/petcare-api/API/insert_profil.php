<?php

require_once 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$image = $_POST['image'];
	$nama = $_POST['nama_pemilik'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['nohp'];
	$email = $_POST['email'];

	/*$image = "eka.jpeg";
	$nama = "Eka Febrianto";
	$alamat = "Jogja";
	$nohp = "089657376000";
	$email = "eka@gmail.com";*/

	$query = "INSERT INTO tb_pemilikhewan (image, nama_pemilik, alamat, nohp, email) VALUES ('$image', '$nama', '$alamat', '$nohp', '$email')";

	$exeQuery = mysqli_query($conn, $query);

	echo ($exeQuery) ? json_encode(array('kode' => 1, 'pesan' => 'berhasil menambahkan data')) : json_encode(array('kode' => 2, 'pesan' => 'data gagal ditambahkan'));
}

else {
	echo json_encode(array('kode' => 101, 'pesan' => 'request tidak valid'));
}

?>