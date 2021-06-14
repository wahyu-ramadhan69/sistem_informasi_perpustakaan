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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/vendors/chartjs/Chart.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/vendors/perfect-scrollbar/perfect-scrollbar.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('aset/font/css/all.min.css'); ?>">
    <link rel="shortcut icon" href="<?php echo base_url('aset/vol/assets/images/faviconi.png'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?php echo base_url('aset/vol/assets/vendors/simple-datatables/style.css'); ?>">

</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="<?php echo base_url('aset/vol/assets/images/logokp.png'); ?>" alt="" srcset="">
                </div>