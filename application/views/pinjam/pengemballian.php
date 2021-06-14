<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Kategori Buku</h3>
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
                                    <form method="post" action="<?= base_url('data/katproses'); ?>">
                                        <div class="form-group">
                                            <label for="">Nama Kategori</label>
                                            <input type="text" name="kategori" value="<?= $kat->nama_kategori; ?>" id="kategori" class="form-control" placeholder="Contoh : Pemrograman Web">

                                        </div>
                                        <br />
                                        <input type="hidden" name="edit" value="<?= $kat->id_kategori; ?>">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit Kategori</button>
                                    </form>
                                <?php } else { ?>

                                    <form method="post" action="<?= base_url('data/katproses'); ?>">
                                        <div class="form-group">
                                            <label for="">Nama Kategori</label>
                                            <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Contoh : Pemrograman Web">

                                        </div>
                                        <br />
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-plus"></i> Tambah Kategori</button>
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
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($kategori->result_array() as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['nama_kategori']; ?></td>
                                                <td style="width:30%;">
                                                    <a href="<?= base_url('data/kategori?id=' . $isi['id_kategori']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('data/katproses?kat_id=' . $isi['id_kategori']); ?>" onclick="return confirm('Anda yakin Kategori ini akan dihapus ?');">
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