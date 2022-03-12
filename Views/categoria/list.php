<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>
                            Categoria Productos
                        </h2>
                    </div>
                    <div class="card-body">
                        <!-- <p class="mb-5"><a href="<?php echo ROUTE_URL; ?>?clase=producto&metodo=create" class="btn btn-primary btn-lg "><span class="fa fa-plus"></span> Nuevo</a></p> -->
                        <table class="table display" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">descripcion</th>
                                    <th scope="col">Editar | Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos->categoriaproductos as $categoriaproductos) : ?>
                                    <tr>
                                        <td><?php echo $categoriaproductos->id_categoria; ?></td>
                                        <td><?php echo $categoriaproductos->nombre; ?></td>
                                        <td><?php echo $categoriaproductos->descripcion; ?></td>
                                        <td><a class="btn btn-primary btn-sm" href="<?php echo ROUTE_URL; ?>?clase=Categoria&metodo=edit&id=<?php echo $categoriaproductos->id_categoria; ?>"><span class="fa fa-edit"></span>Editar</a>
                                            <a class="btn btn-danger btn-sm" href="<?php echo ROUTE_URL; ?>?clase=Categoria&metodo=delete&id=<?php echo $categoriaproductos->id_categoria; ?>"><span class="fa fa-trash"></span>Eliminar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
<?php
 mostrarNotificacion();