<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Productos</h2>
                    </div>
                    <div class="card-body">

                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Id venta</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos->detallesVenta as $detalle) : ?>
                                    <tr>
                                        <td><?php echo $detalle->id_detalle_venta; ?></td>
                                        <td><?php echo $detalle->venta; ?></td>
                                        <td><?php echo $detalle->producto; ?></td>
                                        <td><?php echo $detalle->cantidad; ?></td>
                                        <td><?php echo $detalle->subtotal; ?></td>
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