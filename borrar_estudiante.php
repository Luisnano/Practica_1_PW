<?php 
include('assets/headers/header_prof.php');
include('config.php');
$idEstudiante = $_SESSION['id_estudiante_edit'];

$datosPregunta = $connection->prepare("DELETE FROM estudiante WHERE id_estudiante=$idEstudiante");
$datosPregunta->execute();
header("Location: listado_estudiantes.php");

?>