<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo ROUTE_URL; ?>assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="<?php echo ROUTE_URL; ?>assets/css/sleek.css" />
    <link rel="stylesheet" href="<?php echo ROUTE_URL; ?>assets/css/main.css" />
    <!-- FAVICON -->
    <link href="<?php echo ROUTE_URL; ?>assets/img/favicon.png" rel="shortcut icon" />
    <script src="<?php echo ROUTE_URL; ?>assets/plugins/nprogress/nprogress.js"></script>
</head>

<div class="container d-flex flex-column justify-content-between vh-100">
    <div class="row justify-content-center mt-5">
        <div class="col-xl-5 col-lg-6 col-md-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <div class="app-brand">
                        <a href="/index.html">
                            <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                                <g fill="none" fill-rule="evenodd">
                                    <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                                    <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                                </g>
                            </svg>
                            <span class="brand-name">Registrarse</span>
                        </a>
                    </div>
                </div>
                <div class="card-body p-5">
                    <form action="<?php echo ROUTE_URL ?>?clase=usuario&metodo=register" method="POST" >
                        <label for="tipo_doc">Tipo de documento *</label>
                        <select class="form-control" name="tipo_doc" id="#" required>
                            <option value="">--Select--</option>
                            <option value="CC">Cedula ciudadana</option>
                            <option value="TI">Tarjeta de identidad</option>
                            <option value="PPE">Pasaparte Extranjero</option>
                        </select>
                        <label for="cedula">Numero de documento *</label>
                        <div class="form-group ">
                            <input class="form-control cedula" type="number" name="cedula" required>
                        </div>
                        <label for="nombre">nombre *</label>
                        <input class="form-control nombre" type="text" name="nombre" required>
                        <label for="apellido">apellido *</label>
                        <input class="form-control" type="text" name="apellido" required>
                        <label for="fecha_nmto">fecha_nmto *</label>
                        <input class="form-control" type="date" name="fecha_nmto" required>
                        <label for="telefono">telefono *</label>
                        <input class="form-control" type="tel" name="telefono"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}"  required>
                        <label for="correo">correo *</label>
                        <input class="form-control" type="email" name="correo" required>
                        <label for="genero">genero *</label>
                        <select class="form-control" name="genero" id="#" required>
                            <option value="">--Select--</option>
                            <option value="male">masculino</option>
                            <option value="female">femenino</option>
                        </select>
                        <label for="password">contraseña (6 digitos)*</label>
                        <input class="form-control" type="password" name="password" id="password" pattern=".{6,}" required>
                        <label for="password">confirmar contraseña *</label>
                        <input class="form-control" type="password" name="passwordCn" id="password2" pattern=".{6,}" required>

                        <label for="direccion">direccion *</label>
                        <input class="form-control" type="text-area" name="direccion" required>
                        <label for="ciudad">Ciudad *</label>
                        <select class="form-control" name="ciudad" id="#" required>
                            <option value="">--Select--</option>
                            <option value="7600">cali</option>
                        </select>
                        <label for="submit"></label>
                        <button name="submit" type="submit" class="btn btn-lg btn-primary btn-block mb-4 disable">Registrar</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="copyright pl-0">
        <p>
            &copy; <span id="copy-year">2019</span> Copyright Takeshop
        </p>
    </div>
    <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
    </script>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/toaster/toastr.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/charts/Chart.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/ladda/spin.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/ladda/ladda.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/daterangepicker/moment.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/plugins/jekyll-search.min.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/sleek.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/chart.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/date-range.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/map.js"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/custom.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?php echo ROUTE_URL; ?>assets/js/main.js"></script>
<?php mostrarNotificacion(); ?>