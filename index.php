<?php
error_reporting(0);
require 'function.php';

$q = mysqli_query($conn, "SELECT * FROM campaign WHERE status = 'Berlangsung' ");
$s = $q->num_rows;

$i = 1;
    $sql = $q;
    while($r = mysqli_fetch_array($sql))
    {
        
        $terkumpul = $r['terkumpul'];
        $i++;
        $total_terkumpul[$i] = $terkumpul;

        $hasil_terkumpul = array_sum($total_terkumpul);

        // die(var_dump($hasil_terpakai));
    }
    
    require 'hitcounter.php';

    $hit = new HitCounter();
    //cek dan simpan
    $hit->Hitung();  
    $visitor    = $hit->tampil();
    // die(var_dump($visitor));

    //tampilkan history jika ada
    $h         = date("Y-m-d");
    $convert   = convertDateDBtoIndo($h);
    $bulan     = substr($convert, 3, -5);

    $update = mysqli_query($conn, "UPDATE `data_dompet` SET 
            `visitor`     ='$visitor'
            WHERE bulan   = '$bulan' "); 

    // die(var_dump($h));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dompet Donasi - Berbagi Kebaikan Berkah Melimpah</title>
    <meta name="facebook-domain-verification" content="4r929jcmxoj8q1eet9odbn1saj1nqm" />
    <meta name="google-site-verification" content="SiyXkdUhiPqO1nUd0-828FKL_nQAygEy6e4l2t2kmIY" />
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- share Fb -->
    <meta property="og:url" content="https://dompetdonasi.com/" />
    <meta property="og:type" content="Dompet Yatim - Website Crowdfunding" />
    <meta property="og:title" content="Dompet Yatim - Berbagi Kebaikan Berkah Melimpah" />
    <meta property="og:description"
        content='Yayasan Crowdfunding dimana orang orang dapat membuat penggalangan dana dan memberikan bantuan secara transparansi sehingga dapat memberikan senyumanan terhadap semua orang.'>
    <meta property="og:image" content='https://dompetdonasi.com/assets/img/logo/cover.jpg' />
    <meta property="og:image:type" content="image/jpg">

    <!-- Size of image. Any size up to 300. Anything above 300px will not work in WhatsApp -->
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">

    <!-- Favicons -->
    <link href="assets/img/logo/logo_favicon.png" rel="icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- =======================================================
  * Template Name: BizPage - v5.5.0
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

    <!-- ======= navbar ======= -->
    <header id="header" class="fixed-top d-flex align-items-center header-transparent">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <h1 class="logo"><img src="assets/img/logo/logo-white.png" alt=""> <a href="">Dompet Yatim</a>
                    </h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto active" href="#hero">Home</a>
                            </li>
                            <li><a class="nav-link scrollto" href="#blog">Campaign</a></li>
                            <li><a class="nav-link scrollto" href="#get-started">Layanan</a>
                            </li>
                            <!-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li> -->
                            <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->

                            <li><a class="nav-link scrollto" href="#call-to-action">Kontak</a>
                            </li>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>

        </div>
    </header>
    <!-- End navbar -->

    <!-- ======= hero coruosel ======= -->
    <?php include 'badan/corousel.php'; ?>
    <!-- End Hero coruosel -->

    <main id="main">

        <!-- ======= Counter Section ======= -->
        <?php include 'badan/counter.php'; ?>
        <!-- End Counter Section -->

        <!-- ======= Campaign Section ======= -->
        <?php include 'badan/campaign.php'; ?>
        <!-- End Campaign Section -->

        <!-- ======= Layanan Section ======= -->
        <?php include 'badan/layanan.php'; ?>
        <!-- End Layanan Section -->

        <!-- ======= panggilan Action Section ======= -->
        <?php include 'badan/panggilan.php'; ?>
        <!-- End panggilan Action Section -->

        <!-- ======= kategori Section ======= -->
        <!-- End kategori Section -->

        <!-- ======= Investor Section ======= -->
        <!-- End Investor Section -->

        <!-- ======= Testimonials Section ======= -->
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <!-- End Team Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'badan/footer.php'; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <?php include 'badan/preloader.php'; ?>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- end script -->
</body>

</html>