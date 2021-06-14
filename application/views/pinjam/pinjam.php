<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Data Peminjaman</h3>
        </div>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                <a href="<?= base_url('transaksi/cetak_pinjam'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i> Cetak Transaksi Buku</a>
                                <a href="<?= base_url('transaksi/pinjam'); ?>" class="btn btn-sm btn-primary shadow-sm" style="align-items: left;"><i class="fas fa-plus fa-sm text-white-50"></i> Pinjam Buku</a>
                            <?php } ?>
                        </div>
                        <div class="card-content">

                            <!-- table hover -->
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="table1" style="font-size: 15px;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pinjam</th>
                                            <th>ID Anggota</th>
                                            <th>Kode Buku</th>
                                            <th>Nama</th>
                                            <th>Pinjam</th>
                                            <th>Batas Waktu Pengembalian</th>
                                            <th style="width:10%">Status</th>
                                            <th>Denda</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pinjam->result_array() as $isi) {
                                            $anggota_id = $isi['anggota_id'];
                                            $ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();

                                            $pinjam_id = $isi['pinjam_id'];
                                            $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
                                            $total_denda = $denda->row();
                                        ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['pinjam_id']; ?></td>
                                                <td><?= $isi['anggota_id']; ?></td>
                                                <td><?= $isi['buku_id']; ?></td>
                                                <td><?= $ang->nama; ?></td>
                                                <td><?= $isi['tgl_pinjam']; ?></td>
                                                <td><?= $isi['tgl_balik']; ?></td>
                                                <td><?= $isi['status']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($isi['status'] == 'Di Kembalikan') {
                                                        echo $this->M_Admin->rp($total_denda->denda);
                                                    } else {
                                                        $jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
                                                        $date1 = date('Ymd');
                                                        $date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
                                                        $diff = $date1 - $date2;
                                                        if ($diff > 0) {
                                                            echo $diff . ' hari';
                                                            $dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
                                                            echo '<p style="color:red;font-size:18px;">
												' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
												</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
                                                        } else {
                                                            echo '<p style="color:green;">
												Tidak Ada Denda</p>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td style="text-align:center; width:30% ;">
                                                    <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                        <?php if ($isi['tgl_kembali'] == '0') { ?>
                                                            <a href="<?= base_url('transaksi/kembalipinjam/' . $isi['pinjam_id']); ?>" class="btn btn-warning btn-sm" title="pengembalian buku">
                                                                <i class="fas fa-undo"></i> Kembalikan</a>
                                                        <?php } else { ?>
                                                            <a href="javascript:void(0)" class="btn btn-success btn-sm" title="pengembalian buku">
                                                                <i class="fa fa-check"></i> Dikembalikan</a>
                                                        <?php } ?>
                                                        <a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id'] . '?pinjam=yes'); ?>" class="btn btn-primary btn-sm" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
                                                        <a href="<?= base_url('transaksi/prosespinjam?pinjam_id=' . $isi['pinjam_id']); ?>" onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" class="btn btn-danger btn-sm" title="hapus pinjam">
                                                            <i class="fa fa-trash"></i></a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
                                                            <i class="fa fa-eye"></i> Detail Pinjam</a>
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

    <div class="modal fade" id="myModalCetak" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    <h4 class="modal-title" id="myModalLabel">Cetak Peminjaman</h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url() . 'transaksi/cetak_pinjam' ?>" target="_blank" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="d-flex justify-content-around">
                                <div>
                                    <label for="inputEmail3" class=" control-label">Tanggal Awal</label>
                                    <input type="date" name="tgl1" class="form-control" id="inputEmail3" placeholder="Date" required>
                                </div>

                                <div>
                                    <label for="inputEmail3" class=" control-label">Tanggal Akhir</label>
                                    <input type="date" name="tgl2" class="form-control" id="inputEmail3" placeholder="Date" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php $this->load->view('base/footer'); ?>