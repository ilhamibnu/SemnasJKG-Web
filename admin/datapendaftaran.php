<?php
include "../connection/koneksi.php";
session_start();

if (isset($_SESSION["ses_username"]) == "") {
    header("location: login");
} else {
    $data_id = $_SESSION["ses_id"];
    $data_nama = $_SESSION["ses_nama"];
    $data_username = $_SESSION["ses_username"];
    $data_password = $_SESSION["ses_password"];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pendaftaran - Hima JKG</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-pink sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Hima<sup>JKG</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="datauser">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="dataseminar">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Seminar</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="datapendaftaran">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pendaftaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-pink d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $data_nama ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a> -->

                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Pendaftaran</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahData" data-whatever="@mdo">Tambah Data</button>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Kampus</th>
                                            <th>Seminar</th>
                                            <th>Paket</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Sertifikat</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT tb_pendaftaran.id, tb_user.id as id_peserta, tb_user.nama as nama_peserta, tb_jenis_peserta.id as id_jenis_peserta, tb_kampus.nama as nama_kampus, tb_seminar.nama as nama_seminar, tb_paket.id as id_paket, tb_paket.nama as nama_paket, tb_harga.harga, tb_pendaftaran.status, tb_pendaftaran.status_sertifikat FROM tb_pendaftaran INNER JOIN tb_user ON tb_user.id=tb_pendaftaran.id_user INNER JOIN tb_seminar ON tb_seminar.id=tb_pendaftaran.id_seminar INNER JOIN tb_paket ON tb_paket.id=tb_pendaftaran.id_paket INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga INNER JOIN tb_kampus ON tb_kampus.id=tb_user.id_kampus INNER JOIN tb_jenis_peserta ON tb_paket.id_jenis_peserta=tb_jenis_peserta.id");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $PendaftaranId = $row['id'];
                                            $PendaftaranNama = $row['nama_peserta'];
                                            $PendaftaranKampus = $row['nama_kampus'];
                                            $PendaftaranSeminar = $row['nama_seminar'];
                                            $PendaftaranPaket = $row['nama_paket'];
                                            $PendaftaranHarga = $row['harga'];
                                            $PendaftaranStatus = $row['status'];
                                            $PendaftaranSertifikat = $row['status_sertifikat'];


                                            $IdPeserta = $row['id_peserta'];
                                            $IdJenisPeserta = $row['id_jenis_peserta'];
                                            $IdPaket = $row['id_paket'];


                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $PendaftaranNama ?></td>
                                                <td><?php echo $PendaftaranKampus ?></td>
                                                <td><?php echo $PendaftaranSeminar ?></td>
                                                <td><?php echo $PendaftaranPaket ?></td>
                                                <td><?php echo $PendaftaranHarga ?></td>
                                                <td><?php

                                                    if ($PendaftaranStatus == "lunas") {
                                                        echo "Lunas";
                                                    } else {
                                                        echo "Belum Lunas";
                                                    }

                                                    ?></td>

                                                <td><?php

                                                    if ($PendaftaranSertifikat == "aktif") {
                                                        echo "Aktif";
                                                    } else {
                                                        echo "Tdak Aktif";
                                                    }


                                                    ?></td>

                                                <td>


                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit<?= $PendaftaranId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus<?= $PendaftaranId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>


                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit<?= $PendaftaranId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="datapendaftaran?id=<?= $PendaftaranId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama Peserta</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-nama-peserta">
                                                                        <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT * from tb_user where id_role = '2' AND id = '$IdPeserta' limit 1") or die(mysqli_error($koneksi));
                                                                        $data1 = mysqli_fetch_array($query1);
                                                                        echo "<option value=$data1[id]> $data1[nama]</option>";


                                                                        $query2 = mysqli_query($koneksi, "SELECT * from tb_user where id != '$IdPeserta' AND id_role = '2'") or die(mysqli_error($koneksi));
                                                                        while ($data2 = mysqli_fetch_array($query2)) {
                                                                            echo "<option value=$data2[id]> $data2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>



                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Seminar</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-nama-seminar">
                                                                        <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT * from tb_seminar where nama = '$PendaftaranSeminar' limit 1") or die(mysqli_error($koneksi));
                                                                        $data1 = mysqli_fetch_array($query1);
                                                                        echo "<option value=$data1[id]> $data1[nama]</option>";


                                                                        $query2 = mysqli_query($koneksi, "SELECT * from tb_seminar where nama != '$PendaftaranSeminar'") or die(mysqli_error($koneksi));
                                                                        while ($data2 = mysqli_fetch_array($query2)) {
                                                                            echo "<option value=$data2[id]> $data2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Paket</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-nama-paket">
                                                                        <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT tb_paket.id, tb_paket.nama, tb_jenis_peserta.nama as jenis from tb_paket INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_paket.id_jenis_peserta where tb_paket.id = '$IdPaket' limit 1") or die(mysqli_error($koneksi));
                                                                        $data1 = mysqli_fetch_array($query1);
                                                                        echo "<option value=$data1[id]> $data1[nama] - ($data1[jenis])</option>";


                                                                        $query2 = mysqli_query($koneksi, "SELECT tb_paket.id, tb_paket.nama, tb_jenis_peserta.nama as jenis from tb_paket INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_paket.id_jenis_peserta where tb_paket.id != '$IdPaket' AND tb_jenis_peserta.id = '$IdJenisPeserta'") or die(mysqli_error($koneksi));
                                                                        while ($data2 = mysqli_fetch_array($query2)) {
                                                                            echo "<option value=$data2[id]> $data2[nama] - ($data1[jenis])</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Status</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-nama-status">

                                                                        <?php

                                                                        if ($PendaftaranStatus == 'belum_bayar') {

                                                                            echo "<option selected value='belum_bayar'>Belum Lunas</option>";
                                                                            echo "<option value='lunas'>Lunas</option>";
                                                                        } else {
                                                                            echo "<option selected value='lunas'>Lunas</option>";
                                                                            echo "<option value='belum_bayar'>Belum Lunas</option>";
                                                                        }

                                                                        ?>




                                                                    </select>
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Status Sertifikat</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-nama-sertifikat">

                                                                        <?php

                                                                        if ($PendaftaranSertifikat == 'aktif') {

                                                                            echo "<option selected value='aktif'>Aktif</option>";
                                                                            echo "<option value='tidak_aktif'>Tidak Aktif</option>";
                                                                        } else {
                                                                            echo "<option selected value='tidak_aktif'>Tidak Aktif</option>";
                                                                            echo "<option value='aktif'>Aktif</option>";
                                                                        }

                                                                        ?>




                                                                    </select>
                                                                </div>



                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Hapus<?= $PendaftaranId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $PendaftaranNama ?> ?</h6>
                                                        </div>
                                                        <form action="datapendaftaran?id=<?= $PendaftaranId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->
                                        <?php
                                        }
                                        ?>


                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Tambah Data  -->


    <div class="modal fade" id="TambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nama Peserta</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-nama-peserta">
                                <option value="">Pilih Peserta</option>
                                <?php

                                $query2 = mysqli_query($koneksi, "SELECT tb_user.id, tb_user.nama, tb_kampus.nama as nama_kampus from tb_user inner join tb_kampus on tb_kampus.id=tb_user.id_kampus where id_role = '2'") or die(mysqli_error($koneksi));
                                while ($data2 = mysqli_fetch_array($query2)) {
                                    echo "<option value=$data2[id]> $data2[nama] - ($data2[nama_kampus])</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Seminar</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-nama-seminar">
                                <option value="">Pilih Seminar</option>
                                <?php

                                $query2 = mysqli_query($koneksi, "SELECT * from tb_seminar") or die(mysqli_error($koneksi));
                                while ($data2 = mysqli_fetch_array($query2)) {
                                    echo "<option value=$data2[id]> $data2[nama]</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Paket</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-nama-paket">
                                <option value="">Pilih Paket</option>
                                <?php

                                $query2 = mysqli_query($koneksi, "SELECT tb_paket.id, tb_paket.nama, tb_jenis_peserta.nama as jenis from tb_paket INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_paket.id_jenis_peserta") or die(mysqli_error($koneksi));
                                while ($data2 = mysqli_fetch_array($query2)) {
                                    echo "<option value=$data2[id]> $data2[nama] - ($data2[jenis])</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Status</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-nama-status">
                                <option value="">Pilih Paket</option>
                                <option value="lunas">Lunas</option>
                                <option value="belum_bayar">Belum Bayar</option>


                            </select>
                        </div>


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Status Sertifikat</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-nama-sertifikat">
                                <option value="">Pilih Status Sertifikat</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>


                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-pink shadow-sm" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-sm btn-pink shadow-sm" href="logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript" defer="defer">
        $(document).ready(function() {
            $("table[id^='TABLE']").DataTable({
                "scrollCollapse": true,
                "searching": true,
                "paging": true,
              
            });
        });
    </script>
    

    


</body>

</html>

<?php
error_reporting(0);
if (isset($_POST['tambah-data'])) {


    $TambahNamaPeserta = $_POST['tambah-nama-peserta'];
    // $TambahNamaKampus = $_POST['tambah-nama-kampus'];
    $TambahNamaSeminar = $_POST['tambah-nama-seminar'];
    $TambahNamaPaket = $_POST['tambah-nama-paket'];
    $TambahNamaStatus = $_POST['tambah-nama-status'];
    $TambahNamaSertifikat = $_POST['tambah-nama-sertifikat'];


    $querycek = "SELECT * FROM tb_pendaftaran WHERE id_user = '$TambahNamaPeserta' AND id_seminar = '$TambahNamaSeminar'";
    $resultcek = mysqli_query($koneksi, $querycek);

    if (mysqli_num_rows($resultcek) > 0) {
        echo "<script>
        Swal.fire({title: 'User Telah Terdaftar Pada Seminar',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = 'datapendaftaran';}
        })</script>";
    } else {

        $query    = "INSERT INTO tb_pendaftaran SET id_user = '$TambahNamaPeserta', id_seminar = '$TambahNamaSeminar', id_paket = '$TambahNamaPaket', status = '$TambahNamaStatus', status_sertifikat = '$TambahNamaSertifikat'";
        $result   = mysqli_query($koneksi, $query);


        if ($result) {
            echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datapendaftaran';}
                })</script>";
        } else {

            echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datapendaftaran';}
                    })</script>";
        }
    }
}



?>

<?php

error_reporting(0);
$EditNamaPeserta = $_POST['edit-nama-peserta'];
// $TambahNamaKampus = $_POST['tambah-nama-kampus'];
$EditNamaSeminar = $_POST['edit-nama-seminar'];
$EditNamaPaket = $_POST['edit-nama-paket'];
$EditNamaStatus = $_POST['edit-nama-status'];
$EditNamaSertifikat = $_POST['edit-nama-sertifikat'];

if (isset($_POST['edit-data'])) {

    $querycekuser = mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran WHERE id_user = '$EditNamaPeserta' AND id_seminar = '$EditNamaSeminar'");
    $resultcekuser = mysqli_fetch_array($querycekuser);


    if ($_GET['id'] == $resultcekuser['id']) {

        $querystatus = "UPDATE tb_pendaftaran SET status = '$EditNamaStatus', id_paket = '$EditNamaPaket', status = '$EditNamaStatus', status_sertifikat = '$EditNamaSertifikat' WHERE id = '$_GET[id]'";
        $resultstatus = mysqli_query($koneksi, $querystatus);

        if ($resultstatus) {
            echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'datapendaftaran';}
            })</script>";
        } else {
            echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'datapendaftaran';}
          })</script>";
        }
    } else {

        $editdatauser = mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran WHERE id_user = '$EditNamaPeserta' AND id_seminar = '$EditNamaSeminar' AND id != '$_GET[id]'");

        // $editdataseminar = mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran WHERE id_seminar = '$EditSeminar' AND id != '$_GET[id]'");


        if (mysqli_num_rows($editdatauser) > 0) {
            echo "<script>
                Swal.fire({title: 'Username Telah Terdaftar',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datapendaftaran';}
                })</script>";
        } else {
            $query = "UPDATE tb_pendaftaran SET id_user = '$EditNamaPeserta', id_seminar = '$EditNamaSeminar', id_paket = '$EditNamaPaket', status = '$EditNamaStatus', status_sertifikat = '$EditNamaSertifikat' WHERE id = '$_GET[id]'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>
                Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datapendaftaran';}
                })</script>";
            } else {
                echo "<script>
              Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
              }).then((result) => {if (result.value)
                  {window.location = 'datapendaftaran';}
              })</script>";
            }
        }
    }
}



?>

<?php

error_reporting(0);
$EditStatus = $_POST['edit-status'];

if (isset($_POST['ubah-status'])) {

    $query = "UPDATE tb_pendaftaran SET id_status = '$EditStatus' WHERE id = '$_GET[id]'";
    $result = mysqli_query($koneksi, $query);

    if ($query) {
        echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'datapendaftaran';}
            })</script>";
    } else {
        echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'datapendaftaran';}
          })</script>";
    }
}



?>




<?php
error_reporting(0);

if (isset($_POST['delete-data'])) {

    if (isset($_POST['delete-data'])) {
        $querydel = "DELETE FROM tb_pendaftaran WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datapendaftaran';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datapendaftaran';}
    })</script>";
    }
} else {
}


?>