<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/images/favicon.svg'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/app.css'); ?>">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="assets/images/favicon.svg" height="48" class='mb-4'>
                                <h3>Lupa Password</h3>
                                <p>Masukkan Password baru</p>
                            </div>
                            <form action="<?= base_url('login/ubahpass'); ?>" method="post">
                                <?php
                                echo validation_errors();
                                if ($this->session->flashdata('sukses')) {
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
                                }
                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                }
                                ?>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password Baru</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password1">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Ulangi Password Baru</label>
                                    </div>
                                    <div class="position-relative">
                                        <input type="password" class="form-control" id="password" name="password2">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    <button class="btn btn-primary float-end">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="<?php echo base_url('aset/vol/assets/js/feather-icons/feather.min.js'); ?>"></script>
    <script src="<?php echo base_url('aset/vol/assets/js/app.js'); ?>"></script>
    <script src="<?php echo base_url('aset/vol/assets/js/main.js'); ?>"></script>

</body>

</html>