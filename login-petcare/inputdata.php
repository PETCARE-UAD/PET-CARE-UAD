<?php 
// koneksi ke data base 
require 'function.php';

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"]))
{
    // cek apakah data berhasil ditambahkan atau tidak
    if(tambah($_POST) > 0)
    {
        echo "<script>alert('Data Berhasil Ditambahkan!')</script>";
    }
    else
    {
        echo "<script>alert('Data Gagal Ditambahkan!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>input-data-hewan-petcareuad</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="col-md-6 form-login">
        <div class="outter-form-login">
            <form action="" class="inner-login" method="post">
            <i class="fas fa-cat text-center" style="font-size: 36px; margin-left: 15%"> Input Data Hewan Page</i>
        
            <div class="form-group" style="margin-top: 2%">
                <label for="animal_name">Animal Name : </label><br>
                <input type="text" class="form-control" name="animal_name" id="animal_name" required>
            </div>

            <div class="form-group">
                <label for="animal_age">Animal Age : </label><br>
                <input type="text" class="form-control" name="animal_age" id="animal_age" required>
            </div>

            <div class="form-group">
                <label for="animal_type">Type of Animal : </label><br>
                <input type="radio" id="anjing" name="animal_type" value="anjing" required>
                <label for="anjing">Anjing </label><br>
                <input type="radio" id="hamster" name="animal_type" value="hamster" required>
                <label for="hamster">Hamster </label><br>
                <input type="radio" id="kelinci" name="animal_type" value="kelinci" required>
                <label for="kelinci">Kelinci </label><br>
                <input type="radio" id="kucing" name="animal_type" value="kucing" required>
                <label for="kucing">Kucing</label><br>
            </div>

            <div class="form-group">
                <label for="keterangan">Ciri dan Catatan Khusus : </label><br>
                <input type="text" class="form-control" name="keterangan" placeholder="ex : warna bulu dan sedang sakit/tidak, membutuhkan obat/tidak, alergi, etc" id="keterangan" required>
            </div>

            <div class="form-group">
                <label for="jk">Jenis kelamin : </label><br>
                <input type="radio" id="male" name="jk" value="male" required>
                <label for="male">Male </label><br>
                <input type="radio" id="female" name="jk" value="female" required>
                <label for="female">Female </label><br>
            </div>
                
            <button type="submit" class="btn btn-block btn-custom-green" name="submit">SUBMIT</button>
        </form>
    </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>