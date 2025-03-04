    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="<?php echo media() ?>/images/uploads/usuario-de-perfil.ico" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">Edwin Moysen</p>
          <p class="app-sidebar__user-designation">Administrador</p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>dashboard">
            <i class="app-menu__icon bi bi-speedometer"></i>
            <span class="app-menu__label">Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a class="app-menu__item" href="#" data-toggle="treeview">  
          <!--Para color iconos, debemos agregar la clase: app-menu__icon-->
          <i class="app-menu__icon bi bi-people"></i>
          <span class="app-menu__label">Usuarios</span>
          <i class="treeview-indicator bi bi-chevron-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="<?php echo base_url(); ?>usuarios">
              <i class="app-menu__icon bi bi-people"></i> Usuarios</a>
            </li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>roles">
              <i class="app-menu__icon bi bi-diagram-3"></i> Roles</a>
            </li>
            <li><a class="treeview-item" href="<?php echo base_url(); ?>permisos">
              <i class="app-menu__icon bi bi-card-checklist"></i> Permisos</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>clientes">
            <i class="app-menu__icon bi bi-person-lines-fill"></i>
            <span class="app-menu__label">Clientes</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>productos">
            <i class="app-menu__icon bi bi-tools"></i>
            <span class="app-menu__label">Productos</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>pedidos">
            <i class="app-menu__icon bi bi-bag-check"></i>
            <span class="app-menu__label">Pedidos</span>
          </a>
        </li>
        <li>
          <a class="app-menu__item" href="<?php echo base_url(); ?>logout">
            <i class="app-menu__icon bi bi-box-arrow-right"></i>
            <span class="app-menu__label">Logout</span>
          </a>
        </li>
      </ul>
    </aside>