<!DOCTYPE html>
<html lang="en">

<head>

<script language='JavaScript'>
var txt="  Sistem Informasi Perpustakaan MAN 1 Model Bengkulu  ";
var speed=300;
var refresh=null;
function action() { document.title=txt;
txt=txt.substring(1,txt.length)+txt.charAt(0);
refresh=setTimeout("action()",speed);}action();
</script>

</head>

<body>
    <!-- partial:index.partial.html -->

    <head>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
        <script src='index.js'></script>
        <link rel="stylesheet" href="<?php echo base_url('aset/login/style.css'); ?>">
        <link href='style.css' rel='stylesheet'>
    </head>

    <body>
        <div id='jsvars'></div>
        <div class='form-container'>
            <form action='<?= base_url('login/auth'); ?>' method="POST">
                <div class='logo'>
                    <div class='logo-padding'></div>
                    <div class='img'> Perpustakaan Man 1 Model </div> 
                    <div class='loader-container'>
                        <div class='loader'>loading</div>
                    </div>
                </div>
                <div class='input-container'>
                    <input id='username' placeholder='Username' type='text' name="user">
                    <input id='password' placeholder='Password' type='password' name="pass">
                    <div class='login-message'>
                        <span class='message'>Invalid username/password</span>
                    </div>
                    <input class='submit' type='submit' value='Log In'>
                </div>
            </form>
        </div>
    </body>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
    <script src="<?php echo base_url('aset/login/script.js'); ?>"></script>

</body>

</html>