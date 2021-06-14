<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Rak Buku</h3>
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
                                    <form method="post" action="<?= base_url('data/rakproses'); ?>">
                                        <div class="form-group">
                                            <label for="">Nama Rak / Lokasi</label>
                                            <input type="text" name="rak" value="<?= $rak->nama_rak; ?>" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1">

                                        </div>
                                        <br />
                                        <input type="hidden" name="edit" value="<?= $rak->id_rak; ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Rak</button>
                                    </form>
                                <?php } else { ?>

                                    <form method="post" action="<?= base_url('data/rakproses'); ?>">
                                        <div class="form-group">
                                            <label for="">Nama Rak / Lokasi</label>
                                            <input type="text" name="rak" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1">

                                        </div>
                                        <br />
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Rak</button>
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
                                            <th>Rak Buku</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($rakbuku->result_array() as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['nama_rak']; ?></td>
                                                <td style="width:30%;">
                                                    <a href="<?= base_url('data/rak?id=' . $isi['id_rak']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('data/rakproses?rak_id=' . $isi['id_rak']); ?>" onclick="return confirm('Anda yakin Rak Buku ini akan dihapus ?');">
                                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
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