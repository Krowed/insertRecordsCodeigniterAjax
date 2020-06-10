<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Usuarios</title>

	<!-- CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/alertify/css/alertify.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/alertify/css/themes/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/waitMe/waitMe.min.css') ?>">

	<!-- JS -->
	<script src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/alertify/alertify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/waitMe/waitMe.min.js') ?>"></script>
</head>
<body>


	<div class="container mt-5">
		<div class="row">
			<div class="col-md-3">
				<h3 class="font-weight-bold">Registro nuevo</h3>
				<form id="form_adduser" action="">
					<div class="form-group">
						<label for="nombre" class="col-form-label col-form-label-sm">Nombre:</label>
						<input type="text" id="nombre" class="form-control form-control-sm" name="nombre">
						<div class="invalid-feedback">Espera, el nombre  no debe estar vacío</div>
					</div>

					<div class="form-group">
						<label for="email" class="col-form-label col-form-label-sm">E-mail:</label>
						<input type="text" id="email" class="form-control form-control-sm" name="email">
						<div class="invalid-feedback">Espera, el correo no debe estar vacío</div>
					</div>

					<div class="form-group">
						<label for="telefono" class="col-form-label col-form-label-sm">Teléfono:</label>
						<input type="text" id="telefono" class="form-control form-control-sm" name="telefono">
						<div class="invalid-feedback">Espera, el teléfno no debe estar vacío</div>
					</div>

					<div class="form-group">
						<button class="btn btn-sm btn-success float-right btn_adduser">Agregar</button>
					</div>
				</form>
			</div>


			<div id="wrapper" class="col-md-8 offset-md-1">
				<h3 class="font-weight-bold">Lista de usuarios</h3>
				<table class="table table-sm table-bordered mt-4">
					<thead class="text-center">
						<tr>
							<th>Código</th>
							<th>Nombre</th>
							<th>E-mail</th>
							<th>Teléfono</th>
						</tr>
					</thead>

					<tbody id="tbody" class="text-center"></tbody>
				</table>
			</div>
		</div>
	</div>

<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
</body>
</html>