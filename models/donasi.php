<?php
error_reporting(0);

require '../function.php';

$link_donasi  = basename($_SERVER['PHP_SELF']);
$id           = substr($link_donasi, 0, -4);

// detail campaign desktop dan hp
$query  = mysqli_query($conn, "SELECT * FROM campaign WHERE link= '$id'");
$data   = mysqli_fetch_assoc($query);

$judul      = $data["judul"];
$link       = $data["link"];
$nama       = $data["nama"];
$foto       = $data["foto"];
$berakhir   = $data["berakhir"];


if (isset($_POST["bayar_bri"]) ) {
    if(donasi_bri($_POST) > 0 ) {
        echo "<script>
                alert('Harap segera transfer');
                document.location.href = '../payment/proses-donasi.php';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["bayar_bni"]) ) {
    if(donasi_bni($_POST) > 0 ) {
        echo "<script>
                alert('Harap segera transfer');
                document.location.href = '../payment/proses-donasi.php';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["bayar_qris"]) ) {
    if(donasi_qris($_POST) > 0 ) {
        echo "<script>
                alert('Harap segera transfer');
                document.location.href = '../payment/proses-donasi.php';
            </script>";
            
    } 
        else {
        echo mysqli_error($conn);
    }


}

if (isset($_POST["input"]) ) {
    if(donasi_va($_POST) > 0 ) {
        echo "<script>
                alert('Harap segera transfer');
                document.location.href = '../payment/proses-donasi.php';
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
</head>

<body>

    <!-- ======= navbar ======= -->
    <?php include '../badan/navbar.php'; ?>
    <!-- End navbar -->

    <main id="main">
        <div class="donasi-detail">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5">
                        <p class="isi-form">Isi form donasi dibawah ini</p>
                        <div class="box-white">
                            <div class="row">
                                <div class="col-3">
                                    <div class="image-donasi">
                                        <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $foto ?>"
                                            alt="" style="width: 5em;">
                                    </div>
                                </div>

                                <div class="col-9">
                                    <div class="detail-pembayaran">
                                        <div class="text-left">
                                            <?php if ($id == "zakat") { ?>
                                            <span>kamu berzakat untuk</span>
                                            <?php } else { ?>
                                            <span>kamu berdonasi untuk</span>
                                            <?php } ?>
                                        </div>
                                        <div class="text-left">
                                            <span><strong><?= ucwords($judul) ?></strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="box-white">
                            <div id="form">
                                <form action="" method="post" onsubmit="return validasi_donasi(this)" class="user"
                                    autocomplete="off" name="donasi_form">
                                    <div class="input-field nama_user">
                                        <input type="hidden" name="link" value="<?= $link ?>">
                                        <input type="hidden" name="jenis" value="<?= $judul ?>">
                                        <input type="text" id="name" name="nama" required
                                            oninvalid="this.setCustomValidity('Masukkan Nama Anda')"
                                            oninput="setCustomValidity('')" style="text-transform: capitalize;" />
                                        <label for="name">Nama Lengkap:</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="anonim" name="nama_lain"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Anonim
                                        </label>
                                    </div>

                                    <div class="input-field hp_user">
                                        <input type="text" id="hp" name="hp" required
                                            oninvalid="this.setCustomValidity('Masukkan No HP Anda')"
                                            oninput="setCustomValidity('')" maxlength="13" />
                                        <label for="hp">Nomor Ponsel:</label>
                                    </div>

                                    <div class="input-field">
                                        <input type="text" id="donasi" name="donasi"
                                            onkeypress="return hanyaAngka(event)" required
                                            oninvalid="this.setCustomValidity('Masukkan Donasi Anda')"
                                            oninput="setCustomValidity('')" maxlength="11" />
                                        <label for="donasi">Isi Nominal Donasi:</label>
                                    </div>

                                    <div class="form-floating">
                                        <textarea class="form-control" name="deskripsi" placeholder="Pesan Atau Do'a"
                                            id="floatingTextarea" style="height: 100px" onKeyUp='Hitung()'
                                            maxlength="256"></textarea>
                                        <label for="floatingTextarea">Pesan Atau Do'a</label>
                                    </div>

                                    <?php if ($id == "zakat") { ?>
                                    <div class="doa-zakat mt-4">
                                        <span><b>Niat Mengeluarkan Zakat</b></span> <br>
                                        <span class="text-arab">
                                            نَوَيْتُ أَنْ أُخْرِجَ زَكَاةَ مَالِى فَرْضًا لِلَّهِ تَعَالَى
                                        </span>
                                        <br>
                                        <span class="latin">
                                            Nawaitu an Ukhrija Zakaata Maali Fardhon Lillaahi Ta’aala
                                        </span>
                                        <br>
                                        <span class="arti-niat">
                                            Artinya: "Saya berniat sengaja mengeluarkan zakat fardhu karena Allah
                                            Ta'ala"
                                        </span>
                                    </div>
                                    <?php } else { ?>
                                    <?php } ?>

                                    <div class="button-payment mt-4">
                                        <label for="">Metode Pembayaran</label>
                                        <div class="accordion accordion-flush" id="accordionFlushExample">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                        aria-expanded="false" aria-controls="flush-collapseOne">
                                                        Transfer Bank (<b>Verifikasi Manual</b>)
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingOne"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <?php if ($nama == "dompet yatim") { ?>
                                                    <div class="accordion-body">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bni"
                                                                class="btn btn-donasi w-100 newbutton"
                                                                value="Transfer BNI">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bri"
                                                                class="btn btn-donasi w-100 newbutton2"
                                                                value="Transfer BRI">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_qris"
                                                                class="btn btn-donasi w-100 newbutton3"
                                                                value="Scan Barcode">
                                                        </div>
                                                    </div>
                                                    <?php } elseif ($berakhir < date("Y-m-d")) { ?>
                                                    <div class="accordion-body btn-disable">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bni"
                                                                class="btn btn-donasi w-100 newbutton disabled"
                                                                value="Transfer BNI">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bri"
                                                                class="btn btn-donasi w-100 newbutton2 disabled"
                                                                value="Transfer BRI">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_qris"
                                                                class="btn btn-donasi w-100 newbutton3 disabled"
                                                                value="Scan Barcode">
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="accordion-body">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bni"
                                                                class="btn btn-donasi w-100 newbutton"
                                                                value="Transfer BNI">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_bri"
                                                                class="btn btn-donasi w-100 newbutton2"
                                                                value="Transfer BRI">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="bayar_qris"
                                                                class="btn btn-donasi w-100 newbutton3"
                                                                value="Scan Barcode">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="flush-headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Virtual Account (<b>Verifikasi Otomatis</b>)
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="flush-headingTwo"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <?php if ($nama == "dompet yatim") { ?>
                                                    <div class="accordion-body">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton"
                                                                value="BNI Virtual Account">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton2"
                                                                value="BRI Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton4"
                                                                value="Mandiri Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton5"
                                                                value="Permata Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton6" value="Gopay">
                                                        </div>
                                                    </div>
                                                    <?php } elseif ($berakhir < date("Y-m-d")) { ?>
                                                    <div class="accordion-body btn-disable">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton disabled"
                                                                value="BNI Virtual Account">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton2 disabled"
                                                                value="BRI Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton4 disabled"
                                                                value="Mandiri Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton5 disabled"
                                                                value="Permata Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton6 disabled"
                                                                value="Gopay">
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="accordion-body">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton"
                                                                value="BNI Virtual Account">
                                                        </div>
                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton2"
                                                                value="BRI Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton4"
                                                                value="Mandiri Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton5"
                                                                value="Permata Virtual Account">
                                                        </div>

                                                        <hr class="border-donasi">
                                                        <div class="button">
                                                            <input type="submit" name="input"
                                                                class="btn btn-donasi w-100 newbutton6" value="Gopay">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
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
</body>

</html>