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

    <title>Data Seminar - Hima JKG</title>

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

            <li class="nav-item active">
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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Seminar</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataSeminar" data-whatever="@mdo">Tambah Data</button>




                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE1" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Group Wa</th>
                                            <th>Deskripsi</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT * FROM tb_seminar ORDER BY nama ASC");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $SeminarId = $row['id'];
                                            $SeminarNama = $row['nama'];
                                            $SeminarDeskripsi = $row['deskripsi'];
                                            $SeminarGroupWa = $row['group_wa'];



                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $SeminarNama ?></td>
                                                <td><button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Detail-WA<?= $SeminarId ?>" data-whatever="@mdo">Detail</button></td>
                                                <td><button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Detail-Seminar<?= $SeminarId ?>" data-whatever="@mdo">Detail</button></td>


                                                <td>

                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit-Seminar<?= $SeminarId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus-Seminar<?= $SeminarId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>

                                            <!-- Modal Detal Deskripsi  -->


                                            <div class="modal fade" id="Modal-Detail-Seminar<?= $SeminarId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Deskripsi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SeminarId ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Deskripsi</label>
                                                                    <textarea type="text" class="form-control" name="edit-deskripsi" value="" id="" rows="5"><?php echo $SeminarDeskripsi ?></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Detal WA  -->


                                            <div class="modal fade" id="Modal-Detail-WA<?= $SeminarId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Whatsapp</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SeminarId ?>" method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Deskripsi</label>
                                                                    <textarea type="text" class="form-control" name="edit-deskripsi" value="" id="" rows="5"><?php echo $SeminarGroupWa ?></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">

                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->



                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit-Seminar<?= $SeminarId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SeminarId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="recipient-name" name="edit-nama" value="<?php echo $SeminarNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Deskripsi</label>
                                                                    <textarea type="text" class="form-control" name="edit-deskripsi" rows="5" placeholder="Masukkan Deskripsi"><?php echo $SeminarDeskripsi ?></textarea>

                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Link Group</label>
                                                                    <textarea type="text" class="form-control" name="edit-wa" rows="5" placeholder="Masukkan Deskripsi"><?php echo $SeminarGroupWa ?></textarea>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-seminar" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Hapus-Seminar<?= $SeminarId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $SeminarNama ?> ?</h6>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SeminarId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-seminar" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Paket</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataPaket" data-whatever="@mdo">Tambah Data</button>




                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE4" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jenis Peserta</th>
                                            <th>Sertifikat</th>
                                            <th>Harga</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT tb_paket.id, tb_paket.nama as nama_paket, tb_jenis_peserta.nama as jenis_peserta , tb_sertifikat.nama as nama_sertifikat, tb_harga.harga as nominal_harga FROM tb_paket INNER JOIN tb_jenis_peserta ON tb_jenis_peserta.id=tb_paket.id_jenis_peserta INNER JOIN tb_sertifikat ON tb_sertifikat.id=tb_paket.id_sertifikat INNER JOIN tb_harga ON tb_harga.id=tb_paket.id_harga");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $PaketId = $row['id'];
                                            $PaketNama = $row['nama_paket'];
                                            $PaketJenisPeserta = $row['jenis_peserta'];
                                            $PaketSertifikat = $row['nama_sertifikat'];
                                            $PaketHarga = $row['nominal_harga'];

                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $PaketNama ?></td>
                                                <td><?php echo $PaketJenisPeserta ?></td>
                                                <td><?php echo $PaketSertifikat ?></td>
                                                <td><?php echo $PaketHarga ?></td>


                                                <td>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit-Paket<?= $PaketId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus-Paket<?= $PaketId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>


                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit-Paket<?= $PaketId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $PaketId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="recipient-name" name="edit-nama-paket" value="<?php echo $PaketNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Jenis Peserta</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-jenis-peserta-paket">
                                                                        <?php

                                                                        $queryjenispeserta = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta where nama = '$PaketJenisPeserta' limit 1") or die(mysqli_error($koneksi));
                                                                        $datajenispeserta = mysqli_fetch_array($queryjenispeserta);
                                                                        echo "<option value=$datajenispeserta[id]> $datajenispeserta[nama]</option>";


                                                                        $queryjenispeserta2 = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta") or die(mysqli_error($koneksi));
                                                                        while ($datajenispeserta2 = mysqli_fetch_array($queryjenispeserta2)) {
                                                                            echo "<option value=$datajenispeserta2[id]> $datajenispeserta2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Sertifikat</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-sertifikat-paket">
                                                                        <?php

                                                                        $querysertifikat = mysqli_query($koneksi, "SELECT * from tb_sertifikat where nama = '$PaketSertifikat' limit 1") or die(mysqli_error($koneksi));
                                                                        $datasertifikat = mysqli_fetch_array($querysertifikat);
                                                                        echo "<option value=$datasertifikat[id]> $datasertifikat[nama]</option>";


                                                                        $querysertifikat2 = mysqli_query($koneksi, "SELECT * from tb_sertifikat") or die(mysqli_error($koneksi));
                                                                        while ($datasertifikat2 = mysqli_fetch_array($querysertifikat2)) {
                                                                            echo "<option value=$datasertifikat2[id]> $datasertifikat2[nama]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Harga</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-harga-paket">
                                                                        <?php

                                                                        $queryhargapaket = mysqli_query($koneksi, "SELECT * from tb_harga where harga = '$PaketHarga' limit 1") or die(mysqli_error($koneksi));
                                                                        $datapaket = mysqli_fetch_array($queryhargapaket);
                                                                        echo "<option value=$datapaket[id]> $datapaket[harga]</option>";


                                                                        $queryhargapaket2 = mysqli_query($koneksi, "SELECT * from tb_harga") or die(mysqli_error($koneksi));
                                                                        while ($datapaket2 = mysqli_fetch_array($queryhargapaket2)) {
                                                                            echo "<option value=$datapaket2[id]> $datapaket2[harga]</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>




                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-paket" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Hapus-Paket<?= $PaketId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $PaketNama ?> ?</h6>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $PaketId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-paket" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Sertifikat</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataSertifikat" data-whatever="@mdo">Tambah Data</button>




                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE3" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Url</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT * FROM tb_sertifikat");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $SertifikatId = $row['id'];
                                            $SertifikatNama = $row['nama'];
                                            $SertifikatUrl = $row['url'];
                                            $SertifikatStatus = $row['status'];



                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $SertifikatNama ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit-Sertifikat-Url<?= $SertifikatId ?>" data-whatever="@mdo">Detail Url</button>
                                                </td>
                                                <td>

                                                    <?php

                                                    if ($SertifikatStatus == "aktif") {
                                                        $SertifikatStatuss = "Aktif";
                                                    } else {

                                                        $SertifikatStatuss = "Tidak Aktif";
                                                    }

                                                    ?>

                                                    <?php echo $SertifikatStatuss ?>


                                                </td>

                                                <td>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit-Sertifikat<?= $SertifikatId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus-Sertifikat<?= $SertifikatId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>

                                            <!-- Modal Url  -->


                                            <div class="modal fade" id="Modal-Edit-Sertifikat-Url<?= $SertifikatId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Detail Url</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">


                                                            <div class="form-group">
                                                                <label for="recipient-name" class="col-form-label">Detail Url</label>
                                                                <textarea type="text" class="form-control" name="edit-deskripsi" value="" id="" rows="5"><?php echo $SertifikatUrl ?></textarea>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->


                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit-Sertifikat<?= $SertifikatId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SertifikatId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="recipient-name" name="edit-nama-sertifikat" value="<?php echo $SertifikatNama ?>" placeholder="Masukkan Nama" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Url</label>
                                                                    <input type="text" class="form-control" id="recipient-name" name="edit-url-sertifikat" value="<?php echo $SertifikatUrl ?>" placeholder="Masukkan Url" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Status</label>
                                                                    <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-status-sertifikat">
                                                                        <?php

                                                                        if ($SertifikatStatus == "aktif") {
                                                                            echo "<option value='aktif' selected>Aktif</option>";
                                                                            echo "<option value='tidak_aktif'>Tidak Aktif</option>";
                                                                        } else {
                                                                            echo "<option value='aktif'>Aktif</option>";
                                                                            echo "<option value='tidak_aktif' selected>Tidak Aktif</option>";
                                                                        }
                                                                        ?>


                                                                    </select>
                                                                </div>


                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-sertifikat" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Hapus-Sertifikat<?= $SertifikatId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $SertifikatNama ?> ?</h6>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $SertifikatId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-sertifikat" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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
                    <h1 class="h3 mb-2 text-gray-800">Tabel Data Harga</h1>
                    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

                            <button type="button" class="btn btn-sm btn-pink shadow-sm mb-4" data-toggle="modal" data-target="#TambahDataHarga" data-whatever="@mdo">Tambah Data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="TABLE2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Harga</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php

                                        $query = ("SELECT * FROM tb_harga");
                                        $result = mysqli_query($koneksi, $query);



                                        $no = 1;

                                        while ($row = mysqli_fetch_array($result)) {

                                            $HargaId = $row['id'];
                                            $HargaNominal = $row['harga'];




                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $HargaNominal ?></td>
                                                <td>

                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Edit-Harga<?= $HargaId ?>" data-whatever="@mdo">Edit</button>
                                                    <button type="button" class="btn btn-sm btn-pink shadow-sm" data-toggle="modal" data-target="#Modal-Hapus-Harga<?= $HargaId ?>" data-whatever="@mdo">Hapus</button>

                                                </td>
                                            </tr>

                                            <!-- Modal Edit  -->


                                            <div class="modal fade" id="Modal-Edit-Harga<?= $HargaId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $HargaId ?>" method="post">
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label for="recipient-name" class="col-form-label">Nama</label>
                                                                    <input type="text" class="form-control" id="recipient-name" name="edit-harga" value="<?php echo $HargaNominal ?>" placeholder="Masukkan Harga" required>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" name="edit-data-harga" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                                                                <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- End -->

                                            <!-- Modal Hapus  -->


                                            <div class="modal fade" id="Modal-Hapus-Harga<?= $HargaId ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="exampleModalLabel">Modal Hapus Data</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h6>Anda Yakin Akan Menghapus Data <?= $HargaNominal ?> ?</h6>
                                                        </div>
                                                        <form action="dataseminar?id=<?= $HargaId ?>" method="post">
                                                            <div class="modal-footer">
                                                                <button type="submit" name="delete-data-harga" class="btn btn-sm btn-pink shadow-sm">Hapus</button>

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

    <!-- Tambah Data Seminar -->


    <div class="modal fade" id="TambahDataSeminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name" name="tambah-nama" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Deskripsi</label>
                            <textarea type="text" class="form-control" id="recipient-name" name="tambah-deskripsi" rows="5" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link Group WA</label>
                            <textarea type="text" class="form-control" id="recipient-name" name="tambah-wa" rows="5" placeholder="Masukkan Deskripsi" required></textarea>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-seminar" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Tambah Data Paket -->


    <div class="modal fade" id="TambahDataPaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name" name="tambah-nama-paket" value="" placeholder="Masukkan Nama" required>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Jenis Peserta</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-jenis-peserta-paket">
                                <option value="">Pilih Jenis Peserta</option>
                                <?php




                                $queryjenispeserta2 = mysqli_query($koneksi, "SELECT * from tb_jenis_peserta") or die(mysqli_error($koneksi));
                                while ($datajenispeserta2 = mysqli_fetch_array($queryjenispeserta2)) {
                                    echo "<option value=$datajenispeserta2[id]> $datajenispeserta2[nama]</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Sertifikat</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-sertifikat-paket">
                                <option value="">Pilih Sertifikat</option>
                                <?php


                                $querysertifikat2 = mysqli_query($koneksi, "SELECT * from tb_sertifikat") or die(mysqli_error($koneksi));
                                while ($datasertifikat2 = mysqli_fetch_array($querysertifikat2)) {
                                    echo "<option value=$datasertifikat2[id]> $datasertifikat2[nama]</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Harga</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-harga-paket">
                                <option value="">Pilih Harga</option>
                                <?php



                                $queryhargapaket2 = mysqli_query($koneksi, "SELECT * from tb_harga") or die(mysqli_error($koneksi));
                                while ($datapaket2 = mysqli_fetch_array($queryhargapaket2)) {
                                    echo "<option value=$datapaket2[id]> $datapaket2[harga]</option>";
                                }
                                ?>


                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-paket" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End -->

    <!-- Tambah Data Sertifikat -->


    <div class="modal fade" id="TambahDataSertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name" name="tambah-nama-sertifikat" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Url</label>
                            <textarea type="text" class="form-control" id="recipient-name" name="tambah-url-sertifikat" rows="3" placeholder="Masukkan Url" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Status</label>
                            <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="tambah-status-sertifikat">
                                <option value="">Pilih Status</option>
                                <option value="aktif">Aktif</option>
                                <option value="tidak_aktif">Tidak Aktif</option>


                            </select>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-sertifikat" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
                        <button type="button" class="btn btn-sm btn-pink shadow-sm" data-dismiss="modal">Tutup</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- End -->




    <!-- Tambah Data Harga -->


    <div class="modal fade" id="TambahDataHarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" id="recipient-name" name="tambah-harga" placeholder="Masukkan Harga" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="tambah-data-harga" class="btn btn-sm btn-pink shadow-sm">Simpan</button>
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


<!-- QUERY DATA SEMINAR -->

<?php
error_reporting(0);
if (isset($_POST['tambah-data-seminar'])) {


    $TambahNamaSeminar = $_POST['tambah-nama'];
    $TambahDeskripsiSeminar = $_POST['tambah-deskripsi'];
    $TambahWASeminar = $_POST['tambah-wa'];

    $query    = "INSERT INTO tb_seminar SET nama = '$TambahNamaSeminar', deskripsi = '$TambahDeskripsiSeminar', group_wa = '$TambahWASeminar'";


    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'dataseminar';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'dataseminar';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);
$EditNamaSeminar = $_POST['edit-nama'];
$EditDeskripsiSeminar = $_POST['edit-deskripsi'];
$EditWASeminar = $_POST['edit-wa'];


if (isset($_POST['edit-data-seminar'])) {


    $query = "UPDATE tb_seminar SET nama = '$EditNamaSeminar', deskripsi = '$EditDeskripsiSeminar', group_wa = '$EditWASeminar' WHERE id = '$_GET[id]'";
    $result = mysqli_query($koneksi, $query);

    if ($query) {
        echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'dataseminar';}
            })</script>";
    } else {
        echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'dataseminar';}
          })</script>";
    }
}

