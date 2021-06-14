<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>

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
                <div class="col-md-5 col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td colspan="3">Data Transaksi</td>
                                    </tr>
                                    <tr>
                                        <td>No Peminjaman</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Peminjaman</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl pengembalian</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ID Anggota</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Biodata</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lama Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            Hari
                                        </td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td colspan="3">Pinjam Buku</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Kembali</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Denda</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Kode Buku</td>
                                        <td>:</td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Data Buku</td>
                                        <td>:</td>
                                        <td>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Title</th>
                                                        <th>Penerbit</th>
                                                        <th>Tahun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

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