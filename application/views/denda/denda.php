<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Denda</h3>
        </div>
        <section class="section">
            <div class="row match-height">
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <?php if (!empty($this->input->get('id'))) { ?>
                                    <form method="post" action="<?= base_url('transaksi/dendaproses'); ?>">
                                        <div class="form-group">
                                            <label for="">Harga Denda</label>
                                            <input type="number" name="harga" value="<?= $den->harga_denda; ?>" class="form-control" placeholder="Contoh : 10000">

                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status">
                                                <option <?php if ($den->stat == 'Aktif') {
                                                            echo 'selected';
                                                        } ?>>Aktif</option>
                                                <option <?php if ($den->stat == 'Tidak Aktif') {
                                                            echo 'selected';
                                                        } ?>>Tidak Aktif</option>
                                            </select>
                                        </div>
                                        <br />
                                        <input type="hidden" name="edit" value="<?= $den->id_biaya_denda; ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Harga Denda</button>
                                    </form>
                                <?php } else { ?>

                                    <form method="post" action="<?= base_url('transaksi/tambahdenda'); ?>">
                                        <div class="form-group">
                                            <label for="">Harga Denda</label>
                                            <input type="number" name="harga" class="form-control" placeholder="Contoh : 10000">
                                        </div>
                                        <br />
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Harga Denda</button>
                                    </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Harga Denda</th>
                                            <th>Status</th>
                                            <th>Mulai Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($denda->result_array() as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['harga_denda']; ?></td>
                                                <td><?= $isi['stat']; ?></td>
                                                <td><?= $isi['tgl_tetap']; ?></td>
                                                <td style="width:20%;">
                                                    <a href="<?= base_url('transaksi/denda?id=' . $isi['id_biaya_denda']); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>
                                                    <?php if ($isi['stat'] == 'Aktif') { ?>
                                                        <button class="btn btn-warning btn-sm"><i class="fa fa-ban"></i></button>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('transaksi/dendaproses?denda_id=' . $isi['id_biaya_denda']); ?>" onclick="return confirm('Anda yakin Biaya denda ini akan dihapus ?');">
                                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php $no++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php $this->load->view('base/footer'); ?>