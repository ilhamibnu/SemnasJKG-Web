<?php
include "../connection/koneksi.php";
session_start();
error_reporting(0);

$data_id = $_SESSION["ses_id"];
$data_nama = $_SESSION["ses_nama"];
$data_email = $_SESSION["ses_email"];
$data_username = $_SESSION["ses_username"];
$data_password = $_SESSION["ses_password"];
$data_id_kampus = $_SESSION["ses_id_kampus"];


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
  <title>Tentang - Seminar Nasional Jurusan Kesehatan Gigi</title>

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
    <section class="about-us-section ptb-100">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-md-12 col-lg-12">
            <!--<img src="https://digimark.themetags.com/img/slider-img-2.jpg" alt="services" class="img-fluid rounded shadow-sm"/>-->
            <div class="about-us-content-wrap">
              <h3>Tentang Semnas</h3>
              <span class="animate-border mb-4"></span>
              <p>
                Seminar Nasional Kesehatan Poltekkes Kemenkes Surabaya dan Call for Peper</p>

              Kegiatan ini diselenggarakan setiap tahun dalam rangkaian kegiatan Dies Natalis Poltekkes Kemenkes Surabaya dan sebagai wadah publikasi Penelitian (mandiri, pemula, dan terapan), publikasi Pengabmas, dan publikasi kegiatan mahasiswa (tugas akhir dan PKM). Tema Seminar Nasional Kesehatan Poltekkes Kemenkes dan Call for Paper kali ini adalah: "Tantangan Industri Kesehatan Menghadapi Revolusi 4.0".
              </p>
              Ketua Panitia Semnas 2019
              </p>
              Dr. Triwiyanto
              </p>
              <!-- <p>
                Salah satu strategi untuk mewujudkan pemerataan akses terhadap
                pendidikan yang bermutu bagi seluruh masyarakat Indonesia
                adalah dengan mengalokasikan sebagian anggaran pendidikan
                untuk membentuk Dana Pengembangan Pendidikan Nasional (DPPN),
                berupa dana abadi pendidikan (endowment fund) yang bertujuan
                menjamin keberlangsungan program pendidikan bagi generasi
                berikutnya dan dana cadangan pendidikan untuk mengantisipasi
                keperluan rehabilitasi fasilitas pendidikan yang rusak akibat
                bencana alam. Hal ini sejalan dengan amanat Undang-Undang APBN
                tahun 2010 dan 2011. Selanjutnya, untuk mengelola DPPN
                tersebut, Menteri Keuangan membentuk Lembaga Pengelola Dana
                Pendidikan (LPDP) melalui Peraturan Menteri Keuangan Nomor
                143/PMK.01/2016 tentang Organisasi dan Tata Kerja Lembaga
                Pengelola Dana Pendidikan. LPDP merupakan Badan Layanan Umum
                yang bertugas melaksanakan pengelolaan DPPN, baik dana abadi
                pendidikan (endowment fund) maupun dana cadangan pendidikan.
                Pengelolaan tersebut meliputi pengembangan dan penyaluran
                dana, baik untuk kegiatan pendidikan, riset, maupun untuk
                rehabilitasi fasilitas pendidikan yang rusak akibat bencana
                alam.
              </p>
              <p>
                Pada tahun 2021, pemanfaatan dana LPDP dapat dilakukan
                langsung oleh Kementerian Pendidikan dan Kebudayaan sebagai
                kementerian teknis yang membidangi pendidikan di Indonesia.
                LPDP dan Kementerian Pendidikan dan Kebudayaan bersinergi
                untuk menghadirkan program beasiswa pendidikan Indonesia
                dengan sumber pendanaan dari dana abadi pendidikan (endowment
                fund). Di lingkup Kementerian Pendidikan dan Kebudayaan,
                pelaksanaan program beasiswa pendidikan ini dikoordinir oleh
                Sekretariat Jenderal melalui Pusat Layanan Pembiayaan
                Pendidikan (Puslapdik), sebagai unit organisasi kementerian di
                bidang layanan pembiayaan pendidikan. Puslapdik bekerjasama
                dengan unit-unit utama kementerian, yaitu:
              </p>
              <ul class="list-unstyled tech-feature-list">
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Pusat
                  Prestasi Nasional;
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Direktorat Jenderal Pendidikan Tinggi
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Direktorat Jenderal Pendidikan Vokasi
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Direktorat Jenderal Guru dan Tenaga Kependidikan
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Direktorat Jenderal Kebudayaan.
                </li>
              </ul>
              <p>
                Khusus untuk meningkatkan kualifikasi dosen, pemerintah
                menghadirkan program Beasiswa Pendidikan Dosen. Penerima
                manfaat dari program ini yaitu dosen perguruan tinggi akademik
                dan dosen perguruan tinggi vokasi. Jenis-jenis program yang
                disediakan meliputi:
              </p>
              <p><strong>Program Beasiswa Gelar</strong></p>
              <ul class="list-unstyled tech-feature-list">
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa S2/S3 Dalam Negeri untuk Dosen Perguruan Tinggi
                  Akademik
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa S2/S3 Luar Negeri untuk Dosen Perguruan Tinggi
                  Akademik
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa S2/S3 <em>Joint/Dual Degree</em> untuk Dosen
                  Perguruan Tinggi Akademik
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa S2/S3 Dalam Negeri untuk Dosen Perguruan Tinggi
                  Vokasi
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa S2/S3 Luar Negeri untuk Dosen Perguruan Tinggi
                  Vokasi
                </li>
              </ul>
              <p><strong>Program Beasiswa Non Gelar</strong></p>
              <ul class="list-unstyled tech-feature-list">
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa <em>Bridging Course</em> untuk Dosen Perguruan
                  Tinggi Akademik
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa <em>Bridging Course</em> untuk Dosen Perguruan
                  Tinggi Vokasi
                </li>
                <li class="py-1">
                  <span class="ti-check-box mr-2 color-secondary"></span>Beasiswa Riset Keilmuan untuk Dosen Perguruan Tinggi
                  Akademik
                </li>
              </ul> -->
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
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>


<?php

include('layouts/proseseditprofil.php')

?>