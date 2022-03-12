<!--<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php //echo $datos->titulo; ?></title>
	<link href="<?php //echo ROUTE_URL; ?>src/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php //echo ROUTE_URL; ?>src/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php //echo ROUTE_URL; ?>src/css/datepicker3.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="<?php //echo ROUTE_URL; ?>src/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand"><img src="<?php //echo ROUTE_URL; ?>src/img/logo.png"></a>
            <ul class="nav navbar-top-links navbar-right">
				
		    </ul>       
        </div>
    </div>
</nav>-->

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Dashboard Admin</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
  <!-- PLUGINS CSS STYLE -->
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="<?php echo ROUTE_URL; ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="<?php echo ROUTE_URL; ?>assets/css/sleek.css" />
  <link rel="stylesheet" href="<?php echo ROUTE_URL; ?>assets/css/main.css" />
  <!-- FAVICON -->
  <link href="<?php echo ROUTE_URL; ?>assets/img/favicon.png" rel="shortcut icon" />
  <script src="<?php echo ROUTE_URL; ?>assets/plugins/nprogress/nprogress.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">

  <div class="mobile-sticky-body-overlay"></div>

  <div class="wrapper">

    <?php require_once 'Views/partials-admin/aside.php'; ?>

    <div class="page-wrapper">
      <!-- Header -->
      <header class="main-header " id="header">
        <nav class="navbar navbar-static-top navbar-expand-lg">
          <!-- Sidebar toggle button -->
          <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
          </button>
          
          <div class="navbar-right ">
            <ul class="nav navbar-nav">
              <!-- User Account -->
              <li class="dropdown user-menu">
                <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="d-none d-lg-inline-block"><?php echo $_SESSION['usuario']->nombre; ?></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <!-- User image -->
                  <li class="dropdown-header">
                    <div class="d-inline-block">
                      <?php echo $_SESSION['usuario']->nombre; ?> 
                      <small class="pt-1"><?php echo $_SESSION['usuario']->correo; ?></small>
                    </div>
                  </li>

                  <li>
                    <a href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=settings">
                      <i class="mdi mdi-account"></i> Perfil
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=settings"> <i class="mdi mdi-settings"></i> Configuracion </a>
                  </li>

                  <li class="dropdown-footer">
                    <a href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=logout"> <i class="mdi mdi-logout"></i> Salir </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>


      </header>