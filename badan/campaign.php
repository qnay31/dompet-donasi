<?php
$loop_campaign      = mysqli_query($conn, "SELECT * FROM campaign WHERE status = 'Berlangsung' ORDER BY `nama`='dompet yatim' DESC LIMIT 6");

$loop_campaign_hp   = mysqli_query($conn, "SELECT * FROM campaign WHERE status = 'Berlangsung' ORDER BY `id` DESC LIMIT 6");

?>
<section id="blog" class="padd-sectio">

    <div class="container" data-aos="fade-up">
        <header class="section-header">
            <h3>Campaign Pilihan</h3>
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
            <div class="col-md-4 col-lg-4 campaign-desktop mb-3">
                <a href="<?= $r["link"] ?>.php">
                    <div class="block-blog text-left">
                        <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $r["foto"] ?>"
                            alt="img">
                        <div class="content-blog">
                            <h4><?= ucwords($r["judul"]) ?></h4>
                            <h5><?= ucwords($r["nama"]) ?> <i class="bi bi-check-circle-fill text-success"></i></h5>
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
                <a href="<?= $r["link"] ?>.php">
                    <div class="block-blog text-left">
                        <div class="row">
                            <div class="col-6">
                                <img src="http://localhost/admin_dompet/assets/images/cover-campaign/<?= $r["foto"] ?>"
                                    alt="img">
                            </div>
                            <div class="col-6">
                                <div class="content-blog">
                                    <h4><?= ucwords($r["judul"]) ?></h4>
                                    <h5><?= ucwords($r["nama"]) ?> <i class="bi bi-check-circle-fill text-success"></i>
                                    </h5>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $persen ?>%"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="card-info">Sisa Waktu</span>
                                    <span class="float-end readmore card-info">Terkumpul</span><br>
                                    <?php if ($r["nama"] == "dompet yatim") { ?>
                                    <span class="fw-bold card-keterangan"><i class="fas fa-infinity"></i> Hari</span>
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
            <div class="lihat-semua">
                <a class="btn btn-success" href="http://localhost/new_dompet/models/all-campaign.php">Lihat semua</a>
            </div>
        </div>
    </div>
</section>