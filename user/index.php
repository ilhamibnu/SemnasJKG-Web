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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <!--title-->
  <title>Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya</title>

  <link href='https://www.semnasjkg.cloud/' rel='canonical' />
  <meta content='Seminar Nasional Jurusan Kesehatan Gigi Poltekkes Surabaya - Merupakan komitmen kampus dalam meningkatkan kualitas pendidikan tinggi di Indonesia melalui pemberian Seminar bagi Mahasiswa Perguruan Tinggi bereputasi di dunia menuju Indonesia Maju.' name='description' />
  <meta name="keywords" content="semnas jkg, semnas jkg surabaya, semnas jkg poltekkes surabaya, seminar nasional, seminar nasional jkg, seminar nasional jurusan kesehatan gigi, seminar nasional jurusan kesehatan gigi surabaya, seminar nasional jurusan kesehatan gigi poltekkes surabaya, politeknik kesehatan surabaya, politeknik kesehatan kemenkes surabaya" />
  <meta name="dcterms.subject" content="semnas jkg, semnas jkg surabaya, semnas jkg poltekkes surabaya, seminar nasional, seminar nasional jkg, seminar nasional jurusan kesehatan gigi, seminar nasional jurusan kesehatan gigi surabaya, seminar nasional jurusan kesehatan gigi poltekkes surabaya, politeknik kesehatan surabaya, politeknik kesehatan kemenkes surabaya" />
  <meta name="author" content="Semnas JKG Surabaya" />
  <meta content='id' property='og:locale' />
  <meta content='website' property='og:type' />
  <meta content='Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya' property='og:title' />
  <meta content='https://www.semnasjkg.cloud/' property='og:url' />
  <meta content='Seminar Nasional Jurusan Kesehatan Gigi Poltekkes Surabaya - Merupakan komitmen kampus dalam meningkatkan kualitas pendidikan tinggi di Indonesia melalui pemberian Seminar bagi Mahasiswa Perguruan Tinggi bereputasi di dunia menuju Indonesia Maju.' property='og:description' />
  <meta content='Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya' property='og:site_name' />
  <meta content='summary_large_image' name='twitter:card' />
  <meta content='Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya' name='twitter:title' />
  <meta content='https://www.semnasjkg.cloud/' name='twitter:domain' />
  <meta content='Seminar Nasional Jurusan Kesehatan Gigi Poltekkes Surabaya - Merupakan komitmen kampus dalam meningkatkan kualitas pendidikan tinggi di Indonesia melalui pemberian Seminar bagi Mahasiswa Perguruan Tinggi bereputasi di dunia menuju Indonesia Maju.' name='twitter:description' />
  <link rel="alternate" type="application/atom+xml" title="Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya" href="https://www.semnasjkg.cloud/ />
