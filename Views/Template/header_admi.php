<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Tienda Virtual - Equipos contra incendios y señalamientos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nome="viewport" content="width=device-width, initial-scale=1">
    <meta name="autor" content="Edwin Moysen">
    <meta name="theme-color" content="B22222">
    <link rel="shortcut icon" href="<?php echo media(); ?> /images/uploads/logo.ico">
    <title><?php echo $data['page_tag'] ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media(); ?>/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url(); ?>dashboard">Tienda Virtual</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>opciones"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>perfil"><i class="bi bi-person me-2 fs-5"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url(); ?>logout"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
<?php require_once("nav_admi.php"); ?>