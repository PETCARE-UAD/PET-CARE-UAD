<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>PETCAREUAD</title>
        <link rel="icons" type="image/x-icon" href="img/pet1.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.12.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" >
                    <img src="img/petcare.jpg" width="130">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#petcare">Petcare</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#hewan">Hewan</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pemilik-hewan">Pemilik Hewan</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#penitipan-dan-reservasi">Penitipan dan Reservasi</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#transaksi">Transaksi</a></li>
                        <span class="navbar-text mr-3">Silahkan login</span>
                        <a href="#" class="btn btn-outline-danger mr-2">Login</a>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- petcare Grid-->
        <section class="page-section bg-light" id="petcare">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Petcare</h2>
                </div>
                <table class="table text-center">
                    <tr>
                        <th scope="col">Jenis Patcare</th>
                        <th scope="col">Harga</th>
                    </tr>
                    <?php 
                    include 'koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi,"select * from tb_petcare");
                    while($d = mysqli_fetch_array($data)){
                        ?>
                        <tbody>
                        <tr>
                            <td><?php echo $d['jenis_petcare']; ?></td>
                            <td><?php echo $d['harga']; ?></td>
                        </tr>
                        </tbody>
                        <?php 
                    }
                    ?>
                </table>
            </div><br><br>
        </section>

        <!-- Hewan-->
        <section class="page-section bg-light" id="hewan">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Hewan</h2>
                </div>
                
                <div class="form-group row">
                    <a class="navbar-brand" href="#">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <img src="img/anjing1.jpg" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="200">
                            </div>
                            <div class="col-lg-4">
                                <img src="img/kucing.jpg" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="400">
                            </div>
                            <div class="col-lg-4">
                                <img src="img/hamster.jpg" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="500">
                            </div>
                            <div class="col-lg-4">
                                <img src="img/kelinci.jpg" alt="Image" class="img-fluid about_img_1" data-aos="fade" data-aos-delay="500">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <br><br><br><br><br>
        </section>

        <!-- pemilik hewan-->
        <section class="page-section" id="pemilik-hewan">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Pemilik Hewan</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <div class="form-group row">
                    <label for="inputnama-pemilik4" class="col-sm-2 col-form-label">Nama Pemilik</label>
                    <div class="custom-file">
                        <input type="nama-pemilik4" class="form-control" id="inputNama-pemilik4" placeholder="Masukkan Nama Pemilik Hewan" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputalamat4" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="custom-file">
                        <input type="alamat4" class="form-control" id="inputalamat4" placeholder=" Masukkan Alamat Rumah" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputnohp4" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="custom-file">
                        <input type="nohp4" class="form-control" id="inputnohp4" placeholder="Masukkan No Handphone" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputemail4" class="col-sm-2 col-form-label">Email</label>
                    <div class="custom-file">
                        <input type="email4" class="form-control" id="inputemail4" placeholder="Masukkan email" required>
                    </div>
                </div>
            </div><br><br><br><br><br>
        </section>

        <!-- Penitipan dan Reservasi-->
        <section class="page-section" id="penitipan-dan-reservasi">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Penitipan dan Reservasi</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
                <form method="post" action="simpan_reservasi.php">
                    <div class="form-group row">
                        <label for="inputNama-hewan3" class="col-sm-2 col-form-label">Nama Hewan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama-hewan" class="form-control" id="Nama-hewan" placeholder="Nama Hewan" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Hewan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jenis-hewan" name="jenis-hewan">
                                <option>Pilih Jenis Hewan</option>
                                <option value="anjing">anjing</option>
                                <option value="kelinci">kucing</option>
                                <option value="kucing">kelinci</option>
                                <option value="hamster">hamster</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputusia3" class="col-sm-2 col-form-label">Usia</label>
                        <div class="col-sm-10">
                            <textarea name="usia" class="form-control" placeholder="usia" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputciri-khusus3" class="col-sm-2 col-form-label">Ciri Khusus</label>
                        <div class="col-sm-10">
                            <textarea name="ciri-khusus" class="form-control" placeholder="ciri-khusus" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jk" name="jk">
                                <option>Pilih Jenis Hewan</option>
                                <option value="jantang">jantan</option>
                                <option value="betina">betina</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Fasilitas</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="fasilitas" name="fasilitas">
                                <option>Pilih Jenis Hewan</option>
                                <option value="antar jemput">antar jemput</option>
                                <option value="perawatan">perawatan</option>
                                <option value="antar jemput dan perawatan">antar jemput dan perawatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputcatatan-khusus3" class="col-sm-2 col-form-label">Catatan khusus</label>
                        <div class="col-sm-10">
                            <textarea name="catatan-khusus" class="form-control" placeholder="catatan-khusus" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputKeluhan3" class="col-sm-2 col-form-label">Keluhan</label>
                        <div class="col-sm-10">
                            <textarea name="keluhan" class="form-control" placeholder="Keluhan" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputlama-penitipan3" class="col-sm-2 col-form-label">Lama Penitipan</label>
                        <div class="col-sm-10">
                            <textarea name="lama-penitipan" class="form-control" placeholder="lama-penitipan" required></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </section>

        <!-- Transaksi-->
        <section class="page-section" id="transaksi">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Transaksi</h2>
                </div>
        <form method="post" action=".php">
        <div class="form-group row">
            <label for="inputpenerima3" class="col-sm-2 col-form-label">Penerima</label>
            <div class="col-sm-10">
                <input type="text" name="Penerima" class="form-control" id="Penerima" placeholder="penerima" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tanggal pembayaran</label>
            <div class="col-sm-10">
                <input type="text" name="tgl_pembayaran" class="form-control" id="inputTgl3" placeholder="dd/mm/yyyy">
            </div>
        </div>
        <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Petcare</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jenis-petcare" name="jenis-petcare">
                                <option>Pilih Jenis Petcare</option>
                                <option value="resevasi pengobatan">resevasi pengobatan</option>
                                <option value="penitipann">penitipann</option>
                                <option value="reservasi pengobatan dan penitipan">reservasi pengobatan dan penitipan
                                </option>
                            </select>
                        </div>
                    </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Total Pembayaran</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" id="total" name="total" readonly>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Pesan Petcare</button>
            </div>
        </div>
        </form>
        </div>
        </section>

        <!-- Modal-->
        <form method="post" action="login.php">
        <div class="modal fade" id="masuk" tabindex="-1" role="dialog" aria-labelledby="masukLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="masukLabel">log in</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="username" class="col-form-label">Username</label>
                                <input type="text" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">out</button>
                        <button type="submit" class="btn btn-primary">log in</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="text-center">
                    <a class="col-lg-4 text-lg-middle">Copyright &copy; 2020 by PETCARE></i></a>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
            $( "#hewan" ).change(function() {
              var id = $("#reservasi").val();
              var hewan = $("#hewan").val();
              console.log(hewan);
              $.ajax({
                url: "./hitung_total.php?id=" + id + "&hewan=" + hewan,
                success: function(result){
                    console.log(result);
                  $("#total").val(result);
                }
              });
            });
        </script>
    </body>
</html>
