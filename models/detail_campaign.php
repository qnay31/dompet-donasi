<?php
error_reporting(0);

require 'function.php';

$link_donasi  = basename($_SERVER['PHP_SELF']);
$id           = substr($link_donasi, 0, -4);

// detail campaign desktop dan hp
$query  = mysqli_query($conn, "SELECT * FROM campaign WHERE link= '$id'");
$data   = mysqli_fetch_assoc($query);


$nama       = $data["nama"];
$judul      = $data["judul"];
$link       = $data["link"];
$terkumpul  = $data["terkumpul"];
$target     = $data["target"];
$foto       = $data["foto"];
$deskripsi  = $data["deskripsi"];
$ajakan     = $data["ajakan"];



$dateawal   = date("Y-m-d");
$dateakhir  = $data["berakhir"];

$awal       = new DateTime($dateakhir);
$akhir      = new DateTime($dateawal);

// die(var_dump($dateawal));


$sisa       = $akhir->diff($awal);

// die(var_dump($sisa->days));

$harga1     = $data["terkumpul"];
$harga1     = (int) $harga1;


$harga      = $data["target"];
$harga      = str_replace(".","",$harga);
$harga      = (int) $harga;

$Tdonasi    = $harga;
$persen     = round($harga1/$Tdonasi * 100,2);

$query_donatur  = mysqli_query($conn, "SELECT * FROM donasi WHERE link = '$id' AND status = 'Terkonfirmasi'  ORDER BY `dibuat` DESC ");
$sum_doantur    = $query_donatur->num_rows;

$query_donatur_hp  = mysqli_query($conn, "SELECT * FROM donasi WHERE link = '$id' AND status = 'Terkonfirmasi'  ORDER BY `dibuat` DESC ");

// info terbaru
$q  = mysqli_query($conn, "SELECT * FROM update_campaign WHERE link = '$id' ORDER BY `tanggal` DESC");
$s  = $q->num_rows;

$q_hp  = mysqli_query($conn, "SELECT * FROM update_campaign WHERE link = '$id' ORDER BY `tanggal` DESC");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dompet Donasi - <?= ucwords($judul) ?></title>
    <meta content="" name="description">
    <meta content="<?= $judul ?>" name="keywords">

    <!-- share Fb -->
    <meta property="og:url" content="https://dompetdonasi.com/<?= $data["link"]; ?>" />
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="Dompet Donasi - <?= $data["judul"]; ?>" />
    <meta property="og:description" content='<?= htmlspecialchars_decode($deskripsi); ?>'>
    <meta property="og:image" content='http://localhost/admin_dompet/assets/images/cover-campaign/<?= $foto; ?>' />
    <meta property="og:image:type" content="image/jpg">

    <meta property="og:image:width" content="300" />


    <!-- Favicons -->
    <link href="assets/img/logo/logo_favicon.png" rel="icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css?version=<?= filemtime('assets/css/style.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/responsive.css?version=<?= filemtime('assets/css/responsive.css'); ?>">
</head>

