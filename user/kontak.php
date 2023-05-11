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

  <!-- SEO Meta description -->
 

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
  <title>Kontak - Semnas Jurusan Kesehatan Gigi Poltekkes Surabaya</title>

    
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

    <!--contact us promo start-->
    <section class="contact-us-promo ptb-100">
      <div class="container">
           <h3>Kontak Kami</h3>
              <span class="animate-border mb-4"></span>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card single-promo-card single-promo-hover text-center shadow-sm">
              <div class="card-body py-5">
                <div class="pb-2">
                  <span class="fa-brands fa-whatsapp icon-sm color-secondary"></span>
                </div>
                <div>
                  <h5 class="mb-0">Hima Jurusan Kesehatan Gigi Poltekkes SBY</h5>
                  <p class="text-muted mb-0">+62 823-3095-1097</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card single-promo-card single-promo-hover text-center shadow-sm">
              <div class="card-body py-5">
                <div class="pb-2">
                  <span class="fa-brands fa-instagram icon-sm color-secondary"></span>
                </div>
                <div>
                  <h5 class="mb-0">Hima Jurusan Kesehatan Gigi Poltekkes SBY</h5>
                  <p class="text-muted mb-0">@himajkgsurabaya</p>
                </div>
              </div>
            </div>
          </div>
             <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card single-promo-card single-promo-hover text-center shadow-sm">
              <div class="card-body py-5">
                <div class="pb-2">
                  <span class="fa-sharp fa-regular fa-envelope icon-sm color-secondary"></span>
                </div>
                <div>
                  <h5 class="mb-0">Hima Jurusan Kesehatan Gigi Poltekkes SBY</h5>
                  <p class="text-muted mb-0">himakepgi@gmail.com</p>
                </div>
              </div>
            </div>
          </div>
        
        </div>
       
      </div>
   
    </section>
    <!--contact us promo end-->
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

include('layouts/proseseditprofil.php')

?>