    <?php $this->load->view('base/head'); ?>

    <?php $this->load->view('base/sidebar'); ?>


    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
    </div>
    <div id="main">
        <?php $this->load->view('base/nav'); ?>

        <div class="main-content container-fluid">
            <div class="page-title">
                <h3>Data Buku</h3>
            </div>
            <section class="section">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                    <a href="<?= base_url('data/bukutambah'); ?>" class="btn btn-sm btn-primary shadow-sm" style="align-items: left;"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Buku</a>
                                <?php } ?>
                            </div>
                            <div class="card-content">

                                <!-- table hover -->
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0" id="table1" style="font-size: 15px;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Buku</th>
                                                <th>Judul Buku</th>
                                                <th>Tahun Buku</th>
                                                <th>Stok Buku</th>
                                                <th>Penerbit</th>
                                                <th>Pengarang</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($buku->result_array() as $isi) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $isi['buku_id']; ?></td>
                                                    <td><?= $isi['title']; ?></td>
                                                    <td><?= $isi['thn_buku']; ?></td>
                                                    <td><?= $isi['jml']; ?></td>
                                                    <td><?= $isi['penerbit']; ?></td>
                                                    <td><?= $isi['pengarang']; ?></td>
                                                    <td><?= $isi['tgl_masuk']; ?></td>
                                                    <td <?php if ($this->session->userdata('level') == 'Petugas') { ?><?php } ?> style="width: 25%;">

                                                        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                            <a href="<?= base_url('data/bukuedit/' . $isi['id_buku']); ?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                                            <a href="<?= base_url('data/bukudetail/' . $isi['id_buku']); ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-info"></i></button></a>
                                                            <a href="<?= base_url('data/prosesbuku?buku_id=' . $isi['id_buku']); ?>" onclick="return confirm('Anda yakin Buku ini akan dihapus ?');">
                                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                                        <?php } else { ?>
                                                            <a href="<?= base_url('data/bukudetail/' . $isi['id_buku']); ?>">
                                                                <button class="btn btn-primary"><i class="fas fa-info"></i> Detail</button></a>
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