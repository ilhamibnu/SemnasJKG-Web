<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false; // enable to production
// Config::$serverKey = 'Mid-server-xrJcgyl_f4gwmlyg93rEXto3'; // enable to productin

Config::$serverKey = 'SB-Mid-server-aNyMN6S4_am_yDaJ6fpdfrxc';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    $notif = new Notification();
} catch (\Exception $e) {
    exit($e->getMessage());
}

$notif = $notif->getResponse();
$transaction = $notif->transaction_status;

$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;


if ($transaction == "settlement") {

    $server = "localhost";
    $username = "semnasjk_semjkg";
    $password = "(I)4?Ns[,gI#";
    $db = "semnasjk_db_semnas";
    $koneksi = mysqli_connect($server, $username, $password, $db);



    mysqli_query($koneksi, "update tb_pendaftaran set status = 'lunas' where id = '$order_id'");
} else {


    $server = "localhost";
    $username = "semnasjk_semjkg";
    $password = "(I)4?Ns[,gI#";
    $db = "semnasjk_db_semnas";
    $koneksi = mysqli_connect($server, $username, $password, $db);

    mysqli_query($koneksi, "update tb_pendaftaran set status = 'belum_bayar' where id = '$order_id'");
}

function printExampleWarningMessage()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') != false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-aNyMN6S4_am_yDaJ6fpdfrxc\';');
        die();
    }
}
