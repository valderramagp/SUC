	<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SUC: Sistema Único de Calificaciones - Materias</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php require_once("../../model/SesionAdministrador.php"); ?> <!--Control de sesiones-->

	<!-----------------------Recursos de Bootstrap-------------------------->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<script type="text/javascript" charset="UTF-8" src="../../js/jquery.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/scripts.js"></script>
	<!--------------------------Fin recursos de bootstrap-------------------------->


	<!----------------------------------------Recursos para filtros de tablas ------------------------------------------>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="../../js/jquery.dataTables.js"></script>
	<script src="../../js/dataTableGM.js"></script>
	<!----------------------------------------Fin Recursos filtros de tablas ------------------------------------------>

	<?php
		require_once("../../model/DAOgm.php"); //DAO de acceso a bd
		$db = new DAOgm();
		$list = $db -> getGmInfo(); //obtener toda la información sobre la asignatura
	?>

</head>
<body>
	<?php require_once("Menu.php") ?>
	<div class="container">

		<!-----------Mensaje de exito en eliminar-------------->
		<div id="deleteMessage"></div>

		<!-----------Mensaje de exito-------------->
		<?php if (isset($_GET['success'])) { ?>
		<div class="alert alert-success col-md-10">
			<button class="close" data-dismiss="alert"><span>&times;</span></button>
			Se asignó correctamente la materia
		</div>
		<?php } ?>

		<a href="AsignaturasFrm.php" class="btn btn-primary pull-right">Agregar</a>
		<div class="clearfix"></div>
		<div class="col-md-8">
			<div class="table-responsive">
				<table class="table table-condensed table-striped table-hover" id="tblGM">
					<thead>
						<tr>
							<th></th>
							<th>Grupo</th>
							<th>Materia</th>
							<th>Profesor</th>
						</tr>
					</thead>
					<tbody>
						<?php
							if(!empty($list)) {
								foreach ($list as $row) { ?>
						<tr>
							<th>
								<a id="btnSelect" onclick="getInfoAssignment(<?php echo $row->id ?>)">
									<img src="../../image/icons/select.png"
										onmouseover="this.src='../../image/icons/select-onclick.png'"
										onmouseout="this.src='../../image/icons/select.png'">
								</a>
							</th>
							<th><?php echo $row->grupo; ?></th>
							<th><?php echo $row->descripcion ?></th>
							<th><?php echo $row->paterno . " " . $row->materno . " " . $row->nombres; ?></th>
						</tr>
						<?php
								}
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<div class="col-md-4">
			<div class="panel" id="paneldias"></div>
		</div>
	</div>
	<script src="../../model/asignaturas.js"></script>
</body>
</html>
