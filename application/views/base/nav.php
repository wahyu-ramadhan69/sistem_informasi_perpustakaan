<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                        <?php
                        $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
                        if (!empty($d->foto)) {
                        ?>
                            <br />
                            <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $d->foto; ?>" alt="" srcset="" />
                        <?php } else { ?>
                            <i class="fa fa-user fa-4x" style="color:#fff;"></i>
                        <?php } ?>
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block"><?php echo $d->nama; ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="<?php echo base_url(); ?>login/logout" class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>