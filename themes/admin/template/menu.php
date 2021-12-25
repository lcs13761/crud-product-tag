<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
   <div class="dropdown">
       <a class="sidebar-brand d-flex dropdown-toggle align-items-center justify-content-center" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           <img class="img-profile  icon-circle " src="<?= theme('assets/img/undraw_profile.svg', CONF_VIEW_ADMIN)  ?>">
           <div class="sidebar-brand-text mx-3"><?= name( auth()->name) ?></div>
       </a>
       <div class="dropdown-menu dropdown-menu-right shadow " aria-labelledby="userDropdown">
           <a class="dropdown-item" href="<?= url('logout') ?>">
               <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Sair
           </a>
       </div>
   </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('/'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('product.index') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Produtos</span></a>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= url('tag.index') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>TAGS</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->