<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/images/favicon.svg'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/app.css'); ?>">

</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card py-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?php echo base_url('aset/vol/assets/images/faviconi.png'); ?>" height="48" class='mb-4'>
                                <h3>Lupa Password</h3>
                                <p>Masukkan email mu untuk mendapatkan link reset passsword</p>
                            </div>
                            <form action="<?= base_url('login/forgot'); ?>" method="post">
                                <?php
                                echo validation_errors();
                                if ($this->session->flashdata('sukses')) {
                                    echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
                                }
                                if ($this->session->flashdata('error')) {
                                    echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                                }
                                ?>
                                <div class="form-group">
                                    <label for="first-name-column">Email</label>
                                    <input type="email" id="first-name-column" class="form-control" name="email">
                                </div>

                                <div class="clearfix">
                                    <button type="submit" class="btn btn-primary float-end">Submit</button>
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