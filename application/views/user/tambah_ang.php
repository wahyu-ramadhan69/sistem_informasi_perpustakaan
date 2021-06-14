<?php $this->load->view('base/head'); ?>

<?php $this->load->view('base/sidebar'); ?>


<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>
<div id="main">
    <?php $this->load->view('base/nav'); ?>

    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Tambah Anggota</h3>
        </div>
        <?php
        echo validation_errors();
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
        }
        if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <section class="section">
            <div class="row" id="table-hover-row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form action="<?php echo base_url('user/addang'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Id Anggota</label>
                                                <input type="text" class="form-control" name="nama" required="required" value="<?php echo $nomer; ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Anggota</label>
                                                <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Anggota">
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bekasi">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-05-18" max="<?php
                                                                                                                                                                    echo date('Y-m-d');
                                                                                                                                                                    ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="level" value="Anggota" hidden>
                                            </div>

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <br />
                                                <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                                <br />
                                                <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                            </div>
                                            <div class="form-group">
                                                <label>Telepon</label>
                                                <input type="number" id="uintTextBox" class="form-control" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" name="email" required="required" placeholder="Contoh : crahmat12@gmail.com">
                                            </div>
                                            <div class="form-group">
                                                <label>Pas Foto</label>
                                                <input type="file" accept="image/*" name="gambar">
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat" required="required"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pull-right">
                                        <input type="hidden" name="tambah" value="tambah">
                                        <button type="submit" class="btn btn-primary btn-md">Submit</button>
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