<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Crear Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=create" method="POST">
                            <label for="tipo_doc">Tipo de documento *</label>
                            <select class="form-control" name="tipo_doc" id="#" required>
                                <option value="">--Select--</option>
                                <option value="CC">Cedula ciudadana</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="PPE">Pasaparte Extranjero</option>
                            </select>
                            <label for="cedula">Numero de documento *</label>
                            <div class="form-group">
                                <input class="form-control cedula" type="number" name="cedula" required>
                            </div>
                            <label for="nombre">nombre *</label>
                            <input class="form-control nombre" type="text" name="nombre" required>
                            <label for="apellido">apellido *</label>
                            <input class="form-control apellido" type="text" name="apellido" required>
                            <label for="estado">Estado *</label>
                            <select class="form-control" name="estado" id="#" required>
                                <option value="on">On</option>
                                <option value="off">Off</option>
                            </select>
                            <label for="rol">Rol *</label>
                            <select class="form-control" name="rol" id="#" required>
                                <option value="">--Select--</option>
                                <option value="1">Admin</option>
                                <option value="2">Cliente</option>
                                <option value="3">Empleado</option>
                            </select>
                            <label for="fecha_nmto">fecha_nmto *</label>
                            <input class="form-control" type="date" name="fecha_nmto" required>
                            <label for="telefono">telefono *</label>
                            <input class="form-control" type="tel" name="telefono"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required>
                            <label for="correo">correo *</label>
                            <input class="form-control" type="email" name="correo" required>
                            <label for="genero">genero *</label>
                            <select class="form-control" name="genero" id="#" required>
                                <option value="male">masculino</option>
                                <option value="female">femenino</option>
                            </select>
                            <label for="password">password *</label>
                            <input class="form-control" type="password" name="password" id="password" required>
                            <label for="password">ConfirmarPassword *</label>
                            <input class="form-control" type="password" name="password" id="password2" required>
                            <label for="direccion">direccion *</label>
                            <input class="form-control" type="text-area" name="direccion" required>
                            <label for="ciudad">Ciudad *</label>
                            <select class="form-control " name="ciudad" id="#" required>
                                <option value="">--Select--</option>
                                <option value="7600">cali</option>
                            </select>
                            <label for="submit"></label>
                            <button name="submit" class="btn btn-primary form-control" type="submit">Registrar</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>