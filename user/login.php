<?php
include "../connection/koneksi.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <!-- Load Favicon-->
    <link rel="icon" href="./favicons/hikes.png" type="image/png" sizes="16x16" />
    <!-- Load Material Icons from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
    <!-- Roboto and Roboto Mono fonts from Google Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,500" rel="stylesheet" />
    <!-- Load main stylesheet-->
    <link href="./css/styles.css" rel="stylesheet" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
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
                                                <a class="btn btn-primary" href="/"><i class="fa fa-arrow-left"></i></a>
                                                <!-- <button type="submit" name="submit" class="btn btn-primary">Login</button> -->
                                            </div>
                                            <!-- Auth header with logo image-->
                                            <div class="text-center">
                                                <img class="mb-3" src="favicons/hikes.png" alt="..." style="height: 80px" />
                                                <h1 class="display-5 mb-0">Login</h1>
                                                <div class="subheading-1 mb-5">Silahkan login menggunakan Username dan Password Anda</div>
                                            </div>
                                            <!-- Login submission form-->
                                            <form action="" method="post" accept-charset="utf-8">

                                                <input class="form-control form-control" id="identity" name="username" type="text" placeholder="Username" required>
                                                <label class="form-label" for="password"></label>
                                                <input class="form-control form-control" id="password" name="password" type="password" placeholder="Password" required>
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button name="login" class="btn btn-primary">Login</button>

                                                    <a class="btn btn-primary" href="register">Register</a>
                                                </div>
                                                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <a class="small fw-500 text-decoration-none" href="change_password">
                                                        Lupa Password?</a>
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
if (isset($_POST['login'])) {
    //anti inject sql
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    //query login
    $querycek = "SELECT * FROM tb_user WHERE username = '$username' AND id_role = '2'";
    $resultcek = mysqli_query($koneksi, $querycek);

    if (mysqli_num_rows($resultcek) > 0) {

        $sql_login = "SELECT * FROM tb_user WHERE username='$username' AND password='$password' AND id_role = '2'";
        $query_login = mysqli_query($koneksi, $sql_login);
        $data_login = mysqli_fetch_array($query_login, MYSQLI_BOTH);
        $jumlah_login = mysqli_num_rows($query_login);

        if ($jumlah_login == 1) {

            $_SESSION["ses_id"] = $data_login["id"];
            $_SESSION["ses_nama"] = $data_login["nama"];
            $_SESSION["ses_email"] = $data_login["email"];
            $_SESSION["ses_username"] = $data_login["username"];
            $_SESSION["ses_password"] = $data_login["password"];
            $_SESSION["ses_role"] = $data_login["id_role"];
            $_SESSION["ses_role"] = $data_login["id_role"];
            $_SESSION["ses_id_kampus"] = $data_login["id_kampus"];


            echo "<script>
            Swal.fire({title: 'Anda Berhasil Login',text: '',icon: 'success',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = 'index';}
            })</script>";
        } else {

            echo "<script>
                Swal.fire({title: 'Password Anda Salah',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = '';}
                })</script>";
        }
    } else {
        echo "<script>
        Swal.fire({title: 'Username Belum Terdaftar',text: '',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value)
            {window.location = '';}
        })</script>";
    }
}


?>