<link rel=" alternate" type="application/rss+xml" title="Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya" href="https://www.semnasjkg.cloud/" />
  <link rel="service.post" type="application/atom+xml" title="Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya" href="https://www.semnasjkg.cloud/" />
  <script type='application/ld+json'>
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "Semnas Jurusan Kesehatan Gigi | Poltekkes Surabaya",
      "url": "https://www.semnasjkg.cloud/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.semnasjkg.cloud/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
  </script>
  <meta name="msvalidate.01" content="803C782A6958FDC9E7E87A2713A8F9E4" />

  <?php

  include('layouts/head.php')

  ?>


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

  <!-- 
            <li><a href="#" class="dropdown-toggle">Beasiswa</a>
              <ul class="sub-menu">
                <li><a href="#" class="dropdown-toggle-inner">PT Akademik</a>
                  <ul class="sub-menu">
                    <li><a href="https://beasiswadosen.kemdikbud.go.id/v2/bppdn">Beasiswa Dalam Negeri</a></li>
                    <li><a href="https://beasiswadosen.kemdikbud.go.id/v2/bppln">Beasiswa Luar Negeri</a></li>
                    <li><a href="https://beasiswadosen.kemdikbud.go.id/v2/bppln">Joint Degree/Dual Degree</a></li>
                    <li><a href="https://beasiswadosen.kemdikbud.go.id/v2/bridging">Bridging Program</a></li>
                    <li><a href="https://beasiswadosen.kemdikbud.go.id/v2/risetkeilmuan">Riset Keilmuan</a></li>
                  </ul>
                </li>
                <li><a href="#" class="dropdown-toggle-inner">PT Vokasi</a>
                  <ul class="sub-menu">
                    <li><a href="http://beasiswadosen.kemdikbud.go.id/bppdn">Beasiswa Dalam Negeri</a></li>
                    <li><a href="http://beasiswadosen.kemdikbud.go.id/bppln">Beasiswa Luar Negeri</a></li>
                    <li><a href="http://beasiswadosen.kemdikbud.go.id/bridging">Bridging Program</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->

  <!--body content wrap start-->
  <div class="main">
    <!--hero section start-->
    <section class="ptb-70 gradient-overlay" style="
          background: url('images/direktorat.jpg')
            no-repeat center center / cover;
        ">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-5">
            <div class="hero-slider-content text-white pt-5">
              <h1 class="text-white">Seminar Nasional Jurusan Kesehatan Gigi</h1>
              <p class="lead">
                merupakan komitmen kampus dalam meningkatkan kualitas
                pendidikan tinggi di Indonesia melalui pemberian Seminar bagi
                Mahasiswa Perguruan Tinggi bereputasi di dunia menuju Indonesia
                Maju.
              </p>
            </div>
          </div>
          <div class="col-md-12 col-lg-7">
            <div class="image-wrap pt-5">
              <img src="images/img-scholarship.png" class="img-fluid custom-width" alt="hero" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--hero section end-->

    <!--promo section start-->
    <section class="promo-section ptb-100 gray-light-bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-heading text-center mb-4">
              <h2>Seminar Nasional Perguruan Tinggi Indonesia</h2>
              <span class="animate-border mr-auto ml-auto mb-4"></span>
              <p class="lead">&nbsp;</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">


          <?php

          $BanyakDataPerHal = 6;
          $BanyakData = mysqli_num_rows(mysqli_query($koneksi, "SELECT * from tb_seminar"));
          $BanyakHal = ceil($BanyakData / $BanyakDataPerHal);

          if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
          } else {
            $halamanAktif = 1;
          }

          $DataAwal = ($BanyakDataPerHal * $halamanAktif) - $BanyakDataPerHal;

          $query = ("SELECT * from tb_seminar limit $DataAwal, $BanyakDataPerHal");
          $result = mysqli_query($koneksi, $query);

          if (isset($_SESSION["ses_username"]) == "") {

            while ($row = mysqli_fetch_array($result)) {

              $SeminarId = $row['id'];
              $SeminarNama = $row['nama'];
              $SeminarDeskripsi = $row['deskripsi'];

              echo "

              
              <div class='col-md-4 col-lg-4 mb-4'>
              <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
                <div class='circle-icon'>
                  <span class='fa fa-university text-white'></span>
                </div>
                <h5>$SeminarNama</h5>
                <p>
                  $SeminarDeskripsi
                </p>
                <a href='' class='btn secondary-solid-btn mr-3' data-bs-toggle='modal' data-bs-target='#BelumLogin'>Daftar Sekarang</a>
              </div>
            </div>

              
              
              ";
            }
          } else {

            while ($row = mysqli_fetch_array($result)) {

              $SeminarId = $row['id'];
              $SeminarNama = $row['nama'];
              $SeminarDeskripsi = $row['deskripsi'];

              $EnSeminarId = base64_encode($SeminarId);
              $EnDataId = base64_encode($data_id);

          ?>

              <div class='col-md-4 col-lg-4'>
                <div class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
                  <div class='circle-icon'>
                    <span class='fa fa-university text-white'></span>
                  </div>
                  <h5><?php echo $SeminarNama ?></h5>
                  <p>
                    <?php echo $SeminarDeskripsi ?>
                  </p>
                  <a href='' class='btn secondary-solid-btn mr-3' data-bs-toggle='modal' data-bs-target='#DaftarSeminar<?= $SeminarId ?>'>Daftar Sekarang</a>
                </div>
              </div>



              <div class='modal fade' id='DaftarSeminar<?= $SeminarId ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                <div class='modal-dialog'>
                  <div class='modal-content'>
                    <div class='modal-header'>
                      <h1 class='modal-title fs-5' id='exampleModalLabel'>Modal Daftar Seminar</h1>
                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <form action='index?id_user=<?php echo $EnDataId ?>&id_seminar=<?php echo $EnSeminarId ?>' method='post'>
                      <div class='modal-body'>

                        <div class='form-group'>
                          <label for="formFileSm" class="form-label">Pilih Paket</label>
                          <select class='form-select form-control form-control-sm' id='exampleFormControlSelect1' name='id_paket' required>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT tb_paket.id, tb_paket.nama, tb_harga.harga FROM tb_seminar INNER JOIN tb_item_paket ON tb_item_paket.id_seminar=tb_seminar.id INNER JOIN tb_paket ON tb_paket.id=tb_item_paket.id_paket INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_paket.id_jenis_peserta INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga INNER JOIN tb_kampus ON tb_kampus.id_jenis_peserta=tb_jenis_peserta.id INNER JOIN tb_user ON tb_user.id_kampus=tb_kampus.id WHERE tb_seminar.id = '$SeminarId' AND tb_user.id = '$data_id' AND tb_kampus.id = '$data_id_kampus'") or die(mysqli_error($koneksi));
                            while ($row = mysqli_fetch_array($query)) {
                              echo "<option value=$row[id]> $row[nama] - Rp. $row[harga]</option>";
                            }

                            ?>

                          </select>
                        </div>
                      </div>
                      <div class='modal-footer'>

                        <button name='daftarseminar' class='btn btn-success btn-sm'>Yes</button>

                        <button type='button' class='btn btn-danger btn-sm' data-bs-dismiss='modal'>Close</button>
                    </form>

                  </div>

                </div>
              </div>
        </div>

    <?php
            }
          }
    ?>

    <?php

    $Previous = $halamanAktif - 1;
    $Next = $halamanAktif + 1;

    ?>

    <nav aria-label='Page navigation example'>
      <ul class='pagination justify-content-center'>
        <li class='page-item'>
          <a class='page-link' href='index?halaman=<?= $Previous ?>'>Previous</a>
        </li>

        <?php

        for ($i = 1; $i <= $BanyakHal; $i++)
          if ($i != $halamanAktif) {
            echo "<li class='page-item'><a class='page-link' href='index?halaman=$i'>$i</a></li>";
          } else {
            echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
          }

        ?>

        <li class='page-item'>
          <a class='page-link' href='index?halaman=<?= $Next ?>'>Next</a>
        </li>
      </ul>
    </nav>

      </div>
  </div>

  </section>

  <section class="wrapper bg-light">
    <div class="container">
      <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
        <div class="col-lg-7 order-lg-2">
          <figure>
            <img class="img-fluid" src="images/fasilitas.png" alt="" />
          </figure>
        </div>
        <!--/column -->
        <div class="col-lg-5">
          <h2 class="fs-16 text-uppercase text mb-3"> Apa saja fasilitas yang akan kalian dapatkan?</h2>
          <span class="animate-border"></span>
          <p class="lead">&nbsp;</p>
          <!-- <h3 class="display-4 mb-5">
            Apa saja fasilitas yang akan kalian dapatkan?
          </h3> -->
          <p class="mb-6"></p>
          <div class="row gy-3">
            <div class="col-xl-6 ">
              <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                <li>
                  <span><i class="fa-solid fa-circle-check" style="color : #e80566;"></i></span><span> Materi Literasi Digital</span>
                </li>
                <li class="mt-3">
                  <span><i class="fa-solid fa-circle-check" style="color : #e80566;"></i></span><span> E-sertifikat</span>
                </li>
              </ul>
            </div>

            <!--/column -->
            <div class="col-xl-6">
              <ul class="icon-list bullet-bg bullet-soft-primary mb-0">
                <li>
                  <span><i class="fa-solid fa-circle-check" style="color : #e80566;"></i></span><span> Seminar Kit</span>
                </li>
                <li class="mt-3">
                  <span><i class="fa-solid fa-circle-check" style="color : #e80566;"></i></span><span> Voucher E-Money</span>
                </li>
              </ul>
            </div>
            <!--/column -->
          </div>
          <!--/.row -->
        </div>
        <!--/column -->
      </div>
      <!--/.row -->
    </div>
    <!-- /.container -->
  </section>

  <!--<div class="client-section ptb-100" style="-->
  <!--        background: url('https://beasiswadosen.kemdikbud.go.id/v2/assets/frontend/img/client-bg.jpg')-->
  <!--          no-repeat center center / cover;-->
  <!--      ">-->
  <!--  <div class="container">-->

  <!--    <div class="row">&nbsp;</div>-->
  <!--    <div class="row align-items-center justify-content-center mb-4">-->
  <!--      <div class="col-md-10 col-lg-9">-->
  <!--        <div class="owl-carousel owl-theme clients-carousel dot-indicator client-logo-wrap">-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-kemdikbud-footer.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-kampus-merdeka.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-lpdp.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-puslapdik.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-dikti-sigap.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--          <div class="item single-client">-->
  <!--            <img src="images/img-logo-vokasi.png" alt="client logo" class="client-img" />-->
  <!--          </div>-->
  <!--        </div>-->
  <!--      </div>-->
  <!--    </div>-->

  <!--  </div>-->
  <!--</div>-->
  <!--client section end-->
  </div>
  <!--body content wrap end-->

  <!-- Modal Belum Login -->
  <div class="modal fade" id="BelumLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h6>Anda Belum Login, Harap Login Terlebih Dahulu</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Modal Belum Login -->

  <?php

  include('layouts/profilmodal.php');

  ?>


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
  <!--footer section end-->

  <!--bottom to top button start-->
  <button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-angle-up"></span>
  </button>
  <!--bottom to top button end-->

  <?php

  include('layouts/body.php')

  ?>



