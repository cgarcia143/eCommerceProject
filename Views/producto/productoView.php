<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Productos</h2>
                    </div>
                    <div class="card-body">
                        <!-- <p class="mb-5"><a href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create" class="btn btn-primary btn-lg "><span class="fa fa-plus"></span> Nuevo</a></p> -->
                        <table class="table" id="table_id">
                            <thead>
                                    <tr>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Categoria</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Descripcion</th>
                                        <th scope="col">Proveedor</th>
                                        <th scope="col">Cantidad</th>
                                        <th style="padding-left: 50px;" scope="col">Opciones</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datos->productos as $producto) : ?>
                                    <tr>
                                        <td><?php echo $producto->codigo; ?></td>
                                        <td><?php echo $producto->pronombre; ?></td>
                                        <td><?php echo $producto->canombre; ?></td>
                                        <td><?php echo $producto->precio; ?></td>
                                        <td><?php echo $producto->descripcion; ?></td>
                                        <td><?php echo $producto->prproveedor; ?></td>
                                        <td><?php echo $producto->stock; ?></td>
                                        <td><a class="btn btn-primary btn-sm"
                                                href="<?php echo ROUTE_URL; ?>?clase=Producto&metodo=edit&id=<?php echo $producto->id_producto; ?>"><span
                                                    class="fa fa-edit"></span> Editar</a>
                                            <a class="btn btn-danger btn-sm"
                                                href="<?php echo ROUTE_URL; ?>?clase=Producto&metodo=delete&id=<?php echo $producto->id_producto; ?>"><span
                                                class="fa fa-trash"> Eliminar</span></a>
                                        </td>
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
<?php
 mostrarNotificacion(); 