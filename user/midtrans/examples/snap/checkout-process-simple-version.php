<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
// Config::$serverKey = 'Mid-server-xrJcgyl_f4gwmlyg93rEXto3';
// Config::$clientKey = 'Mid-client-Oz-BsU7U5-_kwA76';

Config::$serverKey = 'SB-Mid-server-aNyMN6S4_am_yDaJ6fpdfrxc';
Config::$clientKey = 'SB-Mid-client-T7tGstPTu1xNiEG7';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;


$IdPendaftaran = base64_decode($_GET['id']);
$Tagihan = base64_decode($_GET['tagihan']);
$NamaSeminar = base64_decode($_GET['nama_seminar']);
$NamaPeserta = base64_decode($_GET['nama_peserta']);
$EmailPeserta = base64_decode($_GET['email_peserta']);
$NamaPaket = base64_decode($_GET['nama_paket']);



// Required
$transaction_details = array(
    'order_id' => $IdPendaftaran,
    'gross_amount' => $Tagihan, // no decimal allowed for creditcard
);
// Optional
$item_details = array(
    array(
        'id' => 'a1',
        'price' => $Tagihan,
        'quantity' => 1,
        'name' => "$NamaSeminar ($NamaPaket)"
    ),
);
// Optional
$customer_details = array(
    'first_name'    => "$NamaPeserta",
    // 'last_name'     => "Litani",
    'email'         => "$EmailPeserta",
    // 'phone'         => "081122334455",
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
    echo $e->getMessage();
}
// echo "snapToken = " . $snap_token;

function printExampleWarningMessage()
{
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

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://semnasjkg.cloud/user/favicons/hikes.png" type="image/png" sizes="16x16" />
    <title>Pembayaran Semnas</title>
    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7COpen+Sans:400,600&amp;display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

    <!--Bootstrap css-->
    <link rel="stylesheet" href="./css/css-bootstrap.min.css" />
    <!--Magnific popup css-->
    <link rel="stylesheet" href="./css/css-magnific-popup.css" />
    <!--Themify icon css-->
    <link rel="stylesheet" href="./css/css-themify-icons.css" />
    <!--Fontawesome icon css-->
    <link rel="stylesheet" href="./css/css-all.min.css" />
    <!--animated css-->
    <link rel="stylesheet" href="./css/css-animate.min.css" />
    <!--ytplayer css-->
    <link rel="stylesheet" href="./css/css-jquery.mb.YTPlayer.min.css" />
    <!--Owl carousel css-->
    <link rel="stylesheet" href="./css/css-owl.carousel.min.css" />
    <link rel="stylesheet" href="./css/css-owl.theme.default.min.css" />
    <!--custom css-->
    <link rel="stylesheet" href="./css/css-style.css" />
    <!--responsive css-->
    <link rel="stylesheet" href="./css/css-responsive.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="about-us-section ptb-100 gray-light-bg">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-12 col-lg-12">
                    <div class="about-us-content-wrap">
                        <!-- <h3>Seminar Anda</h3> -->
                        <span class="animate-border mb-4"></span>

                        <div class="single-promo-2 single-promo-hover text-center p-5 my-md-3 my-lg-3 my-sm-0 shadow-sm white-bg rounded align-items-center">
                            <h4>Informasi</h4>
                            <p class="font-weight-bold" style="font-size: 16px;">Setelah memilih metode pembayaran diharapkan jangan lupa untuk menyimpan kode virtual account bank atau QRcode qris yang telah tergenerate otomatis, apabila anda mengguna motode pembayaran qris, lalu anda lupa untuk tidak menyimpan QRcode, silahkan hapus seminar anda pada menu seminar kemudian daftar kembali, sedangkan bagi anda yang menggunakan bank, silahkan cek email yang terdaftar untuk melihat code virtual account. Sekian terimakasih</p>
                            <button id="pay-button" class='btn secondary-solid-btn mr-3'>Pilih Metode Pembayaran</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            // SnapToken acquired from previous step
            snap.pay('<?php echo $snap_token ?>');
        };
    </script>
    <!--jQuery-->
    <script src="./js/js-jquery-3.5.0.min.js"></script>
    <!--Popper js-->
    <script src="./js/js-popper.min.js"></script>
    <!--Bootstrap js-->
    <script src="./js/js-bootstrap.min.js"></script>
    <!--Magnific popup js-->
    <script src="./js/js-jquery.magnific-popup.min.js"></script>
    <!--jquery easing js-->
    <script src="./js/js-jquery.easing.min.js"></script>
    <!--jquery ytplayer js-->
    <script src="./js/js-jquery.mb.YTPlayer.min.js"></script>
    <!--Isotope filter js-->
    <script src="./js/js-mixitup.min.js"></script>
    <!--wow js-->
    <script src="./js/js-wow.min.js"></script>
    <!--owl carousel js-->
    <script src="./js/js-owl.carousel.min.js"></script>
    <!--countdown js-->
    <script src="./js/js-jquery.countdown.min.js"></script>
    <!--jquery easypiechart-->
    <script src="./js/js-jquery.easy-pie-chart.js"></script>
    <!--custom js-->
    <script src="./js/js-scripts.js"></script>

</body>

</html>