?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-seminar'])) {

    if (isset($_POST['delete-data-seminar'])) {
        $querydel = "DELETE FROM tb_seminar WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    }
} else {
}


?>

<!-- END QUERY DATA SEMINAR -->




<!-- QUERY DATA PAKET -->

<?php
error_reporting(0);
if (isset($_POST['tambah-data-paket'])) {


    $TambahNamaPaket = $_POST['tambah-nama-paket'];

    $TambahJenisPesertaPaket = $_POST['tambah-jenis-peserta-paket'];

    $TambahSertifikatPaket = $_POST['tambah-sertifikat-paket'];

    $TambahHargaPaket = $_POST['tambah-harga-paket'];



    $query    = "INSERT INTO tb_paket SET nama = '$TambahNamaPaket', id_jenis_peserta = '$TambahJenisPesertaPaket', id_sertifikat = '$TambahSertifikatPaket', id_harga = '$TambahHargaPaket'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'dataseminar';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'dataseminar';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);
$EditNamaPaket = $_POST['edit-nama-paket'];

$EditJenisPesertaPaket = $_POST['edit-jenis-peserta-paket'];

$EditSertifikatPaket = $_POST['edit-sertifikat-paket'];

$EditHargaPaket = $_POST['edit-harga-paket'];



if (isset($_POST['edit-data-paket'])) {


    $query = "UPDATE tb_paket SET nama = '$EditNamaPaket', id_jenis_peserta = '$EditJenisPesertaPaket', id_sertifikat = '$EditSertifikatPaket', id_harga = '$EditHargaPaket' WHERE id = '$_GET[id]'";
    $result = mysqli_query($koneksi, $query);

    if ($query) {
        echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'dataseminar';}
            })</script>";
    } else {
        echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'dataseminar';}
          })</script>";
    }
}

