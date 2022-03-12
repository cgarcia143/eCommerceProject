<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Pedidos</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_id">
                            <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Referencia pago</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos->pedidos as $pedido) : ?>
                                    <tr>
                                        <td><?php echo $pedido->id_pedido; ?></td>
                                        <td><?php echo $pedido->estado; ?></td>
                                        <td><?php echo $pedido->referenciapago; ?></td>
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