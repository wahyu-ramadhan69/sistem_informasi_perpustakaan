<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script language='JavaScript'>
        var txt = "  Sistem Informasi Perpustakaan MAN 1 Model Bengkulu  ";
        var speed = 300;
        var refresh = null;

        function action() {
            document.title = txt;
            txt = txt.substring(1, txt.length) + txt.charAt(0);
            refresh = setTimeout("action()", speed);
        }
        action();
    </script>


    <link rel="stylesheet" href="<?php echo base_url('aset/seni/style.css'); ?>">

    <style type="text/css">
        .button {
            cursor: pointer;
            text-align: center;
            margin: 0 auto;
            width: 60px;
            color: #fff;
            background-color: #ff73b3;
            opacity: 1;
            -moz-transition: all 0.5s;
            -o-transition: all 0.5s;
            -webkit-transition: all 0.5s;
            transition: all 0.5s;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->

    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="container">
        <div class="box"></div>
        <div class="container-forms">
            <div class="container-info">
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>
                                Have an account?
                            </p>

                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <?php
                            echo validation_errors();
                            if ($this->session->flashdata('sukses')) {
                                echo '<div class="alert alert-success">' . $this->session->flashdata('sukses') . '</div>';
                            }
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                            }
                            ?>
                            <p>
                                SI Perpustakaan MAN 1 Model Bengkulu
                            </p>
                            <a href="<?= base_url('login/forgot'); ?>" style="text-decoration :none;">
                                <div class="btn">
                                    Lupa Password
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-form">
                <div class="form-item login">
                    <div class="table">
                        <div class="table-cell">
                            <form action="<?= base_url('login/auth'); ?>" method="post">
                                <input name="user" placeholder="Username" type="text" />
                                <input name="pass" placeholder="Password" type="Password" />
                                <div class="btn"><button type="sumbit" style="background-color: transparent; border: none; color: white">Login</button> </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partial -->
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src="<?php echo base_url('aset/seni/script.js'); ?>"></script>

</body>

</html>