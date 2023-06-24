<?php
error_reporting(0);

$DeIdUser = base64_decode($_GET['id']);

$EditNamaUser =  mysqli_real_escape_string($koneksi, $_POST['edit-nama']);
// $EditKampusUser =  $_POST['edit-kampus'];
$EditEmailUser =  mysqli_real_escape_string($koneksi, $_POST['edit-email']);
$EditPasswordUser =  mysqli_real_escape_string($koneksi, $_POST['edit-password']);
$EditRepasswordUser =  mysqli_real_escape_string($koneksi, $_POST['edit-repassword']);


if (isset($_POST['edit-profil'])) {

    $cekemail = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$EditEmailUser'");
    $datacekemail = mysqli_fetch_array($cekemail);

    if ($DeIdUser == $datacekemail['id']) {

        if ($EditPasswordUser == $EditRepasswordUser) {

            $query = "UPDATE tb_user SET nama = '$EditNamaUser',  password = '$EditPasswordUser' WHERE id = '$DeIdUser'";
            $result = mysqli_query($koneksi, $query);

            if ($query) {
                echo "<script>
                Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = 'logout';}
                })</script>";
            } else {
                echo "<script>
              Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
              }).then((result) => {if (result.value)
                  {window.location = '';}
              })</script>";
            }
        } else {

            echo "<script>
            Swal.fire({title: 'Password Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = '';}
            })</script>";
        }
    } else {

        $editemail = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email = '$EditEmailUser' AND id != '$DeIdUser'");

        if (mysqli_num_rows($editemail) > 0) {
            echo "<script>
            Swal.fire({title: 'Email Telah Terdaftar',text: '',icon: 'error',confirmButtonText: 'OK'
            }).then((result) => {if (result.value)
                {window.location = '';}
            })</script>";
        } else {

            if ($EditPasswordUser == $EditRepasswordUser) {

                $query = "UPDATE tb_user SET nama = '$EditNamaUser', email = '$EditEmailUser', password = '$EditPasswordUser' WHERE id = '$DeIdUser'";
                $result = mysqli_query($koneksi, $query);

                if ($query) {
                    echo "<script>
                    Swal.fire({title: 'Data Berhasil Diubah',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {if (result.value)
                        {window.location = 'logout';}
                    })</script>";
                } else {
                    echo "<script>
                  Swal.fire({title: 'Data Gagal Disimpan',text: '',icon: 'error',confirmButtonText: 'OK'
                  }).then((result) => {if (result.value)
                      {window.location = '';}
                  })</script>";
                }
            } else {

                echo "<script>
                Swal.fire({title: 'Password Tidak Sama',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {if (result.value)
                    {window.location = '';}
                })</script>";
            }
        }
    }
}
