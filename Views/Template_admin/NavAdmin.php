<body class="app sidebar-mini">
   <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?=base_url();?>dashboard">Tienda</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?=base_url();?>opciones"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?=base_url();?>perfil"><i class="bi bi-person me-2 fs-5"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?=base_url();?>logout"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media();?>images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="<?=base_url();?>dashboard"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-people-fill"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?=base_url();?>usuarios"><i class="bi bi-people-fill"></i> Usuarios</a></li>
            <li><a class="treeview-item" href="<?=base_url();?>roles"><i class="icon bi bi-file-earmark-fill"></i> Roles</a></li>
            <li><a class="treeview-item" href="<?=base_url();?>permisos"><i class="icon bi bi-shield-fill"></i> Permisos</a></li>
          </ul>
        </li>     
        <li><a class="app-menu__item" href="<?=base_url();?>clientes"><i class="app-menu__icon bi bi-person-fill-exclamation"></i><span class="app-menu__label">Clientes</span></a></li>
        <li><a class="app-menu__item" href="<?=base_url();?>productos"><i class="app-menu__icon bi bi-box-seam-fill"></i><span class="app-menu__label">Productos</span></a></li>
        <li><a class="app-menu__item" href="<?=base_url();?>pedidos"><i class="app-menu__icon bi bi-person-lines-fill"></i><span class="app-menu__label">Pedidos</span></a></li>
        <li><a class="app-menu__item" href="<?=base_url();?>logout"><i class="app-menu__icon bi bi-box-arrow-left"></i><span class="app-menu__label">Logout</span></a></li>
      </ul>
    </aside>