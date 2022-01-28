<?php

$query = mysqli_query($conn, "SELECT * FROM donasi WHERE status = 'Terkonfirmasi' ");

$donatur = $query->num_rows;

?>

<!-- ======= Facts Section ======= -->
<section id="facts">
    <div class="container" data-aos="fade-up">

        <div class="row counters">

            <div class="col-lg-4 col-4 text-center">
                <span data-purecounter-start="0" data-purecounter-end="<?= $s ?>" data-purecounter-duration="1"
                    class="purecounter"></span>
                <p>Campaign</p>
            </div>

            <div class="col-lg-4 col-4 text-center">
                <span data-purecounter-start="0" data-purecounter-end="<?= $hasil_terkumpul ?>"
                    data-purecounter-duration="1" class="purecounter" data-purecounter-separator="true"
                    data-purecounter-separatorsymbol="."></span>
                <p>Donasi</p>
            </div>

            <div class="col-lg-4 col-4 text-center">
                <span data-purecounter-start="0" data-purecounter-end="<?= $donatur ?>" data-purecounter-duration="1"
                    class="purecounter"></span>
                <p>Donatur</p>
            </div>
        </div>

    </div>
</section><!-- End Facts Section -->