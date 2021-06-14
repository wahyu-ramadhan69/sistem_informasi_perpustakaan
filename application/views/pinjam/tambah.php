<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Tambah Peminjaman buku</h3>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo base_url('transaksi/peminjaman'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td colspan="3">Data Transaksi</td>
                                                </tr>
                                                <tr>
                                                    <td>No Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="text" name="nopinjam" value="<?= $nop; ?>" readonly class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tgl Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" value="<?= date('Y-m-d'); ?>" name="tgl" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ID Anggota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="anggota_id" id="search" placeholder="cari nama atau id anggota" value="" class="form-control" autocomplete="off">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td>
                                                        <ul class="list-group" id="result"></ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lama Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <select name="lama" class="form-select" id="basicSelect" required="required">
                                                            <option disabled selected value> -- Pilih lama peminjaman -- </option>
                                                            <option value="7">7 Hari</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td colspan="3">Pinjam Buku</td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Buku</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="buku_id" id="search2" placeholder="cari nama atau id buku" value="" class="form-control" autocomplete="off">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td>
                                                        <ul class="list-group" id="result2"></ul>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="hidden" name="tambah" value="tambah">
                                    <button type="submit" class="btn btn-primary btn-md">Tambah</button>

                                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-md">Kembali</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('base/footer'); ?>