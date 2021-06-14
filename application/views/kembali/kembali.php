<?php $this->load->view('base/head'); ?>

<?php
$bulan_tes = array(
    '01' => "Januari",
    '02' => "Februari",
    '03' => "Maret",
    '04' => "April",
    '05' => "Mei",
    '06' => "Juni",
    '07' => "Juli",
    '08' => "Agustus",
    '09' => "September",
    '10' => "Oktober",
    '11' => "November",
    '12' => "Desember"
);
?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Data Pengembalian</h3>
        </div>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

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
                                            <th>Nama</th>
                                            <th>Pinjam</th>
                                            <th>Batas Waktu Pengembalian</th>
                                            <th style="width:10%">Status</th>
                                            <th>Tanggal Dikembalikan</th>
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
                                                <td><?= $ang->nama; ?></td>
                                                <td><?= $isi['tgl_pinjam']; ?></td>
                                                <td><?= $isi['tgl_balik']; ?></td>
                                                <td><?= $isi['status']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($isi['tgl_kembali'] == '0') {
                                                        echo '<p style="color:red;">belum dikembalikan</p>';
                                                    } else {
                                                        echo $isi['tgl_kembali'];
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
                                                    if ($denda->num_rows() > 0) {
                                                        $s = $denda->row();
                                                        echo $this->M_Admin->rp($s->denda);
                                                    } else {
                                                        $date1 = date('Ymd');
                                                        $date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
                                                        $diff = $date2 - $date1;

                                                        if ($diff >= 0) {
                                                            echo '<p style="color:green;">
												Tidak Ada Denda</p>';
                                                        } else {
                                                            $dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
                                                            echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * abs($diff))) . ' 
												</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                        <a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id']); ?>" class="btn btn-primary btn-sm" title="detail pinjam">
                                                            <i class="fa fa-eye"></i></button></a>

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

    <?php $this->load->view('base/footer'); ?>