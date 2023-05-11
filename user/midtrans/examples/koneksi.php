<?php
$server = "localhost";
$username = "semnasjk_semjkg";
$password = "(I)4?Ns[,gI#";
$db = "semnasjk_db_semnas";
$koneksi = mysqli_connect($server, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi gagal :" . mysqli_connect_error();
}
