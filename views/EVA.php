<?php  
	$grupo = $_GET['grupo'];
	$materia = $_GET['materia'];
	$unidad = $_GET['unidad'];
	require_once("../model/DAOeva.php");
	$db = new DAOeva();
	$alumnos = $db->getAlumnosPorGrupo($grupo);
?>
<div class="table-responsive">
	<table class="table table-condensed table-striped table-hover">
		<thead>
			<tr>
				<th>Matrícula</th>
				<th>Nombre</th>
				<th>Saber</th>
				<th>Saber Hacer</th>
				<th>Ser</th>
				<th>Asistencia</th>
				<th>Calificación Final</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($alumnos as $alumno): 
				$asistencia = $db->getAsistencia($alumno->matricula, $unidad, $materia);
				$asistenciaTotal = $db->getAsistenciaTotal($alumno->matricula, $unidad, $materia);
				$porcentajeAsist = round($asistencia[0]->parcial / $asistenciaTotal[0]->TOTAL * 100);
			?>
				<tr>
					<th><?php echo $alumno->matricula ?></th>
					<th><?php echo strtoupper($alumno->paterno . " " . $alumno->materno . " " . $alumno->nombres) ?></th>
					<th><input type="number" max="100" id="saber"></th>
					<th><input type="number" max="100"></th>
					<th><input type="number" max="100"></th>
					<th><?php echo $porcentajeAsist . "%" ?></th>
					<th><p></p></th>
			<script>
				$( "input" )
					.keyup(function() {
    				var value = $( this ).val();
    				$( "p" ).text( value );
  				})
				.keyup();
			</script>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>