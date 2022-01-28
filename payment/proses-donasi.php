<?php

// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
    // https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview
    
namespace Midtrans;
error_reporting(0);
session_start();

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
$id_donasi = $_GET["id_donasi"];
require '../function.php';

if ($id_donasi == '') {
    $query  = mysqli_query($conn, "SELECT * FROM donasi ORDER BY id DESC LIMIT 1");
} else {
    $query  = mysqli_query($conn, "SELECT * FROM donasi WHERE id = '$id_donasi'");
}
$data   = mysqli_fetch_assoc($query);
$jenis    = $data["jenis"];
$bantu = ucwords($jenis);
$via    = $data["via"];
$data_d = $data["jumlah_donasi"];
$nama_donatur = $data["nama_donatur"];
$no_hp = $data["no_hp"];
$donasi = substr($data_d, 0, -3);
$data_d2 = $data["donasi"];
$hasil  = ($donasi);
$kode   = $data["kode_unik"];
$unik   = sprintf('%03d',$kode);
$jam    = $data["berakhir"];

$tgl    = date("Y-m-d", strtotime($jam));
$convert   = convertDateDBtoIndo($tgl);
$waktu  = date("H:i:s", strtotime($jam));

$kueri = mysqli_query($conn, "SELECT bank.nama_rek, bank.no_rek
FROM bank
JOIN donasi ON donasi.via = bank.bank WHERE bank.bank = '$via' ");

$has_kueri = mysqli_fetch_array($kueri);

$nama_rek   = $has_kueri["nama_rek"];
$no_rek     = $has_kueri["no_rek"];

$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $data_d2, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
    'id' => 'donatur_'.rand(),
    'price' => $data_d2,
    'quantity' => 1,
    'name' => "Donasi Untuk ".$bantu
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

// echo "snapToken = ".$snap_token;
$query2 = mysqli_query($conn, "SELECT * FROM token_donasi WHERE id_donasi = '$data[id]'");

$s = $query2->num_rows;
// die(var_dump($s));

if ($via == "BRI") {
} elseif ($via == "BNI") {
} elseif ($via == "Qris") {
} else {
    if ($s == 1) {
        $update = mysqli_query($conn, "UPDATE `token_donasi` SET 
                `snap_token`  ='$snap_token' 
                WHERE id_donasi = $data[id]"); 
    } else {
        $tambah = mysqli_query ($conn, "INSERT INTO token_donasi VALUES('', '$data[id]', '$snap_token') ");
    }
}

$query3 = mysqli_query($conn, "SELECT * FROM token_donasi WHERE id_donasi = '$data[id]'");
$data_token = \mysqli_fetch_assoc($query3);
$_SESSION["token"] = $data_token["snap_token"];
$_SESSION["id"] = $data[id];

// die(var_dump($_SESSION["token"]));

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

// die(var_dump($nama_rek));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Donasi Sekarang</title>
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
    <link href="../assets/css/style.css?version=<?= filemtime('../assets/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet"
        href="../assets/css/responsive.css?version=<?= filemtime('../assets/css/responsive.css'); ?>">

    <!-- =======================================================
  * Template Name: BizPage - v5.5.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
    .form-control:disabled,
    .form-control[readonly],
    .input-group-text {
        background-color: transparent;
        font-weight: bold;
        text-align: center
    }

    .form-control {
        border: none;
        border-bottom: solid black 1.7px;
    }

    .input-group-text {
        border: none;
    }

    readonly:focus,
    readonly:valid {
        border-color: transparent;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem transparent;
    }

    .norek {
        display: flex;
        justify-content: center;
    }
    </style>
</head>

<body>

    <!-- ======= navbar ======= -->
    <?php include '../badan/navbar.php'; ?>
    <!-- End navbar -->

    <main id="main">
        <div class="donasi-proses">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="box-white">
                            <div class="panduan">
                                <span><strong>Panduan Pembayaran</strong></span>
                            </div>

                            <?php if ($via == 'BRI Virtual Account') { ?>
                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="image-bank">
                                <img src="../assets/img/bank/bri.png" alt="">
                            </div>

                            <div class="donasi">

                                <span><strong>Rp.<?= number_format($data_d2,0,"." , ".") ?></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon segera lakukan
                                    donasi sahabat baik</span>
                                </div>
                            </div>

                            <div class="button-payment">
                                <a class="btn btn-success w-100" id="pay-button">Donasi Sekarang</a>
                            </div>

                            <?php } elseif ($via == 'BNI Virtual Account') { ?>
                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="image-bank">
                                <img src="../assets/img/bank/bni.png" alt="">
                            </div>

                            <div class="donasi">

                                <span><strong>Rp.<?= number_format($data_d2,0,"." , ".") ?></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon segera lakukan
                                    donasi sahabat baik</span>
                                </div>
                            </div>

                            <div class="button-payment">
                                <a class="btn btn-success w-100" id="pay-button">Donasi Sekarang</a>
                            </div>
                            <?php } elseif ($via == 'Mandiri Virtual Account') { ?>
                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="image-bank">
                                <img src="../assets/img/bank/mandiri.png" alt="">
                            </div>

                            <div class="donasi">

                                <span><strong>Rp.<?= number_format($data_d2,0,"." , ".") ?></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon segera lakukan
                                    donasi sahabat baik</span>
                                </div>
                            </div>

                            <div class="button-payment">
                                <a class="btn btn-success w-100" id="pay-button">Donasi Sekarang</a>
                            </div>
                            <?php } elseif ($via == 'Permata Virtual Account') { ?>
                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="image-bank">
                                <img src="../assets/img/bank/Permata.png" alt="">
                            </div>

                            <div class="donasi">

                                <span><strong>Rp.<?= number_format($data_d2,0,"." , ".") ?></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon segera lakukan
                                    donasi sahabat baik</span>
                                </div>
                            </div>

                            <div class="button-payment">
                                <a class="btn btn-success w-100" id="pay-button">Donasi Sekarang</a>
                            </div>
                            <?php } elseif ($via == 'Gopay') { ?>
                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="image-bank">
                                <img src="../assets/img/bank/gopay.png" alt="">
                            </div>

                            <div class="donasi">

                                <span><strong>Rp.<?= number_format($data_d2,0,"." , ".") ?></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon segera lakukan
                                    donasi sahabat baik</span>
                                </div>
                            </div>

                            <div class="button-payment">
                                <a class="btn btn-success w-100" id="pay-button">Donasi Sekarang</a>
                            </div>
                            <?php } else { ?>

                            <div class="panduan-text">
                                <span>Silakan transfer TEPAT sesuai nominal berikut</span>
                            </div>

                            <div class="donasi">
                                <span><strong>Rp. <?= number_format($hasil, 0, ".", ".") ?>.<span
                                            class="text-danger"><?= $unik ?></span></strong></span>
                            </div>

                            <div class="box-warning">
                                <div class="penting" style="text-align: left;">
                                    <span class="text-danger"><strong>PENTING!</strong></span> Mohon transfer tepat
                                    hingga <span class="text-danger"><strong>3 angka
                                            terakhir </strong></span> <span> untuk mempercepat verifikasi donasi</span>
                                </div>
                            </div>

                            <table class="table keterangan">
                                <tr>
                                    <td style="text-align: left;" scope="col">Jumlah Donasi</td>
                                    <td style="text-align: right;" scope="col">Rp.
                                        <?= number_format($data_d, 0, ".", ".") ?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">Kode Unik<span class="text-danger">*</span></td>
                                    <td style="text-align: right;"><?= $unik ?></td>
                                </tr>
                            </table>

                            <div class="merah-donasi" style="text-align: left;">
                                <span class="text-danger">* akan dimasukan dalam donasi</span>
                            </div>
                            <?php } ?>
                        </div>

                        <?php if ($via == 'BRI Virtual Account') { ?>
                        <?php } elseif ($via == 'BNI Virtual Account') { ?>
                        <?php } elseif ($via == 'Mandiri Virtual Account') { ?>
                        <?php } elseif ($via == 'Permata Virtual Account') { ?>
                        <?php } elseif ($via == 'Gopay') { ?>
                        <?php } else { ?>
                        <div class="box-white">
                            <div class="transaksi">
                                <?php if ($via == "Qris") { ?>
                                <span>Scan barcode dibawah ini a/n <b>Dompet Yatim Piatu Amanah </b>
                                    :</span>
                                <?php } else { ?>
                                <span>Transfer ke rekening a/n <b><?= $nama_rek ?> </b> berikut ini :</span>
                                <?php } ?>
                            </div>

                            <div class="image-bank">
                                <?php if ($via == "BRI") { ?>
                                <img src="../assets/img/bank/bri.png" alt="">
                                <?php } elseif($via == "BNI") { ?>
                                <img src="../assets/img/bank/bni.png" alt="">
                                <?php } else { ?>
                                <div class="img-support" style="text-align: right;">
                                    <img src="../assets/img/bank/iconQris.png" alt="" srcset="" style="width: 10em">
                                </div>
                                <img src="../assets/img/bank/barcode.jpg" alt=""
                                    style="width: 20em; padding-top: 0% !important;">
                                <?php } ?>
                            </div>

                            <?php if ($via == "Qris") { ?>
                            <?php } else { ?>
                            <div class="norek">
                                <div class="input-group">
                                    <input type="text" class="form-control font-weight-bold" value="<?= $no_rek ?>"
                                        id="copyText" readonly>
                                    <span class="input-group-text" id="basic-addon1"><button id="copyBtn"><i
                                                class="bi bi-clipboard"></i></button></span>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="periode">
                                <span>Segera lakukan pembayaran sebelum
                                </span><br>
                                <span><b><?= $convert; ?> Pukul <?= $waktu; ?> WIB</b></span>
                            </div>

                        </div>
                        <?php } ?>

                        <?php if ($via == 'BRI Virtual Account') { ?>
                        <?php } elseif ($via == 'BNI Virtual Account') { ?>
                        <?php } elseif ($via == 'Mandiri Virtual Account') { ?>
                        <?php } elseif ($via == 'Permata Virtual Account') { ?>
                        <?php } elseif ($via == 'Gopay') { ?>
                        <?php } else { ?>
                        <div class="box-white">
                            <div class="konfirmasi">
                                <span>Sudah melakukan pembayaran? Klik :</span>
                            </div>
                            <div class="btn-konfirmasi">
                                <a class="btn btn-success" href="status-konfirmasi.php">Konfimasi Donasi</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include '../badan/footer.php'; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/jquery-3.4.1.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
    const copyBtn = document.getElementById('copyBtn')
    const copyText = document.getElementById('copyText')

    copyBtn.onclick = () => {
        copyText.select(); // Selects the text inside the input
        document.execCommand('copy'); // Simply copies the selected text to clipboard 
        Swal.fire({ //displays a pop up with sweetalert
            icon: 'success',
            title: 'Text copied to clipboard',
            showConfirmButton: false,
            timer: 1000
        });
    }
    </script>
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