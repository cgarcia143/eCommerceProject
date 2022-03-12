<?php $usuario = @$_SESSION['usuario']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <!--Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="src/css/home.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <!---->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>TAKE SHOP</title>
</head>

<body>

  <!-- HEADER -->
  <header class="header">
    <!-- NAVIGATION -->
    <nav class="nav container">
      <div class="navigation d-flex">
        <div class="hamburger">
          <i class="bx bx-menu"></i>
        </div>
        <div class="logo">
          <h2>Take Shop</h2>
        </div>

        <div class="menu">
          <div class="top">
            <span class="close">close <i class="bx bx-x"></i></span>
          </div>

          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="<?php echo ROUTE_URL; ?>?clase=home&metodo=listar" class="nav-link">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Acerca de</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Contactanos</a>
            </li>
          </ul>
        </div>

        <div class="icons d-flex">
          <div>
          </div>
          <?php if (isset($usuario)) : ?>
            <div>
              <a href="<?php ROUTE_URL ?>?clase=usuario&metodo=dashboard">
                <i class="bx bx-user"></i>
              </a>
            </div>
          <?php else : ?>
            <div>
              <a href="<?php ROUTE_URL ?>?clase=usuario&metodo=login">
                <i class="bx bx-user"></i>
                login/Registrar
              </a>
            </div>
          <?php endif; ?>
          <div>
            <a href="<?php echo ROUTE_URL . '?clase=carrito&metodo=list'; ?>">
              <i class="bx bx-shopping-bag"></i>
            </a>
            <span class="align-center"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?></span>
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>