<body>

    <!--share fb-->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v12.0"
        nonce="sHqOzvAT"></script>

    <!-- ======= navbar ======= -->
    <?php include 'badan/navbar.php'; ?>
    <!-- End navbar -->

    <main id="main">
        <div class="card-detail-content detail-campaign">
            <div class="container">
                <div class="wrapper">
                    <div class="main">
                        <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $foto ?>" alt=""
                            srcset="">

                        <div class="berita">
                            <ul class="nav nav-pills mb-3" id="top-bar" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                        aria-selected="true">Detail</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Info Terbaru</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Donatur
                                        <?php if ($sum_doantur == 0) {?>
                                        <?php } else { ?>
                                        <span class="badge text-white bg-danger"><?= $sum_doantur ?></span>
                                        <?php } ?>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="top-barContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <?= htmlspecialchars_decode($deskripsi) ?>
                                    <?= htmlspecialchars_decode($ajakan) ?>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                    aria-labelledby="pills-profile-tab">
                                    <div class="update-terbaru">
                                        <?php if ($s == 0) { ?>
                                        Belum Ada Info Terbaru
                                        <?php } else { ?>

                                        <?php
                                            $no = 1;
                                            while ($r = $q->fetch_assoc()) {
                                            ?>
                                        <div class="box-update mb-2">
                                            <span class="judul_update"><b><?= ucwords($r["judul_update"]) ?></b></span>
                                            <p class="tgl_update"><?= date("d-m-Y", strtotime($r["tanggal"])) ?></p>
                                            <?= htmlspecialchars_decode(ucfirst($r["update_cerita"])) ?>
                                        </div>
                                        <?php } ?>

                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="donatur" id="donatur">
                                        <div class="list-wrapper">
                                            <?php
                                            $no = 1;
                                            while ($r = $query_donatur->fetch_assoc()) {
                                            $inisial = inisial($r["nama_tampil"]);
                                            $ins_dn  = substr($inisial,0,2);
                                            $tanggal = $r["dibuat"];
                                            $tgl    = date("d-m-Y", strtotime($tanggal));

                                            ?>
                                            <div class="list-item">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="user-avatar">
                                                            <div class="circle-avatar">
                                                                <?php if ($r["nama_tampil"] == "anonim") { ?>
                                                                <span class="inisial"><i
                                                                        class="bi bi-person"></i></span>
                                                                <?php } else { ?>
                                                                <span class="inisial"><?= $ins_dn  ?></span>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="detail-nama-donatur">
                                                            <div class="nama-donatur mb-2">
                                                                <span><b><?= ucwords($r["nama_tampil"]) ?></b></span>
                                                            </div>
                                                            <div class="tgl-donasi">
                                                                <span><?= $tgl ?></span>
                                                            </div>
                                                            <div class="doa-dukungan">
                                                                <span><?= ucfirst($r["doa"]) ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="donasi-donatur">
                                                            <span class="donasi-jumlah"><b>Rp.
                                                                    <?= number_format($r["jumlah_donasi"], 0, ".", ".") ?></b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <?php if ($sum_doantur == 0) {?>
                                        <span>Belum Ada Donatur</span>
                                        <?php } else { ?>
                                        <div id="pagination-container"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar">
                        <h5 class="title"><b><?= ucwords($judul) ?></b></h5>
                        <p class="user"><?= ucwords($nama) ?> <i class="bi bi-check-circle-fill text-success"></i></p>
                        <span class="terkumpul">Rp. <?= number_format($terkumpul, 0, ".", ".") ?></span> <br>
                        <span class="target">terget dari <b>Rp.
                                <?= number_format($target, 0, ".", ".") ?></b></span>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="detail"><b><?= $persen ?>%</b> tercapai</span>
                        <?php if ($nama == "dompet yatim") { ?>
                        <span class="float-end readmore detail"><i class="fas fa-infinity"></i> Hari Lagi</span>
                        <?php } else { ?>
                        <span class="float-end readmore detail">
                            <?php if ($dateakhir < date("Y-m-d")) { ?>
                            <b>Telah Berakhir</b>
                            <?php } else { ?>
                            <b><?= $sisa->days ?></b> Hari Lagi
                            <?php } ?>
                        </span>
                        <?php } ?>

                        <?php if ($id == "zakat") { ?>
                        <div class="btn-donasi">
                            <?php if ($nama == "dompet yatim") { ?>
                            <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Zakat Sekarang</a>
                            <?php } ?>
                        </div>

                        <?php } else { ?>
                        <div class="btn-donasi">
                            <?php if ($nama == "dompet yatim") { ?>
                            <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Donasi Sekarang</a>
                            <?php } elseif ($dateakhir < date("Y-m-d")) { ?>
                            <div class="btn-disable">
                                <a class="btn btn-success w-100 disabled" href="donasi/<?= $link ?>.php">Campaign Telah
                                    Berakhir</a>
                            </div>
                            <?php } else { ?>
                            <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Donasi Sekarang</a>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="share">
                            <span class="share">Bantu Sebarkan Via</span>
                            <div class="btn-share fb-share-button"
                                data-href="https://dompetdonasi.com//<?= $link ?>.php" data-layout="box_count"
                                data-size="large">
                                <a target="_blank"
                                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdompetdonasi.com%2F/<?= $link ?>.php&amp;src=sdkpreparse"
                                    class="fb-xfbml-parse-ignore">Bagikan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-detail-hp detail-campaign">
            <div class="container">
                <div class="wrapper">
                    <div class="main">
                        <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $foto ?>" alt=""
                            srcset="" style="width: 100%;">
                        <div class="sidebar">
                            <h5 class="title"><b><?= ucwords($judul) ?></b></h5>
                            <p class="user"><?= ucwords($nama) ?> <i class="bi bi-check-circle-fill text-success"></i>
                            </p>
                            <span class="terkumpul">Rp. <?= number_format($terkumpul, 0, ".", ".") ?></span> <br>
                            <span class="target">terget dari <b>Rp.
                                    <?= number_format($target, 0, ".", ".") ?></b></span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="detail"><?= $persen ?>% tercapai</span>
                            <?php if ($nama == "dompet yatim") { ?>
                            <span class="float-end readmore detail"><i class="fas fa-infinity"></i> Hari Lagi</span>
                            <?php } else { ?>
                            <span class="float-end readmore detail">
                                <?php if ($dateakhir < date("Y-m-d")) { ?>
                                <b>Telah Berakhir</b>
                                <?php } else { ?>
                                <b><?= $sisa->days ?></b> Hari Lagi
                                <?php } ?>
                            </span>
                            <?php } ?>
                            <?php if ($id == "zakat") { ?>
                            <div class="btn-donasi">
                                <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Zakat Sekarang</a>
                            </div>
                            <?php } else { ?>
                            <div class="btn-donasi">
                                <?php if ($nama == "dompet yatim") { ?>
                                <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Donasi Sekarang</a>
                                <?php } elseif ($dateakhir < date("Y-m-d")) { ?>
                                <div class="btn-disable">
                                    <a class="btn btn-success w-100 disabled" href="donasi/<?= $link ?>.php">Campaign
                                        Telah
                                        Berakhir</a>
                                </div>
                                <?php } else { ?>
                                <a class="btn btn-success w-100" href="donasi/<?= $link ?>.php">Donasi Sekarang</a>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="share">
                                <span class="share">Bantu Sebarkan Via</span>
                                <div class="btn-share fb-share-button" data-href="https://dompetdonasi.com/zakat"
                                    data-layout="box_count" data-size="large">
                                    <a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdompetdonasi.com%2Fzakat&amp;src=sdkpreparse"
                                        class="fb-xfbml-parse-ignore">Bagikan
                                    </a>

                                </div>
                                <div class="btn-share">
                                    <a class="whatsapp-btn"
                                        href="whatsapp://send?text=https://www.dompetdonasi.com/<?= $link ?>"
                                        target="blank_">WhatsApp</a>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="berita">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-home-hp" type="button" role="tab"
                                            aria-controls="pills-home" aria-selected="true">Detail</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile-hp" type="button" role="tab"
                                            aria-controls="pills-profile" aria-selected="false">Info Terbaru</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-contact-hp" type="button" role="tab"
                                            aria-controls="pills-contact" aria-selected="false">Donatur
                                            <?php if ($sum_doantur == 0) {?>
                                            <?php } else { ?>
                                            <span class="badge text-white bg-danger"><?= $sum_doantur ?></span>
                                            <?php } ?>
                                        </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home-hp" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <?= htmlspecialchars_decode($deskripsi) ?>
                                        <?= htmlspecialchars_decode($ajakan) ?>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile-hp" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="update-terbaru">
                                            <?php if ($s == 0) { ?>
                                            Belum Ada Info Terbaru
                                            <?php } else { ?>

                                            <?php
                                            $no = 1;
                                            while ($r = $q_hp->fetch_assoc()) {
                                            ?>
                                            <div class="box-update mb-2">
                                                <span
                                                    class="judul_update"><b><?= ucwords($r["judul_update"]) ?></b></span>
                                                <p class="tgl_update"><?= date("d-m-Y", strtotime($r["tanggal"])) ?></p>
                                                <?= htmlspecialchars_decode(ucfirst($r["update_cerita"])) ?>
                                            </div>
                                            <?php } ?>

                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-contact-hp" role="tabpanel"
                                        aria-labelledby="pills-contact-tab">
                                        <div class="donatur" id="donatur">
                                            <div class="list-wrapper2">
                                                <?php
                                            $no = 1;
                                            while ($r = $query_donatur_hp->fetch_assoc()) {
                                            $inisial = inisial($r["nama_tampil"]);
                                            $ins_dn  = substr($inisial,0,2);
                                            $tanggal = $r["dibuat"];
                                            $tgl    = date("d-m-Y", strtotime($tanggal));

                                            ?>
                                                <div class="list-item">
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <div class="user-avatar">
                                                                <div class="circle-avatar">
                                                                    <?php if ($r["nama_tampil"] == "anonim") { ?>
                                                                    <span class="inisial"><i
                                                                            class="bi bi-person"></i></span>
                                                                    <?php } else { ?>
                                                                    <span class="inisial"><?= $ins_dn  ?></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-7">
                                                            <div class="detail-nama-donatur">
                                                                <div class="nama-donatur mb-2">
                                                                    <span><b><?= ucwords($r["nama_tampil"]) ?></b></span>
                                                                </div>
                                                                <div class="tgl-donasi">
                                                                    <span><?= $tgl ?></span>
                                                                </div>
                                                                <div class="doa-dukungan">
                                                                    <span><?= ucfirst($r["doa"]) ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="donasi-donatur">
                                                                <span class="donasi-jumlah"><b>Rp.
                                                                        <?= number_format($r["jumlah_donasi"], 0, ".", ".") ?></b></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer-nav">
            <div class="footer-share-hp">
                <div class="share-hp">
                    <div class="container">
                        <div class="row row-cols-3">
                            <div class="col-2">
                                <div class="dropup">
                                    <a target="_blank"
                                        href="https://www.facebook.com/sharer/sharer.php?u=https://dompetdonasi.com/<?= $data["link"]; ?>&amp;src=sdkpreparse"
                                        class="btn btn-facebook-bottom dropbtn"><i class="fab fa-facebook-f"></i></a>
                                    <div class="dropup-content">
                                        <div class="btn-share fb-share-button"
                                            data-href="https://dompetdonasi.com/zakat" data-layout="box_count"
                                            data-size="large">
                                            <a target="_blank"
                                                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdompetdonasi.com%2Fzakat&amp;src=sdkpreparse"
                                                class="fb-xfbml-parse-ignore">Bagikan
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <p style="text-align:center"><a class="btn btn-whatsapp-bottom"
                                        href="whatsapp://send?text=https://dompetdonasi.com/<?= $data["link"]; ?>"
                                        data-action="share/whatsapp/share" target="_blank"><i
                                            class="fab fa-whatsapp"></i></a></p>
                            </div>
                            <div class="col-8">
                                <p style="text-align:center">
                                    <?php if ($nama == "dompet yatim") { ?>
                                    <a href="donasi/<?= $data["link"]; ?>.php" class="btn btn-donasi-bottom">DONASI
                                        SEKARANG</a>
                                    <?php } elseif ($dateakhir < date("Y-m-d")) { ?>
                                    <a href="donasi/<?= $data["link"]; ?>.php"
                                        class="btn btn-donasi-bottom disabled">TELAH BERAKHIR</a>
                                    <?php } else { ?>
                                    <a href="donasi/<?= $data["link"]; ?>.php" class="btn btn-donasi-bottom">DONASI
                                        SEKARANG</a>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'badan/footer.php'; ?>
    <!-- End Footer -->


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center donasi-top"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplePagination.js/1.6/jquery.simplePagination.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/pagination.js"></script>
    <script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {


        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            document.getElementById("footer-nav").style.bottom = "0";
        } else {
            document.getElementById("footer-nav").style.bottom = "-70px";
        }
    }
    </script>
    <!-- end script -->
</body>

</html>