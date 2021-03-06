<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SUC</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->

	<link rel="stylesheet" type="text/css" href="css/login.css">
	<?php
		if (isset($_GET['error'])) {
			echo "<script> alert('¡Por favor inicia sesión!'); </script>";
		}
		session_start();
		if (isset($_SESSION['user'])) {
			if ($_SESSION['permisos'] == 1) {
				header("Location: views/Administrator/index.php");
			}
			elseif ($_SESSION['permisos'] == 2) {
				header("Location: views/Profesor/index.php");
			}
		}
	?>
</head>
<body>
	<div class="container" id="content">
		<div id="login" class="modal" role="dialog" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1>Bienvenido<br><small>Sistema Único de Calificaciones</small></h1>
					</div>
					<div class="modal-body">
						<?php if(isset($_GET['errorCredenciales'])){ ?>
						<div class="alert alert-danger col-md-12">
							<button class="close" data-dismiss="alert"><span>&times;</span></button>
							¡Verifique sus credenciales!
						</div>
						<?php } ?>
						<form class="form" action="model/login.php" method="POST">
					  		<div class="form-group">
					    		<label class="sr-only" for="inputUser">Usuario</label><br>
					    		<input type="number" class="form-control" id="inputUser" name="user"placeholder="Usuario">
					  		</div>
					  		<div class="form-group">
					   		 	<label class="sr-only" for="inputPassword">Contraseña</label>
					    		<input type="password" class="form-control" id="inputPassword" name="password" placeholder="Contraseña">
					  		</div>
					  		<br/>

					</div>
					<div class="modal-footer">
							<button type="submit" class="btn btn-primary pull-right" id="btnEntrar">Entrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/login.js"></script>
</body>
</html>
