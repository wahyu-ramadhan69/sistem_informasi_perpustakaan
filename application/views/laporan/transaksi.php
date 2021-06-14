<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="">
    <title>Cetak Data buku</title>
    <style type="text/css">
        table {
            font-size: 17px;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        table th {
            border: 1px solid #000;
            padding: 7px;
            font-weight: bold;
            text-align: center;
        }

        table td {
            border: 1px solid #000;
            padding: 7px;
            vertical-align: top;
        }
    </style>
</head>

<body onload="window.print();setTimeout(window.close, 0);">
    <img class="" style="float: left; width: 100px; height: 100px; margin-right: -100px;" src="<?php echo base_url('aset/vol/assets/images/faviconi.png'); ?>">
    <h3 style="text-align:center">LAPORAN DATA KARYAWAN<br>MADRASAH ALIYAH NEGERI 1<br>
        KOTA BENGKULU<br>
        <FONT SIZE="3"><I>Jl. Cimanuk, Padang Harapan, Kec. Gading Cemp.,<br> Kota Bengkulu, Bengkulu 38225 <br> Telp/Fax: (0736) 21854</FONT>
    </h3>


    </h3>

    <hr>
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="basic-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>No Pinjam</th>
                <th>ID Anggota</th>
                <th>Kode Buku</th>
                <th>Nama</th>
                <th>Pinjam</th>
                <th>Balik</th>
                <th style="width:10%">Status</th>
                <th>Denda</th>

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

                </tr>
            <?php $no++;
            } ?>
        </tbody>

    </table>
    <h3 style="text-align:right">
        <p>Bengkulu,<span id="datetime"></span></p>

        <script>
            var dt = new Date();
            document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
        </script>


</body>

</html>