<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>
        <section class="section">
            <div class="row mb-2">
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>BUKU</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p><?= $count_buku; ?> </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas1" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>ANGGOTA</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p><?= $count_pengguna; ?> </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas2" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>PEMINJAMAN</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p><?= $count_pinjam; ?></p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas3" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card card-statistic">
                        <div class="card-body p-0">
                            <div class="d-flex flex-column">
                                <div class='px-3 py-3 d-flex justify-content-between'>
                                    <h3 class='card-title'>PENGEMBALIAN</h3>
                                    <div class="card-right d-flex align-items-center">
                                        <p><?= $count_kembali; ?> </p>
                                    </div>
                                </div>
                                <div class="chart-wrapper">
                                    <canvas id="canvas4" style="height:100px !important"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

    <?php $this->load->view('base/footer'); ?>