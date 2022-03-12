<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Ventas</h2>
                    </div>
                    <div class="card-body">
                        <!-- <p class="mb-5"><a href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create" class="btn btn-primary btn-lg "><span class="fa fa-plus"></span> Nuevo</a></p> -->
                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Tipo pago</th>
                                    <th scope="col">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos->ventas as $venta) : ?>
                                    <tr>
                                        <td><?php echo $venta->id_ventas; ?></td>
                                        <td><?php echo $venta->nombre; ?></td>
                                        <td><?php echo $venta->fecha; ?></td>
                                        <td><?php echo $venta->valor_total; ?></td>
                                        <td><?php echo $venta->tipo_pago; ?></td>
                                        <td><a href="?clase=venta&metodo=verDetalleProducto&id=<?php echo $venta->id_ventas; ?>"><i class="mdi mdi-eye"></i> detalle</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>