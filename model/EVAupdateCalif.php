<?php 
	require_once("DAOeva.php");
	$bdCalif = new DAOeva();	

	$alumno = $_POST["alumno"];
	$materia = $_POST['materia'];
	$unidad = $_POST["unidad"];
	$saber = $_POST["saber"];
	$hacer = $_POST["hacer"];
	$ser = $_POST["ser"];
	$total = $_POST["total"];
	$am = $_POST["am"];
	$bdCalif->updateCalif($alumno, $materia, $unidad, $saber, $hacer, $ser, $total, $am);
?>
<div class="alert alert-warning col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se actualizó correctamente la calificación del alumno <b><?php echo $alumno; ?></b>
</div>