﻿<?php  
	$grupo = $_GET['grupo'];
	include_once("../model/DAOgrupo.php");
	$db = new DAOgrupo();
	$db->deleteGrupo($grupo);
?>
<div class="alert alert-success col-md-10">
	<button class="close" data-dismiss="alert"><span>&times;</span></button>
	Se eliminó correctamente la materia.
</div>