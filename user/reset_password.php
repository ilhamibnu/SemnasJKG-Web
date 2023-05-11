<?php
include "../connection/koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <title>Reset Password</title>
    <!-- Load Favicon-->
    <link rel="icon" href="./favicons/hikes.png" type="image/png" sizes="16x16" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!-- Load main stylesheet-->
    <link href="./css/styles.css" rel="stylesheet" />
     <link rel="stylesheet" href="./fontawesome/css/all.css" />
      <link href="./sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body class="bg-pattern-waihou">
    <!-- Layout wrapper-->
    <div id="layoutAuthentication">
        <!-- Layout content-->
        <div id="layoutAuthentication_content">
            <!-- Main page content-->
            <main>
                <!-- Main content container-->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xxl-10 col-xl-10 col-lg-12">
                            <div class="card card-raised shadow-10 mt-5 mt-xl-10 mb-4">
                                <div class="row g-0">
                                    <div class="col-lg-5 col-md-6">
                                        <div class="card-body p-5">
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <a class="btn btn-primary" href="login"><i class="fa fa-arrow-left"></i></a>
                                                <!-- <button type="submit" name="submit" class="btn btn-primary">Login</button> -->
                                            </div>
                                            <!-- Auth header with logo image-->
                                            <div class="text-center">
                                                <img class="mb-3" src="favicons/hikes.png" alt="..." style="height: 80px" />
                                                <h1 class="display-5 mb-0">Reset Password</h1>
                                                <div class="subheading-1 mb-5">Silahkan Masukkan Passsword Baru Anda</div>
                                            </div>
                                            <!-- Login submission form-->
                                            <form action="" method="post">

                                                <input class="form-control form-control" id="password" name="password" type="password" placeholder="Password" required>
                                                <label class="form-label" for="password"></label>

                                                <input class="form-control form-control" id="password" name="repassword" type="password" placeholder="Re-Password" required>

                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button name="reset-password" class="btn btn-primary">Reset</button>



                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <!-- <a class="small fw-500 text-decoration-none" href="https://beasiswadosen.kemdikbud.go.id/v2/auth/forgot_password">
                                                        Lupa Password?</a> -->
                                                </div>
                                            </form> <!-- Auth card message-->
                                            <br>
                                        </div>
                                    </div>
                                    <!-- Background image column using inline CSS-->
                                    <div class="col-lg-7 col-md-6 d-none d-md-block" style="background-image: url('./images/img-scholarship.png'); background-size: cover; background-repeat: no-repeat; background-position: center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- Layout footer-->
        <div id="layoutAuthentication_footer"></div>
    </div>
    <!-- Load Bootstrap JS bundle-->
    <script src="./js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Load global scripts-->
    <script type="module" src="./js/material.js"></script>
    <script src="./js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
     <script src="./sweetalert2/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>

<?php

$Code = base64_decode($_GET['code']);
$EnCode = $_GET['code'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];


if (isset($_POST['reset-password'])) {


    if ($password == $repassword) {

        $query    = "UPDATE tb_user SET password = '$password' WHERE code = '$Code'";
        $result   = mysqli_query($koneksi, $query);


        if ($result) {
            echo "<script>
                Swal.fire({title: 'Password Anda Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'login';}
                })</script>";
        } else {

            echo "<script>
                    Swal.fire({title: 'Terjadi Kesalahan',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'reset_password?code=$EnCode';}
                    })</script>";
        }
    } else {

        echo "<script>
                Swal.fire({title: 'Password Anda Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'reset_password?code=$EnCode';}
                })</script>";
    }
}



?>