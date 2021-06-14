<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Edit Buku</h3>
        </div>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo base_url('data/prosesbuku'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control select2" required="required" name="kategori">
                                                    <option disabled selected value> -- Pilih Kategori -- </option>
                                                    <?php foreach ($kats as $isi) { ?>
                                                        <option value="<?= $isi['id_kategori']; ?>" <?php if ($isi['id_kategori'] == $buku->id_kategori) {
                                                                                                        echo 'selected';
                                                                                                    } ?>><?= $isi['nama_kategori']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Rak / Lokasi</label>
                                                <select name="rak" class="form-control select2" required="required">
                                                    <option disabled selected value> -- Pilih Rak / Lokasi -- </option>
                                                    <?php foreach ($rakbuku as $isi) { ?>
                                                        <option value="<?= $isi['id_rak']; ?>" <?php if ($isi['id_rak'] == $buku->id_rak) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?= $isi['nama_rak']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>ISBN</label>
                                                <input type="text" class="form-control" value="<?= $buku->isbn; ?>" name="isbn" placeholder="Contoh ISBN : 978-602-8123-35-8">
                                            </div>
                                            <div class="form-group">
                                                <label>Judul Buku</label>
                                                <input type="text" class="form-control" value="<?= $buku->title; ?>" name="title" placeholder="Contoh : Cara Cepat Belajar Pemrograman Web">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pengarang</label>
                                                <input type="text" class="form-control" value="<?= $buku->pengarang; ?>" name="pengarang" placeholder="Nama Pengarang">
                                            </div>
                                            <div class="form-group">
                                                <label>Penerbit</label>
                                                <input type="text" class="form-control" value="<?= $buku->penerbit; ?>" name="penerbit" placeholder="Nama Penerbit">
                                            </div>
                                            <div class="form-group">
                                                <label>Tahun Buku</label>
                                                <input type="number" class="form-control" value="<?= $buku->thn_buku; ?>" name="thn" placeholder="Tahun Buku : 2019">
                                            </div>

                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Jumlah Buku</label>
                                                <input type="number" class="form-control" value="<?= $buku->jml; ?>" name="jml" placeholder="Jumlah buku : 12">
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan Lainnya</label>
                                                <textarea class="form-control" name="ket" id="summernotehal" style="height:120px"><?= $buku->isi; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <input type="hidden" name="edit" value="<?= $buku->id_buku; ?>">
                                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
                                </form>
                                <a href="<?= base_url('data'); ?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('base/footer'); ?>