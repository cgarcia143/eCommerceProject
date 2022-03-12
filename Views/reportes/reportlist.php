<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Reportes</h2>
                    </div>
                    <div class="card-body">
                        <!-- <p class="mb-5"><a href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create" class="btn btn-primary btn-lg "><span class="fa fa-plus"></span> Nuevo</a></p> -->
                        <table class="table" id="table_id">
                            <thead>
                                    <tr>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Cedula</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Codigo Producto</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos->reporte as $report) : ?>
                                    <tr>
                                        <td><?php echo $report->fecha; ?></td>
                                        <td><?php echo $report->cedula; ?></td>
                                        <td><?php echo $report->usuario; ?></td>
                                        <td><?php echo $report->codigo; ?></td>
                                        <td><?php echo $report->producto; ?></td>
                                        <td><?php echo $report->categoria; ?></td>
                                        <td><?php echo $report->cantidad; ?></td>
                                        <td><?php echo $report->precio; ?></td>
                                        <td><?php echo $report->total; ?></td>
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