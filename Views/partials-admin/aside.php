<?php $usuario = $_SESSION['usuario']; ?>

<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="<?php echo ROUTE_URL; ?>?clase=home&metodo=listar">
                <img class="brand-icon" src="<?php echo ROUTE_URL; ?>src/img/Logo.png" preserveAspectRatio="xMidYMid" width="30" height="40" viewBox="0 0 30 33">
                <span class="brand-name">Take Shop</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <li class="has-sub active">
                    <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=dashboard" data-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="nav-text">dashboard</span>
                    </a>
                </li>

                <?php if ($usuario->rol == 1 || $usuario->rol == 3) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="?clase=venta&metodo=list">
                            <i class="mdi mdi-shopping"></i>
                            <span class="nav-text">Ventas</span>
                        </a>
                    </li>
                <?php endif; ?><!--Pedidos-->

                <?php if ($usuario->rol == 1) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#usuarios" aria-expanded="false" aria-controls="usuarios">
                            <i class="mdi mdi-account-group-outline"></i>
                            <span class="nav-text">Usuarios</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="usuarios" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li class="">
                                    <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=list">
                                        <span class="nav-text">Lista de usuarios</span>
                                    </a>
                                </li>
                                <?php if ($usuario->rol == 1) : ?>
                                    <li class="">
                                        <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=create">
                                            <span class="nav-text">Crear Usuario</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?><!--Usuarios-->

                <?php if ($usuario->rol == 1 || $usuario->rol == 3) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#productos" aria-expanded="false" aria-controls="productos">
                            <i class="mdi mdi-archive"></i>
                            <span class="nav-text">Productos</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="productos" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <?php if ($usuario->rol == 1 || $usuario->rol == 3) : ?>
                                    <li class="">
                                        <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=list">
                                            <span class="nav-text">Lista de productos</span>
                                        </a>
                                    </li>

                                    <li class="">
                                        <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create">
                                            <span class="nav-text">Crear producto</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?><!--Productos-->

                <?php if ($usuario->rol == 1) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#categorias" aria-expanded="false" aria-controls="categorias">
                            <i class="mdi mdi-book-open"></i>
                            <span class="nav-text">Categorias</span> <b class="caret"></b>
                        </a>
                        <ul class="collapse" id="categorias" data-parent="#sidebar-menu">
                            <div class="sub-menu">

                                <li class="">
                                    <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=categoria&metodo=list">
                                        <span class="nav-text">Lista de Categorias</span>
                                    </a>
                                </li>

                                <li class="">
                                    <a class="sidenav-item-link" href="<?php echo ROUTE_URL; ?>?clase=categoria&metodo=create">
                                        <span class="nav-text">Crear Categoria</span>
                                    </a>
                                </li>
                            </div>
                        </ul>
                    </li>
                <?php endif; ?><!--Categorias-->

                <?php if ($usuario->rol == 1 || $usuario->rol == 3) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="?clase=pedido&metodo=list">
                            <i class="mdi mdi-ballot"></i>
                            <span class="nav-text">Pedidos</span>
                        </a>
                    </li>
                <?php endif; ?><!--Pedidos-->

                <?php if ($usuario->rol == 2) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="?clase=venta&metodo=create">
                            <i class="mdi mdi-mdi-ballot"></i>
                            <span class="nav-text">Pendientes</span><span class="align-center"><?php echo (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) ? 1 : 0 ; ?></span>
                        </a>
                    </li>
                <?php endif; ?><!--Pendientes-->

                <?php if ($usuario->rol == 2) : ?>
                    <li class="has-sub">
                        <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#compras" aria-expanded="false" aria-controls="compras">
                            <i class="mdi mdi-mdi-ballot"></i>
                            <span class="nav-text">Mis compras</span>
                        </a>
                    </li>
                <?php endif; ?><!--Compras-->

            </ul>
        </div>
    </div>
</aside>