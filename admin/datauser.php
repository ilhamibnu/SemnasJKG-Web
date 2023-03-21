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

    <title>Data User - Hima JKG</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen"> -->

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
            <li class="nav-item active">
                <a class="nav-link" href="datauser">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data User</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="dataseminar">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Seminar</span></a>
            </li>
            <li class="nav-item">
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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data User</h1>
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
                                <table class="table table-bordered" id='TABLE_1' class='display' width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Kampus</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT tb_user.id, tb_user.nama, tb_user.email, tb_user.username, tb_user.password, tb_kampus.nama as kampus FROM tb_user INNER JOIN tb_kampus ON tb_kampus.id=tb_user.id_kampus WHERE tb_user.id_role = 2 ORDER BY tb_user.nama asc");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $UserId = $row['id'];
                                            $UserEmail = $row['email'];
                                            $UserNama = $row['nama'];
                                            $UserUsername = $row['username'];
                                            $UserKampus = $row['kampus'];


                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $UserNama ?></td>
                                                <td><?php echo $UserEmail ?></td>
                                                <td><?php echo $UserUsername ?></td>
                                                <td><?php echo $UserKampus ?></td>


                                                <td>

                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit<?= $UserId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus<?= $UserId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>



                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit<?= $UserId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="datauser?id=<?= $UserId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control form-control-sm" id="recipient-name" name="edit-nama" value="<?php echo $UserNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Email</label>
                                                                    <input type="email" class="form-control form-control-sm" id="recipient-name" name="edit-email" value="<?php echo $UserEmail ?>" placeholder="Masukkan Nama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Username</label>
                                                                    <input type="text" class="form-control form-control-sm" id="recipient-name" name="edit-username" value="<?php echo $UserUsername ?>" placeholder="Masukkan Username" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Kampus</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-kampus">
                                                                        <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT * from tb_kampus where nama = '$UserKampus' limit 1") or die(mysqli_error($koneksi));
                                                                        $row1 = mysqli_fetch_array($query1);
                                                                        echo "<option value=$row1[id]> $row1[nama]</option>";


                                                                        $query2 = mysqli_query($koneksi, "SELECT * from tb_kampus") or die(mysqli_error($koneksi));
                                                                        while ($row2 = mysqli_fetch_array($query2)) {
                                                                            echo "<option value=$row2[id]> $row2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Password</label>
                                                                    <input type="password" class="form-control form-control-sm" id="recipient-name" name="edit-password" value="" placeholder="Masukkan Password" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Re-Password</label>
                                                                    <input type="password" class="form-control form-control-sm" id="recipient-name" name="edit-repassword" placeholder="Masukkan Repassword" required>
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


                                            <div class="modal fade" id="Modal-Hapus<?= $UserId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $UserNama ?> ?</h6>
                                                        </div>
                                                        <form action="datauser?id=<?= $UserId ?>" method="post">
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

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Kampus</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataKampus" data-whatever="@mdo">Tambah Data</button>


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE_2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Peserta</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT tb_kampus.id, tb_kampus.nama, tb_jenis_peserta.nama as jenis_peserta FROM tb_kampus INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_kampus.id_jenis_peserta ORDER BY tb_kampus.nama asc");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $KampusId = $row['id'];
                                            $KampusNama = $row['nama'];
                                            $KampusJenis = $row['jenis_peserta'];



                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $KampusNama ?></td>
                                                <td><?php echo $KampusJenis ?></td>


                                                <td>

                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Kampus-Edit<?= $KampusId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Kampus-Hapus<?= $KampusId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>



                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Kampus-Edit<?= $KampusId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="datauser?id=<?= $KampusId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control form-control-sm" id="recipient-name" name="edit-nama-kampus" value="<?php echo $KampusNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Jenis Peserta</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-jenis-peserta">
                                                                        <?php

                                                                        $query1 = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta where nama = '$KampusJenis' limit 1") or die(mysqli_error($koneksi));
                                                                        $row1 = mysqli_fetch_array($query1);
                                                                        echo "<option value=$row1[id]> $row1[nama]</option>";


                                                                        $query2 = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta") or die(mysqli_error($koneksi));
                                                                        while ($row2 = mysqli_fetch_array($query2)) {
                                                                            echo "<option value=$row2[id]> $row2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-kampus" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Kampus-Hapus<?= $KampusId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $KampusNama ?> ?</h6>
                                                        </div>
                                                        <form action="datauser?id=<?= $KampusId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-kampus" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Jenis Peserta</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataJenisPeserta" data-whatever="@mdo">Tambah Data</button>




                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE_2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT * from tb_jenis_peserta");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $JenisId = $row['id'];
                                            $JenisNama = $row['nama'];




                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $JenisNama ?></td>



                                                <td>

                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Jenis-Peserta-Edit<?= $JenisId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Jenis-Peserta-Hapus<?= $JenisId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>



                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Jenis-Peserta-Edit<?= $JenisId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data Jenis Peserta</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="datauser?id=<?= $JenisId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control form-control-sm" id="recipient-name" name="edit-nama-jenis-peserta" value="<?php echo $JenisNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-jenis-peserta" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Jenis-Peserta-Hapus<?= $JenisId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data Jenis Peserta</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $JenisNama ?> ?</h6>
                                                        </div>
                                                        <form action="datauser?id=<?= $JenisId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-jenis-peserta" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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

    <!-- Tambah Data User  -->


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
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kampus</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-kampus">
                                <option value="">Pilih Kampus</option>
                                <?php

                                $querykampus = mysqli_query($koneksi, "SELECT * from tb_kampus") or die(mysqli_error($koneksi));
                                while ($data = mysqli_fetch_array($querykampus)) {
                                    echo "<option value=$data[id]> $data[nama]</option>";
                                }
                                ?>


                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Password</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Re-Password</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-repassword" placeholder="Masukkan Password" required>
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

    <!-- Tambah Data Kampus  -->


    <div class="modal fade" id="TambahDataKampus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-nama-kampus" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jenis Peserta</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-jenis-peserta">
                                <option value="">Pilih Jenis Peserta</option>
                                <?php

                                $queryjenispeserta = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta") or die(mysqli_error($koneksi));
                                while ($datapeserta = mysqli_fetch_array($queryjenispeserta)) {
                                    echo "<option value=$datapeserta[id]> $datapeserta[nama]</option>";
                                }
                                ?>

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-kampus" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Tambah Data Jenis Peserta  -->


    <div class="modal fade" id="TambahDataJenisPeserta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="recipient-name" class="col-form-label">Nama</label>
                            <input type="text" class="form-control form-control-sm" id="recipient-name" name="tambah-nama-jenis-peserta" placeholder="Masukkan Nama" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-jenis-peserta" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
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

<!-- QUERY USER -->

<?php
error_reporting(0);
if (isset($_POST['tambah-data'])) {
    $TambahNamaUser = mysqli_real_escape_string($koneksi, $_POST['tambah-nama']);
    $TambahEmailUser = $_POST['tambah-email'];
    $TambahUsernameUser = mysqli_real_escape_string($koneksi, $_POST['tambah-username']);
    $TambahKampusUser = $_POST['tambah-kampus'];
    $TambahPasswordUser = $_POST['tambah-password'];
    $TambahRepasswordUser = $_POST['tambah-repassword'];

    $querycek = "SELECT * FROM tb_user WHERE username = '$TambahUsernameUser' AND id_role = '2'";
    $resultcek = mysqli_query($koneksi, $querycek);

    $querycekemail = "SELECT * FROM tb_user WHERE email = '$TambahEmailUser' AND id_role = '2'";
    $resultcekemail = mysqli_query($koneksi, $querycekemail);

    if (mysqli_num_rows($resultcek) > 0) {
        echo "<script>
        Swal.fire({title: 'Username Telah Terdafar',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = '';}
        })</script>";
    } else if (mysqli_num_rows($resultcekemail) > 0) {
        echo "<script>
        Swal.fire({title: 'Email Telah Terdafar',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = '';}
        })</script>";
    } else {

        if ($TambahPasswordUser == $TambahRepasswordUser) {

            $query    = "INSERT INTO tb_user SET nama = '$TambahNamaUser', email = '$TambahEmailUser', username = '$TambahUsernameUser', id_kampus = '$TambahKampusUser', password = '$TambahPasswordUser', id_role = '2'";
            $result   = mysqli_query($koneksi, $query);


            if ($result) {
                echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
            } else {

                echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
            }
        } else {

            echo "<script>
                    Swal.fire({title: 'Password Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
        }
    }
}


?>

<?php

error_reporting(0);

// $id = $_GET['id'];

$EditNamaUser = mysqli_real_escape_string($koneksi, $_POST['edit-nama']);
$EditEmailUser = $_POST['edit-email'];
$EditUsernameUser = mysqli_real_escape_string($koneksi, $_POST['edit-username']);
$EditKampusUser = $_POST['edit-kampus'];
$EditPasswordUser = $_POST['edit-password'];
$EditRepasswordUser = $_POST['edit-repassword'];


if (isset($_POST['edit-data'])) {

    $querycek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$EditUsernameUser' AND id_role = '2'");
    $resultcek = mysqli_fetch_array($querycek);


    $querycekemail = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$EditEmailUser' AND id_role = '2'");
    $resultcekemail = mysqli_fetch_array($querycekemail);

    if ($_GET['id'] == $resultcek['id'] && $_GET['id'] == $resultcekemail['id']) {

        if ($EditPasswordUser == $EditRepasswordUser) {

            $query = "UPDATE tb_user SET nama = '$EditNamaUser', id_kampus = '$EditKampusUser', password = '$EditPasswordUser' WHERE id = '$_GET[id]'";
            $result = mysqli_query($koneksi, $query);

            if ($result) {
                echo "<script>
                    Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
            } else {
                echo "<script>
                  Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                  }).then((result) => {if (result.value)
                      {window.location = 'datauser';}
                  })</script>";
            }
        } else {

            echo "<script>
                Swal.fire({title: 'Password Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
        }
    } else {

        $editdata = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$EditUsernameUser' AND id != '$_GET[id]'");

        $editdataemail = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$EditEmailUser' AND id != '$_GET[id]'");

        if (mysqli_num_rows($editdata) > 0) {
            echo "<script>
                Swal.fire({title: 'Username Telah Terdaftar',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
        } elseif (mysqli_num_rows($editdataemail) > 0) {
            echo "<script>
                Swal.fire({title: 'Email Telah Terdaftar',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
        } else {

            if ($EditPasswordUser == $EditRepasswordUser) {

                $queryupdate = "UPDATE tb_user SET nama = '$EditNamaUser', email = '$EditEmailUser', username = '$EditUsernameUser', id_kampus = '$EditKampusUser', password = '$EditPasswordUser' WHERE id = '$_GET[id]'";
                $resultupdate = mysqli_query($koneksi, $queryupdate);

                if ($resultupdate) {
                    echo "<script>
                        Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value)
                            {window.location = 'datauser';}
                        })</script>";
                } else {
                    echo "<script>
                      Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                      }).then((result) => {if (result.value)
                          {window.location = 'datauser';}
                      })</script>";
                }
            } else {

                echo "<script>
                    Swal.fire({title: 'Password Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
            }
        }
    }
}


?>

<?php
error_reporting(0);

if (isset($_POST['delete-data'])) {

    if (isset($_POST['delete-data'])) {
        $querydel = "DELETE FROM tb_user WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    }
} else {
}


?>

<!-- END QUERY USER -->



<!-- QUERY KAMPUS -->


<?php
error_reporting(0);
if (isset($_POST['tambah-data-kampus'])) {

    $TambahNamaKampus = $_POST['tambah-nama-kampus'];
    $TambahJenisPeserta = $_POST['tambah-jenis-peserta'];

    $query    = "INSERT INTO tb_kampus SET nama = '$TambahNamaKampus', id_jenis_peserta = '$TambahJenisPeserta'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);

$EditNamaKampus = $_POST['edit-nama-kampus'];
$EditJenisPeserta = $_POST['edit-jenis-peserta'];

if (isset($_POST['edit-data-kampus'])) {

    $queryupdate = "UPDATE tb_kampus SET nama = '$EditNamaKampus', id_jenis_peserta = '$EditJenisPeserta' WHERE id = '$_GET[id]'";
    $resultupdate = mysqli_query($koneksi, $queryupdate);

    if ($resultupdate) {
        echo "<script>
                        Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value)
                            {window.location = 'datauser';}
                        })</script>";
    } else {
        echo "<script>
                      Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                      }).then((result) => {if (result.value)
                          {window.location = 'datauser';}
                      })</script>";
    }
} else {
}