?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-paket'])) {

    if (isset($_POST['delete-data-paket'])) {
        $querydel = "DELETE FROM tb_paket WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    }
} else {
}


?>


<!-- END QUERY DATA PAKET -->




<!-- QUERY DATA SERTIFIKAT -->


<?php
error_reporting(0);
if (isset($_POST['tambah-data-sertifikat'])) {


    $TambahNamaSertifikat = $_POST['tambah-nama-sertifikat'];
    $TambahUrlSertifikat = $_POST['tambah-url-sertifikat'];
    $TambahStatusSertifikat = $_POST['tambah-status-sertifikat'];


    $query    = "INSERT INTO tb_sertifikat SET nama = '$TambahNamaSertifikat', url = '$TambahUrlSertifikat', status = '$TambahStatusSertifikat'";
    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'dataseminar';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'dataseminar';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);
$EditNamaSertifikat = $_POST['edit-nama-sertifikat'];
$EditUrlSertifikat = $_POST['edit-url-sertifikat'];
$EditStatusSertifikat = $_POST['edit-status-sertifikat'];


if (isset($_POST['edit-data-sertifikat'])) {


    $query = "UPDATE tb_sertifikat SET nama = '$EditNamaSertifikat', url = '$EditUrlSertifikat', status = '$EditStatusSertifikat' WHERE id = '$_GET[id]'";
    $result = mysqli_query($koneksi, $query);

    if ($query) {
        echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'dataseminar';}
            })</script>";
    } else {
        echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'dataseminar';}
          })</script>";
    }
}