</body>

</html>

<?php

if (isset($_POST['daftarseminar'])) {

  $IdUser = base64_decode($_GET['id_user']);
  $IdSeminar = base64_decode($_GET['id_seminar']);
  $IdPaket = $_POST['id_paket'];



  $querycek = "SELECT * FROM tb_pendaftaran WHERE id_user = '$IdUser' AND id_seminar = '$IdSeminar'";
  $resultcek = mysqli_query($koneksi, $querycek);

  if (mysqli_num_rows($resultcek) > 0) {
    echo "<script>
        Swal.fire({title: 'Anda Telah Terdaftar Pada Seminar',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = '';}
        })</script>";
  } else {

    $queyselectpresensi = "SELECT tb_presensi.id FROM tb_item_presensi INNER JOIN tb_presensi ON tb_item_presensi.id_presensi=tb_presensi.id WHERE tb_item_presensi.id_paket = '$IdPaket'";
    $resultselectpresensi = mysqli_query($koneksi, $queyselectpresensi);

    while ($row = mysqli_fetch_array($resultselectpresensi)) {
      $id_presensi = $row['id'];
      $queryinsertpresensi = "INSERT INTO tb_detail_presensi SET id_presensi = '$id_presensi', id_user = '$IdUser' , status = 'belum'";
      $resultinsertpresensi = mysqli_query($koneksi, $queryinsertpresensi);
    }

    $query    = "INSERT INTO tb_pendaftaran SET id_user = '$IdUser', id_seminar = '$IdSeminar', id_paket = '$IdPaket' ,status = 'belum_bayar', status_sertifikat = 'aktif'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
      echo "<script>
                Swal.fire({title: 'Anda Berhasil Terdaftar',text: 'Lanjutkan Ke Tahap Pembayaran',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'seminar';}
                })</script>";
    } else {

      echo "<script>
                    Swal.fire({title: 'Terjadi Kesalahan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = '';}
                    })</script>";
    }
  }
}


include('layouts/proseseditprofil.php')

?>