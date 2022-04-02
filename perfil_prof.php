<?php 
include('assets/headers/header_prof.php');
include('config.php');

$nombre = $_SESSION['nombre'];
$id_prof = $_SESSION['id'];

$listaAsignaturasQuery = "SELECT * FROM asignatura WHERE id_asignatura = (SELECT id_asignatura FROM profesor WHERE id_profesor = $id_prof)";

$listaAsignaturas = $connection->prepare("SELECT * FROM asignatura WHERE id_asignatura = (SELECT id_asignatura FROM profesor WHERE id_profesor = $id_prof)");
$listaAsignaturas->execute();
$listaAsignaturas = $listaAsignaturas->fetch(PDO::FETCH_ASSOC);

$idAsignatura = $listaAsignaturas['id_asignatura'];

$nombreGrado = $connection->prepare("SELECT id_grado,nombre_grado FROM grado WHERE id_grado = 
                                        (SELECT id_grado FROM asignatura WHERE id_asignatura =  $idAsignatura)");
$nombreGrado->execute();
$nombreGrado = $nombreGrado->fetch(PDO::FETCH_ASSOC);

$idGrado = $nombreGrado['id_grado'];

$nombreCentro = $connection->prepare("SELECT nombre_centro FROM centro WHERE id_centro=(SELECT id_centro FROM grado WHERE id_grado = $idGrado)");
$nombreCentro->execute();
$nombreCentro = $nombreCentro->fetch(PDO::FETCH_ASSOC);

?>
<br></br><br></br>
<section id="about" class="about">
    <div class="container">

    <div class="row content">
        <div class="col-lg-6">
        <h2><?php echo $nombre?></h2>
        <h4>Grado: <?php echo $nombreGrado['nombre_grado']?> </h4>
        <h4>Centro: <?php echo $nombreCentro['nombre_centro']?> </h4>
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0">
        <h3>Asignaturas en Curso</h3>
        <?php foreach($connection->query($listaAsignaturasQuery) as $asignatura){ ?>
        <ul>
            <li><i class="bi bi-arrow-right"></i><?php echo $asignatura['nombre']?></li>
        </ul>
        <?php }?>
        </div>
    </div>

    </div>
    </section>