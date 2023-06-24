<?php
$server = "localhost";
$username = "semnasj1_semnas";
$password = "Semnaspassword#23";
$db = "semnasj1_db_semnas2";
$koneksi = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi gagal :" . mysqli_connect_error();
}