?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-sertifikat'])) {

    if (isset($_POST['delete-data-sertifikat'])) {
        $querydel = "DELETE FROM tb_sertifikat WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    }
} else {
}


?>

<!-- END QUERY DATA SERTIFIKAT -->





<!-- QUERY DATA HARGA -->

<?php
error_reporting(0);
if (isset($_POST['tambah-data-harga'])) {


    $TambahHargaSeminar = $_POST['tambah-harga'];


    $query    = "INSERT INTO tb_harga SET harga = '$TambahHargaSeminar'";


    $result   = mysqli_query($koneksi, $query);


    if ($result) {
        echo "<script>
                Swal.fire({title: 'Data Berhasil Disimpan',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'dataseminar';}
                })</script>";
    } else {

        echo "<script>
                    Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'dataseminar';}
                    })</script>";
    }
}



?>

<?php

error_reporting(0);
$EditHargaSeminar = $_POST['edit-harga'];


if (isset($_POST['edit-data-harga'])) {


    $query = "UPDATE tb_harga SET harga = '$EditHargaSeminar' WHERE id = '$_GET[id]'";
    $result = mysqli_query($koneksi, $query);

    if ($query) {
        echo "<script>
            Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'dataseminar';}
            })</script>";
    } else {
        echo "<script>
          Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
          }).then((result) => {if (result.value)
              {window.location = 'dataseminar';}
          })</script>";
    }
}

?>

<?php
error_reporting(0);

if (isset($_POST['delete-data-harga'])) {

    if (isset($_POST['delete-data-harga'])) {
        $querydel = "DELETE FROM tb_harga WHERE id = '$_GET[id]' ";
        $result = mysqli_query($koneksi, $querydel);

        echo "<script>
    Swal.fire({title: 'Data Berhasil Dihapus',text: '',icon: 'success',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    } else {
        echo "<script>
    Swal.fire({title: 'Data Gagal Dihapus',text: '',icon: 'error',confirmButtonText: 'OK'
    }).then((result) => {if (result.value)
        {window.location = 'dataseminar';}
    })</script>";
    }
} else {
}


?>

<!-- END QUERY HARGA -->