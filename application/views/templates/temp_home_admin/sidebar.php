<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar " >
    <div class="nk-nav-scroll">
        
        <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
                <a href="<?= base_url('C_login_admin/') ?>" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">Home</span>
                </a>
            </li>
            <li class="nav-label">Masterdata</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-globe-alt menu-icon"></i><span class="nav-text">pengaturan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('C_login_admin/kategori') ?>">Kategori</a></li>
                    <li><a href="<?= base_url('C_login_admin/masyarakat') ?>">Masyarakat</a></li>
                    <li><a href="<?= base_url('C_login_admin/petugas') ?>">Petugas</a></li>
                </ul>
            </li>
            <li class="nav-label">Pengaduan Masyarakat</li>
            <li class="mega-menu mega-menu-sm">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-note menu-icon"></i><span class="nav-text">Laporan Pengaduan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="<?= base_url('C_login_admin/pengaduan') ?>">Pengaduan</a></li>
                    <!-- <li><a href="<?= base_url('C_login_admin/laporan') ?>">Laporan</a></li> -->
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--**********************************
            Sidebar end
        ***********************************-->