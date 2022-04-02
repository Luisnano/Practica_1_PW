<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_asig = $_SESSION['tema_edit'];
$id_pregunta_edit = $_SESSION['id_pregunta_edit'];

$datosPregunta = $connection->prepare("DELETE FROM pregunta WHERE id_pregunta=$id_pregunta_edit");
$datosPregunta->execute();
header("Location: listado_preguntas_tema.php");

?>