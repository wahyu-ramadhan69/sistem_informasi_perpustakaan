<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Edit Anggota</h3>
        </div>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo base_url('user/updang'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama Anggota</label>
                                                <input type="text" class="form-control" value="<?= $user->nama; ?>" name="nama" required="required" placeholder="Nama Pengguna">
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="lahir" value="<?= $user->tempat_lahir; ?>" required="required" placeholder="Contoh : Bekasi">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" value="<?= $user->tgl_lahir; ?>" required="required" placeholder="Contoh : 1999-05-18" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" readonly value="<?= $user->user; ?>" name="user" required="required" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password (opsional)</label>
                                                <input type="password" class="form-control" name="pass" placeholder="Isi Password Jika di Perlukan Ganti">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="level" value="<?= $user->level; ?>" hidden>
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <br />
                                                <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Laki-Laki') {
                                                                                        echo 'checked';
                                                                                    } ?> value="Laki-Laki" required="required"> Laki-Laki
                                                <br />
                                                <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Perempuan') {
                                                                                        echo 'checked';
                                                                                    } ?> value="Perempuan" required="required"> Perempuan
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input id="uintTextBox" class="form-control" value="<?= $user->telepon; ?>" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" value="<?= $user->email; ?>" readonly class="form-control" name="email" required="required" placeholder="Contoh : fauzan1892@codekop.com">
                                            </div>
                                            <div class="form-group">
                                                <label>Pas Foto</label>
                                                <input type="file" accept="image/*" name="gambar">

                                                <br />
                                                <img src="<?= base_url('assets_style/image/' . $user->foto); ?>" width="150px" height="150px" alt="#">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" required="required"><?= $user->alamat; ?></textarea>
                                                <input type="hidden" class="form-control" value="<?= $user->id_login; ?>" name="id_login">
                                                <input type="hidden" class="form-control" value="<?= $user->foto; ?>" name="foto">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary btn-md">Edit Data</button>
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