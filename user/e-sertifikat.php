<?php
include "../connection/koneksi.php";
session_start();
error_reporting(0);
if (isset($_SESSION["ses_username"]) == "") {
  header("location:index");
} else {

  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_email = $_SESSION["ses_email"];
  $data_username = $_SESSION["ses_username"];
  $data_password = $_SESSION["ses_password"];
  $data_id_kampus = $_SESSION["ses_id_kampus"];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- SEO Meta description -->
  <meta name="description" content="Beasiswa Pendidikan Dosen Indonesia" />
  <meta name="author" content="Direktorat Sumber Daya" />

  <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
  <meta property="og:site_name" content="" />
  <!-- website name -->
  <meta property="og:site" content="" />
  <!-- website link -->
  <meta property="og:title" content="" />
  <!-- title shown in the actual shared post -->
  <meta property="og:description" content="" />
  <!-- description shown in the actual shared post -->
  <meta property="og:image" content="" />
  <!-- image link, make sure it's jpg -->
  <meta property="og:url" content="" />
  <!-- where do you want your post to link to -->
  <meta property="og:type" content="article" />

  <!--title-->
  <title>Unduh E-Sertifikat - Seminar Nasional Jurusan Kesehatan</title>

  <!--favicon icon-->
  <link rel="icon" href="./favicons/hikes.png" type="image/png" sizes="16x16" />

  <!--google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans:400,600&amp;display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <!--Bootstrap css-->
  <link rel="stylesheet" href="./css/css-bootstrap.min.css" />
  <!--Magnific popup css-->
  <link rel="stylesheet" href="./css/css-magnific-popup.css" />
  <!--Themify icon css-->
  <link rel="stylesheet" href="./css/css-themify-icons.css" />
  <!--Fontawesome icon css-->
  <link rel="stylesheet" href="./css/css-all.min.css" />
  <!--animated css-->
  <link rel="stylesheet" href="./css/css-animate.min.css" />
  <!--ytplayer css-->
  <link rel="stylesheet" href="./css/css-jquery.mb.YTPlayer.min.css" />
  <!--Owl carousel css-->
  <link rel="stylesheet" href="./css/css-owl.carousel.min.css" />
  <link rel="stylesheet" href="./css/css-owl.theme.default.min.css" />
  <!--custom css-->
  <link rel="stylesheet" href="./css/css-style.css" />
  <!--responsive css-->
  <link rel="stylesheet" href="./css/css-responsive.css" />
</head>

<body>
  <!--loader start-->
  <div id="preloader">
    <div class="loader1">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!--loader end-->

  <!--header section start-->
  <header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top bg-transparent">
      <div class="container">
        <a class="navbar-brand" href="index">
          <!-- <img src="images/img-logo-60.png" alt="logo" class="img-fluid" /> -->
          <img src="images/logo-nav.png" alt="logo" class="img-fluid" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="ti-menu"></span>
        </button>

        <?php

        include('layouts/nav.php')

        ?>

      </div>
    </nav>
  </header>
  <!--header section end-->
  <!--body content wrap start-->
  <div class="main">
    <!--header section start-->
    <section class="hero-section ptb-100 gradient-overlay" style="
          background: url('images/direktorat.jpg')
            no-repeat center center / cover;
        ">
      <div class="container">
        <div class="row justify-content-center"></div>
      </div>
    </section>
    <!--header section end-->

    <!--about us section start-->
    <section class="about-us-section ptb-100 gray-light-bg">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-12 col-lg-12">
            <!--<img src="https://digimark.themetags.com/img/slider-img-2.jpg" alt="services" class="img-fluid rounded shadow-sm"/>-->
            <div class="about-us-content-wrap">
              <h3>Unduh E-Sertifikat</h3>
              <span class="animate-border mb-4"></span>

              <div class='col-md-auto col-lg-auto'>

                <div class="single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded align-items-center">
                  <h4>Informasi Penting</h4>
                  <p>Pastikan sebelum mengunduh e-sertifikat, silahkan cek kembali nama anda, e-sertifikat hanya dapat di download sekali saja, apabila terdapat kesalahan segera lakukan perubahan melalui menu profil, karena nama yang terdaftar akan tercantum pada e-sertifikat yang tergenerate secara otomatis, sekian terimakasih.</p>
                </div>
              </div>

              <div class="row justify-content-center">


                <?php

                $BanyakDataPerHal = 6;
                $BanyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT tb_pendaftaran.id as id_pendaftaran, tb_seminar.nama as nama_seminar, tb_paket.nama as nama_paket, tb_pendaftaran.status, tb_sertifikat.url, tb_sertifikat.status as status_unduh FROM tb_pendaftaran INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_sertifikat ON tb_paket.id_sertifikat=tb_sertifikat.id INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user WHERE tb_user.id = '$data_id' AND tb_pendaftaran.status = 'lunas' AND tb_pendaftaran.sertifikat = 'aktif'"));
                $BanyakHal = ceil($BanyakData / $BanyakDataPerHal);

                if (isset($_GET['halaman'])) {
                  $halamanAktif = $_GET['halaman'];
                } else {
                  $halamanAktif = 1;
                }

                $DataAwal = ($BanyakDataPerHal * $halamanAktif) - $BanyakDataPerHal;

                $query = ("SELECT tb_pendaftaran.id as id_pendaftaran, tb_seminar.nama as nama_seminar, tb_paket.nama as nama_paket, tb_sertifikat.url, tb_sertifikat.status as status_unduh, tb_pendaftaran.sertifikat FROM tb_pendaftaran INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_sertifikat ON tb_paket.id_sertifikat=tb_sertifikat.id INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user WHERE tb_user.id = '$data_id' AND tb_pendaftaran.status = 'lunas' limit $DataAwal, $BanyakDataPerHal");
                $result = mysqli_query($koneksi, $query);



                while ($row = mysqli_fetch_array($result)) {

                  $Id_Pendaftaran = $row['id_pendaftaran'];
                  $Nama_Seminar = $row['nama_seminar'];
                  $Nama_Paket = $row['nama_paket'];
                  $Url_Sertifikat = $row['url'];
                  $StatusUnduh = $row['status_unduh'];
                  $StatusSertifikat = $row['sertifikat'];



                ?>

                  <?php

               

if ($StatusUnduh == "aktif" && $StatusSertifikat == "aktif") {

  echo "

   <div class='col-md-4 col-lg-4'>
  <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
    <div class='circle-icon'>
      <span class='fa fa-address-card text-white'></span>
    </div>
    <h5>$Nama_Seminar</h5>
    <p>$Nama_Paket</p>

    <a class='btn btn-success' href='#' data-bs-toggle='modal' data-bs-target='#Unduh-Sertifikat$Id_Pendaftaran'><i class='fa fa fa-download'></i></a>


  </div>
</div>


  ";
} elseif ($StatusUnduh == "aktif" && $StatusSertifikat == "tidak_aktif") {

  echo "

   <div class='col-md-4 col-lg-4'>
  <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
    <div class='circle-icon'>
      <span class='fa fa-address-card text-white'></span>
    </div>
    <h5>$Nama_Seminar</h5>
    <p>$Nama_Paket</p>

    <a class='btn btn-success' href='#' data-bs-toggle='modal' data-bs-target='#Sudah-Download$Id_Pendaftaran'><i class='fa fa fa-download'></i></a>


  </div>
</div>


  ";
}

elseif ($StatusUnduh == "tidak_aktif" && $StatusSertifikat == "aktif") {


  echo "

   <div class='col-md-4 col-lg-4'>
  <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
    <div class='circle-icon'>
      <span class='fa fa-address-card text-white'></span>
    </div>
    <h5>$Nama_Seminar</h5>
    <p>$Nama_Paket</p>

    <a class='btn btn-success' href='#' data-bs-toggle='modal' data-bs-target='#Belum-Tersedia$Id_Pendaftaran'><i class='fa fa fa-download'></i></a>


  </div>
</div>


  ";
}


?>




                  <!-- Modal Sertif -->
                  <div class="modal fade" id="Unduh-Sertifikat<?= $Id_Pendaftaran ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Unduh</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
                            <form action="e-sertifikat?url=<?=$Url_Sertifikat?>" method="post">
                             
                            <div class="mb-3">
                              <p>* Informasi * <br> E-Sertifikat Semnas akan dikirim melalui email paling lambat 1 jam setelah anda melakukan submit, sekian terimakasih.</p>
                              <label for="formFileSm" class="form-label">Name</label>
                              <input class="form-control form-control-sm" name="name" value="<?= $data_nama ?>" id="formFileSm" type="text" readonly required>
                            </div>
                            <div class="mb-3">
                              <label for="formFileSm" class="form-label">Email</label>
                              <input class="form-control form-control-sm" name="email" value='<?= $data_email ?>' id="formFileSm" type="email" readonly required>
                            </div>
                        </div>
                        <div class="modal-footer">
                    <button name="unduh-sertifikat" class="btn btn-success btn-sm">Submit</button>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>
                      
                      </div>
                    </div>
                  </div>

                  <!-- End Modal Sertif -->

                  <!-- Modal Error -->
                  <div class="modal fade" id="Belum-Tersedia<?= $Id_Pendaftaran ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h6>Sertifikat Masih Belum Bisa Didownload</h6>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- End Modal Error -->
                  
                   <!-- Modal Sudah Download -->
                  <div class="modal fade" id="Sudah-Download<?= $Id_Pendaftaran ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h6>Anda Sudah Mendownload Sertifikat</h6>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- End Modal Error -->





                <?php

                }

                $Previous = $halamanAktif - 1;
                $Next = $halamanAktif + 1;

                ?>

                <nav aria-label='Page navigation example'>
                  <ul class='pagination justify-content-center'>
                    <li class='page-item'>
                      <a class='page-link' href='e-sertifikat?halaman=<?= $Previous ?>'>Previous</a>
                    </li>

                    <?php

                    for ($i = 1; $i <= $BanyakHal; $i++)
                      if ($i != $halamanAktif) {
                        echo "<li class='page-item'><a class='page-link' href='e-sertifikat?halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                      }

                    ?>

                    <li class='page-item'>
                      <a class='page-link' href='e-sertifikat?halaman=<?= $Next ?>'>Next</a>
                    </li>
                  </ul>
                </nav>

              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!--about us section end-->
  </div>
  <!--body content wrap end-->


  <?php

  include('layouts/profilmodal.php');

  ?>


  <!-- Logout Modal -->

  <?php

  include('layouts/logoutmodal.php');

  ?>

  <!-- End LogoutModal -->

  <!--footer section start-->

  <?php


  include 'layouts/footer.php';

  ?>

  <!--footer top end-->

  <!--footer copyright start-->
  <?php


  include 'layouts/footerc.php';

  ?>
  <!--footer copyright end-->
  </footer>
  <!--footer section end-->

  <!--bottom to top button start-->
  <button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up"></span>
  </button>
  <!--bottom to top button end-->

  <!--jQuery-->
  <script src="./js/js-jquery-3.5.0.min.js"></script>
  <!--Popper js-->
  <script src="./js/js-popper.min.js"></script>
  <!--Bootstrap js-->
  <script src="./js/js-bootstrap.min.js"></script>
  <!--Magnific popup js-->
  <script src="./js/js-jquery.magnific-popup.min.js"></script>
  <!--jquery easing js-->
  <script src="./js/js-jquery.easing.min.js"></script>
  <!--jquery ytplayer js-->
  <script src="./js/js-jquery.mb.YTPlayer.min.js"></script>
  <!--Isotope filter js-->
  <script src="./js/js-mixitup.min.js"></script>
  <!--wow js-->
  <script src="./js/js-wow.min.js"></script>
  <!--owl carousel js-->
  <script src="./js/js-owl.carousel.min.js"></script>
  <!--countdown js-->
  <script src="./js/js-jquery.countdown.min.js"></script>
  <!--jquery easypiechart-->
  <script src="./js/js-jquery.easy-pie-chart.js"></script>
  <!--custom js-->
  <script src="./js/js-scripts.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>



</body>

</html>

<?php


include('layouts/proseseditprofil.php')

?>



<?php
    
    if (isset($_POST['unduh-sertifikat'])) {
        
    $urlsertif = $_GET['url'];
        

    $query    = "update tb_pendaftaran SET sertifikat = 'tidak_aktif' where id_user = '$data_id'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
    //   echo "<script>
    //             Swal.fire({title: 'Unduh Sertifikat Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
    //             }).then((result) => {if (result.value)
    //                 {window.location = 'seminar';}
    //             })</script>";
    
    
    echo "
    
      <br>
   <form action='$urlsertif' method='post' id='formsertifbos'>
    <input name='name' type='hidden' value='$data_nama'>
    <input name='email' type='hidden' value='$data_email'>
    <input type='submit'>
   </form>

  <script type='text/javascript'>
    $('#formsertifbos').submit();
  </script>
";   
    

        
    } else {

      echo "<script>
                    Swal.fire({title: 'Terjadi Kesalahan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'seminar';}
                    })</script>";
    }
    
}

  

?>