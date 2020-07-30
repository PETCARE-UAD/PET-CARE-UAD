<?php
	include "koneksi.php";

	$id_petcare = $_GET["id_petcare"];
	$hewan = $_GET["hewan"];

	$query = "SELECT * FROM tb_petcare WHERE id_petcare = '$id_petcare'";
	$sql = mysqli_query($koneksi,$query)or die(mysqli_error());
	$row = mysqli_fetch_array($sql);

	$total = $row["harga"] * $hewan;

	echo $total;
	
?>