?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-kampus'])) {

    if (isset($_POST['delete-data-kampus'])) {
        $querydel = "DELETE FROM tb_kampus WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    }
} else {
}


?>



<!-- END QUERY KAMPUS -->





<!-- QUERY JENIS PESERTA -->

<?php
error_reporting(0);
if (isset($_POST['tambah-data-jenis-peserta'])) {

    $TambahNamaJenisPeserta = $_POST['tambah-nama-jenis-peserta'];

    $query    = "INSERT INTO tb_jenis_peserta SET nama = '$TambahNamaJenisPeserta'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'datauser';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'datauser';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);

$EditNamaJenisPeserta = $_POST['edit-nama-jenis-peserta'];


if (isset($_POST['edit-data-jenis-peserta'])) {

    $queryupdate = "UPDATE tb_jenis_peserta SET nama = '$EditNamaJenisPeserta' WHERE id = '$_GET[id]'";
    $resultupdate = mysqli_query($koneksi, $queryupdate);

    if ($resultupdate) {
        echo "<script>
                        Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {if (result.value)
                            {window.location = 'datauser';}
                        })</script>";
    } else {
        echo "<script>
                      Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                      }).then((result) => {if (result.value)
                          {window.location = 'datauser';}
                      })</script>";
    }
} else {
}



?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-jenis-peserta'])) {

    if (isset($_POST['delete-data-jenis-peserta'])) {
        $querydel = "DELETE FROM tb_jenis_peserta WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'datauser';}
    })</script>";
    }
} else {
}


?>

<!-- END QUERY JENIS PESERTA -->