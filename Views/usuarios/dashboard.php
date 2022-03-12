<?php
$usuario = $_SESSION['usuario'];
?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-table-border-none" data-scroll-height="580">
                    <div class="card-header justify-content-between">
                        <h2>Gestion</h2>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <a class="btn btn-success" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=settings"><i class="mdi mdi-account-box-multiple"></i> Perfil</a>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <a class="btn btn-info" href="<?php echo ROUTE_URL; ?>?clase=home&metodo=listar"><i class="mdi mdi-ballot-outline"></i> Inicio</a>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="card">
                                    <a class="btn btn-danger" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=desactivar&id=<?php echo $usuario->id_usuarios; ?>&estado=<?php echo $usuario->estado; ?>"><i class="mdi mdi-account-remove"></i> Desactivar cuenta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card card-default" data-scroll-height="580">
                    <div class="card-header justify-content-between mb-4">
                        <h2>Productos interesantes</h2>
                    </div>
                    <div class="card-body py-0">
                        <?php foreach ($datos->productos as $productos) : ?>
                            <div class="media d-flex mb-5">
                                <div class="media-image align-self-center mr-3 rounded">
                                    <a href="#"><img src="<?php echo $productos->imagen; ?>" alt="customer image" width="200" height="200"></a>
                                </div>
                                <div class="media-body align-self-center">
                                    <a href="#">
                                        <h6 class="mb-3 text-dark font-weight-medium"><?php echo $productos->nombre; ?></h6>
                                    </a>
                                    <p class="d-none d-md-block"><?php echo $productos->descripcion; ?></p>
                                    <p class="mb-0">
                                        <span class="text-dark ml-3">$<?php echo $productos->precio; ?></span>
                                    </p>

                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <?php if ($usuario->rol == 1 || $usuario->rol == 3) : ?>
                    <div class="card card-table-border-none" data-scroll-height="580">
                        <div class="card-header justify-content-between">
                            <h2>Pedidos</h2>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table">
                                <tbody>
                                    <?php foreach ($datos->pedidos as $pedido) : ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body align-self-center">
                                                        <a href="#">
                                                            <h6 class="mt-0 text-dark font-weight-medium">
                                                                # <?php echo $pedido->id_pedido; ?>
                                                            </h6>
                                                        </a>
                                                        <small><?php echo $pedido->referenciapago; ?></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $pedido->estado; ?></td>
                                            <td class="text-dark d-none d-md-block"><a href="?clase=pedido&metodo=verPedido&id_pedido=<?php echo $pedido->id_pedido; ?>" class="btn btn-primary btn-sm">gestionar</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($usuario->rol == 2) : ?>
                    <div class="card card-table-border-none" data-scroll-height="580">
                        <div class="card-header justify-content-between">
                            <h2>Mis pedidos</h2>
                        </div>
                        <div class="card-body pt-0">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Estado</th>
                                        <th>Ref pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos->pedidos as $pedido) : ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="media-body align-self-center">
                                                        <a href="profile.html">
                                                            <h6 class="mt-0 text-dark font-weight-medium">
                                                                # <?php echo $pedido->id_pedido; ?>
                                                            </h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?php echo $pedido->estado; ?></td>
                                            <td class="text-dark d-none d-md-block"><?php echo $pedido->referenciapago; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php mostrarNotificacion(); ?>