<?php
// koneksi ke database 
$conn = mysqli_connect("localhost", "root", "", "petcare_data_hewan");

function tambah($data)
{
	global $conn;

    $animal_name = htmlspecialchars($data["animal_name"]);
    $animal_age = htmlspecialchars($data["animal_age"]);
    $animal_type = htmlspecialchars($data["animal_type"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $jk = htmlspecialchars($data["jk"]);

    $query = "INSERT INTO data_hewan VALUES ('', '$animal_name', '$animal_age', '$animal_type', '$keterangan', '$jk')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>