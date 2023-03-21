<?php
include "../connection/koneksi.php";
session_start();
error_reporting(1);
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
  <title>Seminar Anda - Seminar Nasional Jurusan Kesehatan Gigi</title>

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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <h3>Seminar Anda</h3>
              <span class="animate-border mb-4"></span>

              <div class='col-md-auto col-lg-auto'>
                <div class="single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded align-items-center">
                  <h4>Informasi Penting</h4>
                  <p>Untuk teman-teman yang sudah melakukan pendaftaran seminar, silahkan langsung melakukan pembayaran pada menu yang sudah tersedia, apabila pembayaran anda telah terkonfirmasi, maka akan muncul icon whatsapp untuk akses link group resmi dibawah nama seminar yang anda ikuti, sekian terimakasih.</p>
                </div>
              </div>

              <div class="row justify-content-center">


                <?php

                $BanyakDataPerHal = 6;
                $BanyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT tb_pendaftaran.id as id_pendaftaran, tb_seminar.nama as nama_seminar, tb_paket.nama as nama_paket, tb_harga.harga as total_tagihan, tb_pendaftaran.status FROM tb_pendaftaran INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user WHERE tb_user.id = '$data_id'"));
                $BanyakHal = ceil($BanyakData / $BanyakDataPerHal);

                if (isset($_GET['halaman'])) {
                  $halamanAktif = $_GET['halaman'];
                } else {
                  $halamanAktif = 1;
                }

                $DataAwal = ($BanyakDataPerHal * $halamanAktif) - $BanyakDataPerHal;

                $query = ("SELECT tb_pendaftaran.id as id_pendaftaran, tb_seminar.nama as nama_seminar, tb_paket.nama as nama_paket, tb_harga.harga as total_tagihan, tb_pendaftaran.status FROM tb_pendaftaran INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user WHERE tb_user.id = '$data_id' limit $DataAwal, $BanyakDataPerHal");
                $result = mysqli_query($koneksi, $query);



                while ($row = mysqli_fetch_array($result)) {

                  $Id_Pendaftaran = $row['id_pendaftaran'];
                  $Nama_Seminar = $row['nama_seminar'];
                  $Nama_Paket = $row['nama_paket'];
                  $Total_Tagihan = $row['total_tagihan'];


                  $Status = $row['status'];



                ?>

                  <div class='col-md-4 col-lg-4'>
                    <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
                      <div class='circle-icon'>
                        <span class='fa fa-university text-white'></span>
                      </div>
                      <h5><?= $Nama_Seminar ?></h5>
                      <p><?= $Nama_Paket ?></p>

                      <?php

                      if ($Status == "lunas") {
                        echo "

                     

                      <a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#ModalHapus$Id_Pendaftaran' href='#'><i class='fa fa fa-trash'></i></a>

                      <a class='btn btn-success' href='index'><i class='fa fa fa-whatsapp'></i></a>
                        
                        ";
                      } else {

                        echo "

                

                        <a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#ModalHapus$Id_Pendaftaran' href='#'><i class='fa fa fa-trash'></i></a>
                        
                        <a class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#ModalPembayaran$Id_Pendaftaran' href='#'><i class='fa fa fa-shopping-cart'></i></a>
                        
                        ";
                      }

                      ?>



                    </div>
                  </div>


                  <!-- Modal Bayar -->
                  <div class="modal fade" id="ModalPembayaran<?= $Id_Pendaftaran ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Bayar</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="seminar?id=<?= base64_encode($Id_Pendaftaran) ?>&tagihan=<?= base64_encode($Total_Tagihan) ?>" method="post">

                            <div class="mb-3">
                              <label for="formFileSm" class="form-label">Tagihan</label>
                              <input disabled class="form-control form-control" value="<?= $Total_Tagihan ?>" id="formFileSm" type="text">
                            </div>

                        </div>
                        <div class="modal-footer">

                          <a class="btn btn-success btn-sm" href="./midtrans/examples/snap/checkout-process-simple-version?id=<?= base64_encode($Id_Pendaftaran) ?>&tagihan=<?= base64_encode($Total_Tagihan) ?>&nama_seminar=<?= base64_encode($Nama_Seminar) ?>&nama_peserta=<?= base64_encode($data_nama) ?>&email_peserta=<?= base64_encode($data_email) ?>&nama_paket=<?= base64_encode($Nama_Paket) ?>">Bayar</a>

                          <!-- <button name="bayar-sekarang">Iya</button> -->
                          </form>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>

                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Modal Hapus-->
                  <div class="modal fade" id="ModalHapus<?= $Id_Pendaftaran ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h6>Anda Yakin Keluar Dari Seminar <?= $Nama_Seminar ?> ?</h6>
                        </div>
                        <div class="modal-footer">
                          <form action="seminar?id=<?= base64_encode($Id_Pendaftaran) ?>" method="post">
                            <button name="hapus-seminar" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                          <button type="button" class="btn btn-success btn-sm" data-bs-dismiss="modal">Close</button>

                        </div>
                      </div>
                    </div>
                  </div>


                <?php

                }

                $Previous = $halamanAktif - 1;
                $Next = $halamanAktif + 1;

                ?>

                <nav aria-label='Page navigation example'>
                  <ul class='pagination justify-content-center'>
                    <li class='page-item'>
                      <a class='page-link' href='seminar?halaman=<?= $Previous ?>'>Previous</a>
                    </li>

                    <?php

                    for ($i = 1; $i <= $BanyakHal; $i++)
                      if ($i != $halamanAktif) {
                        echo "<li class='page-item'><a class='page-link' href='seminar?halaman=$i'>$i</a></li>";
                      } else {
                        echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                      }

                    ?>

                    <li class='page-item'>
                      <a class='page-link' href='seminar?halaman=<?= $Next ?>'>Next</a>
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

  <!-- Logout Modal -->

  <?php

  include('layouts/logoutmodal.php');

  ?>

  <?php

  include('layouts/profilmodal.php');

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

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>

<?php
error_reporting(0);

$IdEncode = base64_decode($_GET['id']);

if (isset($_POST['hapus-seminar'])) {

  if (isset($_POST['hapus-seminar'])) {
    $querydel = "DELETE FROM tb_pendaftaran WHERE id = '$IdEncode' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'seminar';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'seminar';}
    })</script>";
  }
} else {
}


?>



<?php

include('layouts/proseseditprofil.php')

?>