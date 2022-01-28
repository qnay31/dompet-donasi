<?php
error_reporting(0);
require '../function.php';
$loop_campaign      = mysqli_query($conn, "SELECT * FROM campaign WHERE status = 'Berlangsung' ORDER BY `id` DESC ");

$loop_campaign_hp   = mysqli_query($conn, "SELECT * FROM campaign WHERE status = 'Berlangsung' ORDER BY `id` DESC ");
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
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

        <section id="blog" class="padd-sectio">

            <div class="container all-campaign" data-aos="fade-up">
                <header class="section-header">
                    <h3>Semua Campaign</h3>
                    <p>Membantu sesama bukanlah pilihan melainkan kewajiban</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <?php
                    $no = 1;
                    while ($r = $loop_campaign->fetch_assoc()) {
                    $terkumpul      = $r["terkumpul"];
                    $new_terkumpul  = (int) $terkumpul;

                    $target     = $r["target"];
                    $new_target = (int) $target;

                    $persen  = round($new_terkumpul/$new_target * 100,2);

                    $dateawal = date("Y-m-d");
                    $dateakhir = $r["berakhir"];

                    $awal = new DateTime($dateakhir);
                    $akhir = new DateTime($dateawal);

                    // die(var_dump($target));


                    $sisa = $akhir->diff($awal);
                    
                    ?>
                    <div class="col-md-4 col-lg-4 campaign-desktop mb-4">
                        <a href="../<?= $r["link"] ?>.php">
                            <div class="block-blog text-left">
                                <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $r["foto"] ?>"
                                    alt="img">
                                <div class="content-blog">
                                    <h4><?= ucwords($r["judul"]) ?></h4>
                                    <h5><?= ucwords($r["nama"]) ?> <i class="bi bi-check-circle-fill text-success"></i>
                                    </h5>
                                    <hr>
                                    <span class="card-info">Sisa Waktu</span>
                                    <span class="float-end readmore card-info">Terkumpul</span><br>
                                    <?php if ($r["nama"] == "dompet yatim") { ?>
                                    <span class="fw-bold"><i class="fas fa-infinity"></i> Hari</span>
                                    <?php } else { ?>
                                    <span class="fw-bold">
                                        <?php if ($dateakhir < date("Y-m-d")) { ?>
                                        <b>Telah Berakhir</b>
                                        <?php } else { ?>
                                        <b><?= $sisa->days ?></b> Hari
                                        <?php } ?>
                                    </span>
                                    <?php } ?>
                                    <span class="float-end readmore fw-bold">Rp.
                                        <?= number_format($terkumpul, 0, ".", ".") ?></span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>

                    <div class="campaign-hp">
                        <?php
                        $no = 1;
                        while ($r = $loop_campaign_hp->fetch_assoc()) {
                        $terkumpul      = $r["terkumpul"];
                        $new_terkumpul  = (int) $terkumpul;

                        $target     = $r["target"];
                        $new_target = (int) $target;

                        $persen  = round($new_terkumpul/$new_target * 100,2);

                        $dateawal = date("Y-m-d");
                        $dateakhir = $r["berakhir"];

                        $awal = new DateTime($dateakhir);
                        $akhir = new DateTime($dateawal);

                        // die(var_dump($target));


                        $sisa = $akhir->diff($awal);
                        
                        ?>
                        <a href="../<?= $r["link"] ?>.php">
                            <div class="block-blog text-left">
                                <div class="row">
                                    <div class="col-6">
                                        <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $r["foto"] ?>"
                                            alt="img">
                                    </div>
                                    <div class="col-6">
                                        <div class="content-blog">
                                            <h4><?= ucwords($r["judul"]) ?></h4>
                                            <h5><?= ucwords($r["nama"]) ?> <i
                                                    class="bi bi-check-circle-fill text-success"></i>
                                            </h5>
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar"
                                                    style="width: <?= $persen ?>%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                            <span class="card-info">Sisa Waktu</span>
                                            <span class="float-end readmore card-info">Terkumpul</span><br>
                                            <?php if ($r["nama"] == "dompet yatim") { ?>
                                            <span class="fw-bold card-keterangan"><i class="fas fa-infinity"></i>
                                                Hari</span>
                                            <?php } else { ?>
                                            <span class="fw-bold card-keterangan">
                                                <?php if ($dateakhir < date("Y-m-d")) { ?>
                                                <b>Telah Berakhir</b>
                                                <?php } else { ?>
                                                <b><?= $sisa->days ?></b> Hari
                                                <?php } ?>
                                            </span>
                                            <?php } ?>
                                            <span class="float-end readmore fw-bold card-keterangan">Rp.
                                                <?= number_format($terkumpul, 0, ".", ".") ?></span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include '../badan/footer.php'; ?>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <!-- end script -->
</body>

</html>