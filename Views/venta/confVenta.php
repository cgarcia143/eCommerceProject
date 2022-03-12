<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h2>Confirmar venta</h2>
                    </div>
                    <div class="card-body">
                        <div class="row g-5">
                            <div class="col-md-5 col-lg-4 order-md-last">
                                <h4 class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-primary">Resumen del pedido</span>
                                    <span class="badge bg-primary rounded-pill"><?php echo isset($datos->carrito) ? count($datos->carrito) : 0; ?></span>
                                </h4>
                                <ul class="list-group mb-3">
                                    <?php foreach ($datos->carrito as $producto) : ?>
                                        <li class="list-group-item d-flex justify-content-between lh-sm">
                                            <div>
                                                <h6 class="my-0"><?php echo $producto->nombre; ?></h6>
                                                <small class="text-muted">descripción: <?php echo $producto->descripcion; ?></small>
                                                <br>
                                                <small class="text-muted">precio: $ <?php echo $producto->precio; ?></small>
                                                <br>
                                                <small class="text-muted">cantidad: <?php echo $producto->cantidad; ?></small>
                                            </div>
                                            <span class="text-muted">$ <?php echo $producto->subTotal; ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Total (COP)</span>
                                        <strong>$ <?php echo calcularTotal($datos->carrito); ?></strong>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-7 col-lg-8">
                                <h4 class="mb-3">Información de envío</h4>
                                <form action="?clase=venta&metodo=create" class="needs-validation" novalidate method="post">

                                    <div>
                                        <p><?php echo $datos->usuario->nombre; ?> <?php echo $datos->usuario->apellido; ?></p>
                                        <p><?php echo $datos->usuario->correo; ?></p>
                                        <p><?php echo $datos->usuario->telefono; ?></p>
                                        <p><?php echo $datos->usuario->direccion; ?></p>
                                        <p><?php echo $datos->usuario->ciudad; ?></p>
                                    </div>

                                    <hr class="my-4">

                                    <div>
                                        <img src="https://colombia.payu.com/wp-content/themes/global-website/assets/src/images/payu-logo.svg" alt="">
                                        <img src="https://www.pse.com.co/image/layout_icon?img_id=1202326" alt="">
                                    </div><br><br>

                                    <div class="row gy-3">
                                        <div class="col-md-12">

                                            <input type="hidden" name="id_usuario" value="<?php echo $datos->usuario->id_usuarios; ?>">
                                            <input type="hidden" id="fechaVenta" name="fecha" value="">
                                            <input type="hidden" name="total" value="<?php echo calcularTotal($datos->carrito); ?>">

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" class="form-label">Banco</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="banco">
                                                    <?php foreach ($datos->banks->bank as $banco) : ?>
                                                        <option value="<?php echo $banco->pseCode; ?>"><?php echo $banco->description; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="titular">Nombre titular</label>
                                                <input type="text" name="titular" class="form-control" id="titular" placeholder="Nombre" value="<?php echo $datos->usuario->nombre; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo-cliente" class="form-label">Tipo cliente</label>
                                                <select class="form-control" id="tipo-cliente" name="tipo-cliente" required>
                                                    <option>select</option>
                                                    <option value="NA">Persona natural</option>
                                                    <option value="JU">Persona jurídica</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo-documento" class="form-label">Tipo documento</label>
                                                <select class="form-control" id="tipo-documento" name="tipo-documento" required>
                                                    <option value="--">select</option>
                                                    <option value="CC">Cédula</option>
                                                    <option value="CE">Cédula de extranjeria</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="no-documento">No. documento</label>
                                                <input type="number" name="no-documento" class="form-control" id="no-documento" placeholder="No. documento" value="<?php echo $datos->usuario->cedula; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="telefono">Telefono</label>
                                                <input type="number" name="telefono" class="form-control" id="telefono" placeholder="Telefono" value="<?php echo $datos->usuario->telefono; ?>" required>
                                            </div>

                                        </div>

                                        <div class="col-md-12 mt-5">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="same-address" required>
                                                <label class="form-check-label" for="same-address">
                                                    Aceptar <a href="">termino y condiciones</a>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <hr class="my-4">

                                    <button class="w-100 btn btn-primary btn-lg" type="submit">Pagar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mostrarNotificacion(); ?>

<script>
    const fechaHoy = new Date();
    const fechaVenta = new Date(fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() + 1) + "-" + fechaHoy.getDate());
    document.querySelector('#fechaVenta').value = fechaHoy.getFullYear() + "-" + (fechaHoy.getMonth() + 1) + "-" + fechaHoy.getDate();
    console.log(fechaVenta);
</script>