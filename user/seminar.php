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
  <title>Seminar Anda - Semnas Jurusan Kesehatan Gigi Poltekkes Surabaya</title>

  <!--favicon icon-->
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <div
                  class="single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded align-items-center">
                  <h4>Informasi Penting</h4>
                  <p class="font-weight-bold" style="font-size: 16px;">Untuk teman-teman yang sudah melakukan pendaftaran seminar, silahkan langsung melakukan pembayaran
                    pada menu yang sudah tersedia, apabila pembayaran anda telah terkonfirmasi, maka akan muncul icon
                    whatsapp untuk akses link group resmi, sekian terimakasih.</p>
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

                $query = ("SELECT tb_pendaftaran.id as id_pendaftaran, tb_seminar.id as id_seminar, tb_seminar.nama as nama_seminar, tb_paket.id as id_paket, tb_paket.nama as nama_paket, tb_harga.harga as total_tagihan, tb_pendaftaran.status FROM tb_pendaftaran INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user WHERE tb_user.id = '$data_id' order by tb_pendaftaran.id asc limit $DataAwal, $BanyakDataPerHal");
                $result = mysqli_query($koneksi, $query);



                while ($row = mysqli_fetch_array($result)) {

                  $Id_Pendaftaran = $row['id_pendaftaran'];
                  $Id_Seminar = $row['id_seminar'];
                  $Nama_Seminar = $row['nama_seminar'];
                  $IdPaket = $row['id_paket'];
                  $Nama_Paket = $row['nama_paket'];
                  $Total_Tagihan = $row['total_tagihan'];
                  // $GroupWa = $row['group_wa'];
                
                  $EnDataId = base64_encode($data_id);
                  $EnIdPaket = base64_encode($IdPaket);
                  $Status = $row['status'];



                  ?>

                  <div class='col-md-4 col-lg-4'>
                    <div
                      class='single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded'>
                      <div class='circle-icon'>
                        <span class='fa fa-university text-white'></span>
                      </div>
                      <h5>
                        <?= $Nama_Seminar ?>
                      </h5>
                      <p>
                        <?= $Nama_Paket ?>
                      </p>

                      <?php

                      if ($Status == "lunas") {
                        echo "

                     

                      <a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#ModalHapus$Id_Pendaftaran' href=''><i class='fa fa-trash'></i></a>

                      <a class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#ModalPresensi$Id_Pendaftaran' href=''><i class='fa fa-check-circle'></i></a>

                      <a class='btn btn-success' data-bs-toggle='modal' data-bs-target='#ModalGroup$Id_Pendaftaran' href=''><i class='fa-brands fa-whatsapp'></i></a>


                      
                        
                        ";
                      } else {

                        echo "

                

                        <a class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#ModalHapus$Id_Pendaftaran' href=''><i class='fa fa fa-trash'></i></a>
                        
                        <a class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#ModalPembayaran$Id_Pendaftaran' href=''><i class='fa fa fa-shopping-cart'></i></a>
                        
                        ";
                      }

                      ?>



                    </div>
                  </div>

                  <!-- Modal Group -->
                  <div class="modal fade bd-example-modal-lg" id="ModalGroup<?= $Id_Pendaftaran ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Group Wa</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Link</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $nomer = 1;
                                  $querydatagroup = ("SELECT * FROM tb_group WHERE tb_group.id_seminar = '$Id_Seminar'");
                                  $resultgroup = mysqli_query($koneksi, $querydatagroup);

                                  while ($rowgroup = mysqli_fetch_array($resultgroup)) {

                                    $NamaGroup = $rowgroup['nama'];
                                    $StatusGroup = $rowgroup['status'];
                                    $LinkGroup = $rowgroup['link'];


                                    ?>
                                    <tr>
                                      <td style="font-size: 13px;">
                                        <?= $nomer++ ?>
                                      </td>
                                      <td style="font-size: 13px;">
                                        <?= $NamaGroup ?>
                                      </td>
                                      <td>
                                        <?php

                                        if ($StatusGroup == "tersedia") {
                                          echo "<span class='badge bg-success'>Tersedia</span>";
                                        } else {
                                          echo "<span class='badge bg-danger'>Penuh</span>";
                                        }


                                        ?>

                                      </td>
                                      <td>

                                        <?php

                                        if ($StatusGroup == "tersedia") {
                                          echo "
                                
                                        <a class='btn btn-success btn-sm' href='$LinkGroup' target='_blank'><i
                                              class='fa-brands fa-whatsapp'></i></a>
                                              
                                              

                                            
                                        ";
                                        } else {
                                          echo "
                                   
                                   <a class='btn btn-danger btn-sm disabled' href='$LinkGroup' target='_blank'><i
                                              class='fa-brands fa-whatsapp'></i></a>
                                            
                                        ";
                                        }
                                        ?>

                                      </td>
                                    </tr>
                                    <?php

                                  }
                                  ?>

                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>

                      </div>
                    </div>
                  </div>


                  <!-- Modal Presensi -->
                  <div class="modal fade bd-example-modal-lg" id="ModalPresensi<?= $Id_Pendaftaran ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Kehadiran</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                          <form action="seminar?id_user=<?php echo $EnDataId ?>" method="post">

                            <div class='form-group'>
                              <label for="formFileSm" class="form-label">Pilih Kehadiran</label>
                              <select class='form-select form-control form-control-sm' id='exampleFormControlSelect1'
                                name='id_presensi' required>
                                <option value=''>Pilih Kehadiran</option>
                                <?php
                                $query = mysqli_query($koneksi, "SELECT tb_presensi.id, tb_presensi.nama FROM tb_item_presensi INNER JOIN tb_presensi ON tb_item_presensi.id_presensi=tb_presensi.id WHERE tb_item_presensi.id_paket = '$IdPaket' AND (now() between tb_presensi.waktu_mulai and tb_presensi.waktu_habis)") or die(mysqli_error($koneksi));
                                while ($row = mysqli_fetch_array($query)) {
                                  echo "<option value=$row[id]> $row[nama]</option>";
                                }

                                ?>
                              </select>
                            </div>

                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Presensi</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $nomer = 1;
                                  $querydatapresensi = ("SELECT tb_presensi.nama, tb_detail_presensi.status, tb_presensi.waktu_mulai, tb_presensi.waktu_habis FROM tb_detail_presensi INNER JOIN tb_presensi ON tb_presensi.id=tb_detail_presensi.id_presensi INNER JOIN tb_item_presensi ON tb_item_presensi.id_presensi=tb_presensi.id WHERE tb_item_presensi.id_paket = '$IdPaket' AND tb_detail_presensi.id_user = '$data_id'");
                                  $resultpresensi = mysqli_query($koneksi, $querydatapresensi);

                                  while ($rowpresensi = mysqli_fetch_array($resultpresensi)) {

                                    $NamaPresensi = $rowpresensi['nama'];
                                    $StatusPresensi = $rowpresensi['status'];
                                    $WaktuMulai = $rowpresensi['waktu_mulai'];
                                    $WaktuHabis = $rowpresensi['waktu_habis'];

                                    ?>
                                    <tr>
                                      <td style="font-size: 13px;">
                                        <?= $nomer++ ?>
                                      </td>
                                      <td style="font-size: 13px;">
                                        <?= $NamaPresensi ?>
                                      </td>
                                      <td style="font-size: 13px;">
                                        <?= $WaktuMulai ?>
                                      </td>
                                      <td style="font-size: 13px;">
                                        <?= $WaktuHabis ?>
                                      </td>
                                      <td>
                                        <?php

                                        if ($StatusPresensi == "sudah") {
                                          echo "<span class='badge bg-success'>Hadir</span>";
                                        } else {
                                          echo "<span class='badge bg-danger'>Tidak Hadir</span>";
                                        }


                                        ?>

                                      </td>
                                    </tr>
                                    <?php

                                  }
                                  ?>

                                </tbody>
                              </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button name="presensi" class="btn btn-success btn-sm">Submit</button>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                        </div>
                        </form>

                      </div>
                    </div>
                  </div>

                  <!-- End Modal Presensi -->


                  <!-- Modal Bayar -->
                  <div class="modal fade" id="ModalPembayaran<?= $Id_Pendaftaran ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form
                            action="seminar?id=<?= base64_encode($Id_Pendaftaran) ?>&tagihan=<?= base64_encode($Total_Tagihan) ?>"
                            method="post">

                            <div class="mb-3">
                              <label for="formFileSm" class="form-label">Tagihan</label>
                              <input disabled class="form-control form-control" value="Rp.<?=  number_format($Total_Tagihan) ?>"
                                id="formFileSm" type="text">
                            </div>

                        </div>
                        <div class="modal-footer">

                          <a class="btn btn-success btn-sm"
                            href="./midtrans/examples/snap/checkout-process-simple-version?id=<?= base64_encode($Id_Pendaftaran) ?>&tagihan=<?= base64_encode($Total_Tagihan) ?>&nama_seminar=<?= base64_encode($Nama_Seminar) ?>&nama_peserta=<?= base64_encode($data_nama) ?>&email_peserta=<?= base64_encode($data_email) ?>&nama_paket=<?= base64_encode($Nama_Paket) ?>">Bayar</a>

                          <!-- <button name="bayar-sekarang">Iya</button> -->
                          </form>
                          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>

                        </div>
                      </div>
                    </div>
                  </div>


                  <!-- Modal Hapus-->
                  <div class="modal fade" id="ModalHapus<?= $Id_Pendaftaran ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <h6>Anda yakin akan menghapus
                            <?= $Nama_Seminar ?> ?
                          </h6>
                        </div>
                        <div class="modal-footer">
                          <form
                            action="seminar?id=<?= base64_encode($Id_Pendaftaran) ?>&id_paket=<?= base64_encode($IdPaket) ?>&id_user=<?= base64_encode($data_id) ?>"
                            method="post">
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

  <?php

  include('layouts/body.php')

    ?>
</body>

</html>

<?php
error_reporting(0);

$IdEncode = base64_decode($_GET['id']);
$IdUserDecode = base64_decode($_GET['id_user']);
$IdPaketDecode = base64_decode($_GET['id_paket']);

if (isset($_POST['hapus-seminar'])) {

  if (isset($_POST['hapus-seminar'])) {

    $querycekdetailpresensi = "SELECT tb_detail_presensi.id FROM tb_item_presensi INNER JOIN tb_presensi ON tb_item_presensi.id_presensi=tb_presensi.id INNER JOIN tb_detail_presensi ON tb_detail_presensi.id_presensi=tb_presensi.id WHERE tb_item_presensi.id_paket = '$IdPaketDecode' AND tb_detail_presensi.id_user = '$IdUserDecode'";
    $resultcekdetailpresensi = mysqli_query($koneksi, $querycekdetailpresensi);

    while ($rowcekdetailpresensi = mysqli_fetch_array($resultcekdetailpresensi)) {
      $IdDetailPresensi = $rowcekdetailpresensi['id'];
      $querydel = "DELETE FROM tb_detail_presensi WHERE id = '$IdDetailPresensi' ";
      $result = mysqli_query($koneksi, $querydel);
    }

    $querydel = "DELETE FROM tb_pendaftaran WHERE id = '$IdEncode' ";
    $result = mysqli_query($koneksi, $querydel);

    echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = '';}
    })</script>";
  } else {
    echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = '';}
    })</script>";
  }
} else {
}


?>


<?php

if (isset($_POST['presensi'])) {

  $IdUser = base64_decode($_GET['id_user']);
  $IdPresensi = $_POST['id_presensi'];


  $querycek = "SELECT * FROM tb_detail_presensi WHERE id_user = '$IdUser' AND id_presensi = '$IdPresensi' AND status = 'sudah'";
  $resultcek = mysqli_query($koneksi, $querycek);

  if (mysqli_num_rows($resultcek) > 0) {
    echo "<script>
        Swal.fire({title: 'Anda Telah Presensi',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = '';}
        })</script>";
  } else {

    $query = "UPDATE tb_detail_presensi SET status = 'sudah'  where id_user = '$IdUser' AND id_presensi = '$IdPresensi'";
    $result = mysqli_query($koneksi, $query);


    if ($result) {
      echo "<script>
                Swal.fire({title: 'Anda Berhasil Presensi',text: '',icon: 'success',confirmButtonText: 'OK'
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


?>



<?php

include('layouts/proseseditprofil.php')

  ?>