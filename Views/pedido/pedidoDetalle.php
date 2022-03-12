<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Gestionar pedido</h2>
                    </div>
                    <div class="card-body">
                        <div>
                            <p>#id del pedido: <?php echo $datos->pedido->id_pedido; ?></p><br>
                            <p>Estado: <?php echo $datos->pedido->estado; ?></p><br>
                            <p>Ref pago: <?php echo $datos->pedido->referenciapago; ?></p><br>
                            <p>Fecha: <?php echo $datos->venta->fecha; ?></p><br>
                        </div>
                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos->detallesVentas as $producto) : ?>
                                    <tr>
                                        <td><?php echo $producto->producto; ?></td>
                                        <td><?php echo $producto->precio; ?></td>
                                        <td><?php echo $producto->cantidad; ?></td>
                                        <td><?php echo $producto->subtotal; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table><br><br>
                        <div>
                            <form action="?clase=pedido&metodo=actualizarEstado" method="post">
                                <div class="form-group">
                                    <input type="hidden" name="id_pedido" value="<?php echo $datos->pedido->id_pedido; ?>">
                                    <label for="">Estado:</label>
                                    <select name="estado" id="" class="form-control">
                                        <option value="Abierto" <?php echo ($datos->pedido->estado == "Abierto") ? "selected" : ""; ?>>Abierto</option>
                                        <option value="en proceso" <?php echo ($datos->pedido->estado == "en proceso") ? "selected" : ""; ?>>Proceso</option>
                                        <option value="Despachado" <?php echo ($datos->pedido->estado == "Despachado") ? "selected" : ""; ?>>Despachado</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Confirmar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mostrarNotificacion(); ?>