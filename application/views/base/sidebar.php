<div class="sidebar-menu">
    <ul class="menu">
        <?php if ($this->session->userdata('level') == 'Petugas') { ?>
            <li class='sidebar-title'>Main Menu</li>
            <li class="sidebar-item">
                <a href="<?php echo base_url('dashboard'); ?>" class='sidebar-link'>
                    <i data-feather="home" width="20"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="" class='sidebar-link'>
                    <i data-feather="layers" width="20"></i>
                    <span>Pengguna</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="<?php echo base_url('user'); ?>">Petugas</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("user/anggota"); ?>">Anggota</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="" class='sidebar-link'>
                    <i data-feather="triangle" width="20"></i>
                    <span>Data</span>
                </a>
                <ul class="submenu ">
                     <li>
                        <a href="<?php echo base_url("data/kategori"); ?>">Kategori</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("data/rak"); ?>">Rak</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("data"); ?>">Buku</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="briefcase" width="20"></i>
                    <span>Transaksi</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="<?php echo base_url("transaksi"); ?>">Peminjaman</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("transaksi/kembali"); ?>">Pengembalian</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url("transaksi/denda"); ?>" class='sidebar-link'>
                    <i data-feather="layers" width="20"></i>
                    <span>Denda</span>
                </a>
            </li>
        <?php } ?>
        <?php if ($this->session->userdata('level') == 'Anggota') { ?>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url("transaksi"); ?>" class='sidebar-link'>
                    <i class="fab fa-servicestack" width="20"></i>
                    <span>Data Peminjaman</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url("transaksi/kembali"); ?>" class='sidebar-link'>
                    <i class="fab fa-slack " width="20"></i>
                    <span>Data Pengambilan</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url("data"); ?>" class='sidebar-link'>
                    <i class="fab fa-slack-hash"></i>
                    <span>Cari Buku</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('user/edit/' . $this->session->userdata('ses_id')); ?>" class='sidebar-link'>
                    <i class="fas fa-dove icon-4x"></i>
                    <span>Data Anggota</span>
                </a>
            </li>
            <li class="sidebar-item  ">
                <a href="<?php echo base_url('user/detail/' . $this->session->userdata('ses_id')); ?>" class='sidebar-link'>
                    <i class="fas fa-copy"></i>
                    <span>Cetak Data Anggota</span>
                </a>
            </li>
        <?php } ?>

    </ul>
</div>