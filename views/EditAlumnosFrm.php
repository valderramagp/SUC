﻿<!DOCTYPE html>
<html>
<head>
	<meta charset="en">
	<title>SUC: Sistema Único de Calificaciones</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php 
		$matricula = $_GET['matricula'];
		include_once("../model/DAOalum.php"); 
		$db = new DAOalum();
		$row = $db->GetAlumnoByMatricula($matricula);
		$carreras = $db->getCarreras();		
	?>
</head>
<body>
	<?php include_once("menu.html") ?>
	<div class="container">
		<h1>Editar alumno</h1>
		<form action="" method="POST" class="form-horizontal">
			<div class="form-group">
				<input type="text" id="nombres" name="nombres" class="form-control" placeholder="<?php echo $row[0]->nombres ?>">
				<br>
				<input type="text" id="paterno" name="paterno" class="form-control" placeholder="<?php echo $row[0]->paterno ?>">
				<br>
				<input type="text" id="materno" name="materno" class="form-control" placeholder="<?php echo $row[0]->materno ?>">
				<br>
				<select name="carrera" id="carrera" class="form-control" onchange="getGrupo(value)">
				<option value="0">Seleccione una carrera</option>
					<?php 
					if(!empty($carreras)){	
						foreach ($carreras as $carrera) {
							echo "<option value='$carrera->codigo'>$carrera->descripcion</option>";
						}
					}
					?>
			</select>	
				<div id="Part2"></div>
			</div>	
		</form>
	</div>
<script type="text/javascript" charset="UTF-8" src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/scripts.js"></script>
<script src="../model/alum-ajax.js"></script>
</body>
</html>