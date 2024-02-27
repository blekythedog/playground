<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
            <img src="<?= base_url('../assets/images/logos/dark-logo.svg') ?>" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.html" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Data</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('home/pengunjung') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Pengunjung</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('home/daftar') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Pendaftaran</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('home/main') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">ecek ecek</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('home/laporanHarian') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-cards"></i>
                </span>
                <span class="hide-menu">Laporan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= base_url('home/logout') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Log out</span>
              </a>
            </li>
            
      <!-- End Sidebar scroll-->
    </aside>