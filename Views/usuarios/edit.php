<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=edit" method="POST">
                            <input type="hidden" name="id_usuarios" value="<?php echo $datos->datosUpdate->id_usuarios; ?>">
                            <label for="cedula">cedula *</label>
                            <input class="form-control cedula" type="number" name="cedula" value="<?php echo $datos->datosUpdate->cedula; ?>">
                            <label for="nombre">nombre *</label>
                            <input class="form-control nombre" type="text" name="nombre" value="<?php echo $datos->datosUpdate->nombre; ?>">
                            <label for="apellido">apellido *</label>
                            <input class="form-control" type="text" name="apellido" value="<?php echo $datos->datosUpdate->apellido; ?>">
                            <label for="tipo_doc">tipo_doc *</label>
                            <select class="form-control" name="tipo_doc" id="#" value="" required>
                                <option value="<?php echo $datos->datosUpdate->tipo_doc; ?>"><?php echo $datos->datosUpdate->tipo_doc; ?></option>
                                <option value="">--Select--</option>
                                <option value="CC">Cedula ciudadana</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="PPE">Pasaparte Extranjero</option>
                            </select>
                            <label for="rol">Rol *</label>
                            <select class="form-control" name="rol" id="#" required>
                                <option value="">--Select--</option>
                                <option value="1">Admin</option>
                                <option value="2">Cliente</option>
                                <option value="3">Empleado</option>
                            </select>
                            <label for="estado">Estado *</label>
                            <select class="form-control" name="estado" id="#" required>
                                <option value="1">On</option>
                                <option value="2">Off</option>
                            </select>
                            <label for="ciudad">ciudad *</label>
                            <select class="form-control" name="ciudad" id="#" required>
                                <option value="<?php echo $datos->datosUpdate->ciudad;?>"><?php echo $datos->datosUpdate->ciudad; ?></option>
                                <option value="">--Select--</option>
                                <option value="7600">cali</option>
                            </select>
                            <label for="fecha_nmto" hidden>fecha_nmt *</label>
                            <input class="form-control" type="date" name="fecha_nmto" value="<?php echo $datos->datosUpdate->fecha_nmto; ?>" hidden>
                            <label for="telefono">telefono *</label>
                            <input class="form-control" type="tel" name="telefono"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  value="<?php echo $datos->datosUpdate->telefono; ?>">
                            <label for="correo">correo *</label>
                            <input class="form-control" type="email" name="correo" value="<?php echo $datos->datosUpdate->correo; ?>">
                            <label for="genero">genero *</label>
                            <select class="form-control" name="genero" id="#" required>
                                <option value="<?php echo $datos->datosUpdate->genero;?>"><?php echo $datos->datosUpdate->genero;?></option>
                                <option value="">--Select--</option>
                                <option value="male">masculino</option>
                                <option value="female">femenino</option>
                            </select>
                            <label for="direccion">direccion *</label>
                            <input class="form-control" type="text-area" name="direccion" value="<?php echo $datos->datosUpdate->direccion; ?>">
                            <input class="btn btn-primary" type="submit" value="Editar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>