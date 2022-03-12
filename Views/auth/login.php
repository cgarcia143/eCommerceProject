<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="src/css/bootstrap.min.css" rel="stylesheet">
	<link href="src/css/datepicker3.css" rel="stylesheet">
	<link href="src/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
	<link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php mostrarNotificacion(); ?>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Take shop</div>
				<div class="panel-body">
					<form action="<?php echo ROUTE_URL ?>?clase=usuario&metodo=login" method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="correo" type="email">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password">
							</div>
							<div>
								<label>
									<p>¿No tienes una cuenta? <a href="<?php echo ROUTE_URL ?>?clase=usuario&metodo=register">Registrate aqui!</a></p>
								</label>
							</div>
							<input type="submit" class="btn btn-primary" value="Ingresar">
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<?php mostrarNotificacion(); ?>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>