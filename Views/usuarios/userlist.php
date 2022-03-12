<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Usuarios</h2>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table_id">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">rol</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Cedula</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Operaciones</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datos->usuarios as $usuarios) : ?>
                                    <tr>
                                        <td><?php echo $usuarios->id_usuarios; ?></td>
                                        <td><?php echo $usuarios->nombre; ?></td>
                                        <td><?php echo $usuarios->apellido; ?></td>
                                        <td><?php echo $usuarios->rol; ?></td>
                                        <td><?php echo $usuarios->correo; ?></td>
                                        <td><?php echo $usuarios->cedula; ?></td>
                                        <td><?php echo $usuarios->direccion; ?></td>
                                        <td><?php echo $usuarios->estado; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-danger" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=delete&id=<?php echo $usuarios->id_usuarios; ?>"><span class="fa fa-trash"></span>Eliminar</a>
                                        </td>
                                        <td>
                                            <?php if($usuarios->estado == "on"):?>
                                            <a class="btn btn-sm btn-danger" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=desactivar&id=<?php echo $usuarios->id_usuarios; ?>&estado=<?php echo $usuarios->estado; ?>"><span class="fa fa-trash"></span>Desactivar</a>
                                            <?php endif;?>

                                            <?php if($usuarios->estado == "off"):?>
                                            <a class="btn btn-sm btn-success" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=desactivar&id=<?php echo $usuarios->id_usuarios; ?>&estado=<?php echo $usuarios->estado; ?>"><span class="fa fa-trash"></span>Habilitar</a>
                                            <?php endif;?>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-success" href="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=edit&id=<?php echo $usuarios->id_usuarios; ?>">Editar</a>
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
<?php mostrarNotificacion();?>