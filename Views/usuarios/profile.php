<?php
$usuario = $_SESSION['usuario'];
?>

<div class="content-wrapper">
    <div class="content">
        <div class="bg-white border rounded">
            <div class="row no-gutters">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-body">
                                <h4 class="py-2 text-dark"><?php echo $usuario->nombre; ?></h4>
                                <p><?php echo $usuario->correo; ?></p>
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="contact-info pt-4">
                            <h5 class="text-dark mb-1">Informacion</h5>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Correo electronico</p>
                            <p><?php echo $usuario->correo; ?></p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Numero de Telefono</p>
                            <p><?php echo $usuario->telefono; ?></p>
                            <p class="text-dark font-weight-medium pt-4 mb-2"><?php echo $usuario->tipo_doc; ?></p>
                            <p><?php echo $usuario->cedula; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">
                            <li class="nav-item active">
                                <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Configuracion</a>
                            </li>
                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">

                                <form action="<?php echo ROUTE_URL; ?>?clase=usuario&metodo=settings" method="POST">
                                    <label for="cedula"> Numero de documento</label>
                                    <input class="form-control" type="number" name="cedula" value="<?php echo $datos->datosUpdate->cedula; ?>">
                                    <label for="nombre">nombre</label>
                                    <input class="form-control" type="text" name="nombre" value="<?php echo $datos->datosUpdate->nombre; ?>">
                                    <label for="apellido">apellido</label>
                                    <input class="form-control" type="text" name="apellido" value="<?php echo $datos->datosUpdate->apellido; ?>">
                                    <label for="tipo_doc">tipo_doc</label>
                                    <select class="form-control" name="tipo_doc" id="#" value="<?php echo $datos->datosUpdate->tipo_doc; ?>" required>
                                        <option value="<?php echo $datos->datosUpdate->tipo_doc; ?>"><?php echo $datos->datosUpdate->tipo_doc; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="CC">Cedula ciudadana</option>
                                        <option value="TI">Tarjeta de identidad</option>
                                        <option value="PPE">Pasaparte Extranjero</option>
                                    </select>
                                    <label for="estado">Estado</label>
                                    <label for="ciudad">ciudad</label>
                                    <select class="form-control" name="ciudad" id="#" required>
                                        <option value="<?php echo $datos->datosUpdate->ciudad; ?>"><?php echo $datos->datosUpdate->ciudad; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="7600">cali</option>
                                    </select>
                                    <label for="telefono">telefono</label>
                                    <input class="form-control" type="tel" name="telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="<?php echo $datos->datosUpdate->telefono; ?>">
                                    <label for="correo">correo</label>
                                    <input class="form-control" type="email" name="correo" value="<?php echo $datos->datosUpdate->correo; ?>">
                                    <label for="genero">genero</label>
                                    <select class="form-control" name="genero" id="#" required>
                                        <option value="<?php echo $datos->datosUpdate->genero; ?>"><?php echo $datos->datosUpdate->genero; ?></option>
                                        <option value="">--Select--</option>
                                        <option value="male">masculino</option>
                                        <option value="female">femenino</option>
                                    </select>
                                    <label for="password">password</label>
                                    <input class="form-control" type="password" name="password" id="password" required>
                                    <label for="password">ConfirmarPassword</label>
                                    <input class="form-control" type="password" name="password" id="password2" required>
                                    <label for="direccion">direccion</label>
                                    <input class="form-control" type="text" name="direccion" value="<?php echo $datos->datosUpdate->direccion; ?>">
                                    <input class="btn btn-primary" type="submit" value="Editar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>