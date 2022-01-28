<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;
// error_reporting(0);

require_once dirname(__FILE__) . '/../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-9Qi8D78Jzz4kQ2SOwWyxthvF';
Config::$clientKey = 'SB-Mid-client-4Dx3PeORIjHfiYgf';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";
    
    // Required
    
require '../function.php';
$key    = $_GET['id_key'];
$link   = $_GET['id_unik'];

$query  = mysqli_query($conn, "SELECT*FROM donasi WHERE id = '$key' AND kode_unik = '$link' ");
$data   = mysqli_fetch_assoc($query);
$data_d = $data["jumlah_donasi"];
$nama_donatur = $data["nama_donatur"];
$no_hp = $data["no_hp"];
$donasi = $data["donasi"];
$kode   = $data["kode_unik"];
$unik   = sprintf('%03d',$kode);

$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $data_d, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'a1',
    'price' => $donasi,
    'quantity' => 1,
    'name' => "Donasi Kamu"
);


// Optional
$item_details = array ($item1_details);

// Optional
$customer_details = array(
    'first_name'    => $nama_donatur,
    'last_name'     => "",
    'phone'         => $no_hp
);

// Optional, remove this to display all available payment methods
$enable_payments = array('alfamart', 'gopay', 'indomaret', 'shopeepay', 'bri_va', 'bni_va', 'bca_va', 'permata_va', 'other_va');

// Fill transaction details
$transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}

echo "snapToken = ".$snap_token;

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-9Qi8D78Jzz4kQ2SOwWyxthvF\';');
        die();
    } 
}

    if (isset($_POST["bayar_bri"]) ) {
        $link = $_GET['id_key'];
        $key_link = $_GET['id_unik'];
        if(donasi_bri($_POST) > 0 ) {
            echo "<script>
                    alert('Harap segera transfer');
                    document.location.href = 'proses-donasi.php?key=$link&link=$key_link';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }


    }

    if (isset($_POST["bayar_bni"]) ) {
        $link = $_GET['id_key'];
        $key_link = $_GET['id_unik'];
        if(donasi_bni($_POST) > 0 ) {
            echo "<script>
                    alert('Harap segera transfer');
                    document.location.href = 'proses-donasi.php?key=$link&link=$key_link';
                </script>";
                
        } 
            else {
            echo mysqli_error($conn);
        }


    }
    
    

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bayar Sekarang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo/logo_favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/responsive.css">

    <!-- =======================================================
  * Template Name: BizPage - v5.5.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>
    <main id="main">
        <div class="donasi-detail">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="box-white">
                            <div id="form">
                                <div class="pembayaran" style="text-align:center; margin-bottom:10px;">
                                    <label>Metode Pembayaran</label>
                                </div>
                                <form action="" method="post" class="process-payment">
                                    <div class="select mb-2">
                                        <label for=""><strong>Pengecekan Manual</strong></label>
                                    </div>
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                    aria-expanded="false" aria-controls="collapseOne">
                                                    <div class="bank-image">
                                                        <img src="../assets/img/bank/bri.png" alt=""><span
                                                            class="bank">Bank BRI</span>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="collapseOne" class="accordion-collapse collapse"
                                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="button-payment">
                                                        <input type="hidden" name="bank" value="BRI">
                                                        <input type="hidden" name="key" value="<?= $link ?>">
                                                        <input type="submit" name="bayar_bri" value="Bayar Sekarang"
                                                            class="btn btn-success">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                    aria-expanded="false" aria-controls="collapseTwo">
                                                    <div class="bank-image">
                                                        <img src="../assets/img/bank/bni.png" alt=""><span
                                                            class="bank">Bank BNI</span>
                                                    </div>
                                                </button>
                                            </h2>
                                            <div id="collapseTwo" class="accordion-collapse collapse"
                                                aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                <div class="accordion-body">
                                                    <div class="button-payment">
                                                        <input type="hidden" name="bank2" value="BNI">
                                                        <input type="hidden" name="key" value="<?= $link ?>">
                                                        <input type="submit" name="bayar_bni" value="Bayar Sekarang"
                                                            class="btn btn-success newbutton">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" name="token" value="<?= $snap_token ?>">
                                    <hr>
                                    <div class="select mb-2">
                                        <label for=""><strong>Pengecekan Otomatis</strong></label>
                                    </div>
                                    <div class="button-payment">
                                        <a class="btn btn-success w-100" id="pay-button">Bayar Sekarang</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/custom.js"></script>
    <!-- end script -->

    <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>">
    </script>

    <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('<?= $snap_token?>');
    };
    </script>
</body>

</html>