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
$snap_token = '';
try {
    $snap_token = $_SESSION["token"];
}
catch (\Exception $e) {
    echo $e->getMessage();
}



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

require '../function.php';
$query = mysqli_query($conn, "SELECT * FROM token_donasi WHERE snap_token = '$_SESSION[token]'");
$data = mysqli_fetch_assoc($query);
$id = $data['id_donasi'];

$query2 = mysqli_query($conn, "SELECT*FROM donasi WHERE id = '$_SESSION[id]'");
$data2 = mysqli_fetch_assoc($query2);
$via = $data2["via"];
$status = $data2["status"];

// die(var_dump($status));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dompet Donasi - Berbagi Kebaikan Berkah Melimpah</title>
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

    <!-- ======= navbar ======= -->
    <?php include '../badan/navbar.php'; ?>
    <!-- End navbar -->

    <main id="main">
        <div class="donasi-status">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <div class="box-white">
                            <div class="klik-sukses" style="pointer-events: none;">
                                <button class="btn btn-success w-100">Terima Kasih Telah Berdonasi</button>
                            </div>
                            <?php if ($via == 'BRI Virtual Account') { ?>
                            <div class="button-payment mt-4">
                                <a class="btn btn-danger w-100" id="pay-button">Cek Donasi</a>
                            </div>
                            <?php } elseif ($via == 'BNI Virtual Account') { ?>
                            <div class="button-payment mt-4">
                                <a class="btn btn-danger w-100" id="pay-button">Cek Donasi</a>
                            </div>
                            <?php } elseif ($via == 'Mandiri Virtual Account') { ?>
                            <div class="button-payment mt-4">
                                <a class="btn btn-danger w-100" id="pay-button">Cek Donasi</a>
                            </div>
                            <?php } elseif ($via == 'Permata Virtual Account') { ?>
                            <div class="button-payment mt-4">
                                <a class="btn btn-danger w-100" id="pay-button">Cek Donasi</a>
                            </div>
                            <?php } elseif ($via == 'Gopay') { ?>
                            <div class="button-payment mt-4">
                                <a class="btn btn-danger w-100" id="pay-button">Cek Donasi</a>
                            </div>
                            <?php } else { ?>
                            <div class="button-payment mt-4">
                                <input type="button" name="view" value="Cek Status" data-id="<?= $_SESSION['id']  ?>"
                                    class="btn btn-danger btn-xs view_status">
                            </div>
                            <!-- Modal -->
                            <div id="dataModal_status" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Status Donasi</h4>
                                        </div>
                                        <div class="modal-body" id="detail_status">
                                        </div>
                                        <div class="modal-footer">
                                            <?php if ($status == "Terkonfirmasi") { ?>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK
                                            </button>
                                            <?php } else { ?>
                                            <a class="btn btn-success"
                                                href="proses-donasi.php?id_donasi=<?= $_SESSION['id']  ?>">Donasi
                                                Sekarang</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>

                        <div class=" box-white">
                            <div class="box-alert">
                                <small class="sub-alert">
                                    Jika status donasi masih <b>Pending</b> dalam 1x24 jam, ada
                                    2
                                    kemungkinan :
                                    <br><br>
                                    <ol>
                                        <li>Anda belum melakukan transfer</li>
                                        <li>Anda sudah transfer, namun:
                                            <ul>
                                                <li>Nominal transfer tidak sesuai dengan tagihan
                                                    sistem
                                                    (contoh: tidak
                                                    menyertakan kode
                                                    unik atau kode unik tidak sesuai)</li>
                                                <li>Nominal telah sesuai, namun transfer di luar jam
                                                    kerja bank</li>
                                                <li>Sedang terjadi kesalahan pada sistem kami /
                                                    sistem
                                                    bank</li>
                                            </ul>
                                        </li>
                                    </ol>
                                    Silakan hubungi CS kami jika poin ke-2 berlaku untuk donasi Anda
                                </small>

                                <div class="hubungi">
                                    <a class="btn btn-success" href="https://wa.wizard.id/1f91b9"
                                        target="blank_">WhatsApp Kami</a>
                                </div>

                            </div>
                        </div>

                        <div class="home">
                            <a class="btn btn-primary w-100" href="http://localhost/new_dompet/">Beranda</a>
                        </div>

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

    <script>
    $(document).ready(function() {
        // modal laporan program
        $('.view_status').click(function() {
            var data_id = $(this).data("id")
            $.ajax({
                url: "status_donasi.php",
                method: "POST",
                data: {
                    data_id: data_id
                },
                success: function(data) {
                    $("#detail_status").html(data)
                    $("#dataModal_status").modal('show')
                }
            })
        })
    });
    </script>
</body>

</html>