<?php 
include('assets/headers/header_prof.php');
include('config.php');
$idProf = $_SESSION['id_prof_edit'];

$datosPregunta = $connection->prepare("DELETE FROM profesor WHERE id_profesor = $idProf");
$datosPregunta->execute();
header("Location: listado_prof.php");

?>