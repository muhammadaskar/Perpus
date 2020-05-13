<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('main/admin') ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - daftar buku -->
    <li class="nav-item daftar-buku">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-swatchbook"></i>
            <span>Daftar Buku</span></a>
    </li>

    <!-- Nav Item - daftar peminjam -->
    <li class="nav-item peminjam">
        <a class="nav-link" href="<?= base_url('admin/peminjam') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Daftar Peminjam</span></a>
    </li>

    <!-- Nav Item - daftar peminjam -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/gantiPassword') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ganti Password</span></a>
    </li>

    <!-- Nav Item - keluar -->
    <li class="nav-item">
        <a class="nav-link keluar" href="<?= base_url('auth/logoutAdmin') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->