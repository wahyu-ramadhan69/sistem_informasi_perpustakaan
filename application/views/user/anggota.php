<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Data Anggota</h3>
        </div>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?php echo base_url("user/tambahang"); ?>"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Anggota</button></a>
                        </div>
                        <div class="card-content">

                            <!-- table hover -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Jenis kelamin</th>
                                            <th>Telepon</th>
                                            <th>Level</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($anggota->result_array() as $isi) { ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['anggota_id']; ?></td>
                                                <td><?= $isi['nama']; ?></td>
                                                <td><?= $isi['jenkel']; ?></td>
                                                <td><?= $isi['telepon']; ?></td>
                                                <td><?= $isi['level']; ?></td>
                                                <td><?= $isi['alamat']; ?></td>
                                                <td style="width:25%;">
                                                    <a href="<?= base_url('user/editang/' . $isi['id_login']); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button></a>
                                                    <a href="<?= base_url('user/delang/' . $isi['id_login']); ?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
                                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>
                                                    <a href="<?= base_url('user/detail/' . $isi['id_login']); ?>" target="_blank"><button class="btn btn-primary btn-sm">
                                                            <i class="fa fa-print"></i> Cetak Kartu</button></a>
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