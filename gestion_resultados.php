<?php 
include('assets/headers/header_prof.php');
include('config.php');
include('actualiza_matricula.php');

$id_prof = $_SESSION['id'];

$datosAsignatura = $connection->prepare("SELECT * FROM asignatura WHERE id_asignatura= (SELECT id_asignatura FROM profesor WHERE id_profesor = $id_prof)");
$datosAsignatura->execute();
$datosAsignatura = $datosAsignatura->fetch(PDO::FETCH_ASSOC);

$id_asignatura = $datosAsignatura['id_asignatura'];

$notaMediaAsignatura = $porcentajeAprobados = $numeroMatriculados = $numeroSobresalientes = $numeroNotables = $numeroSuspensos = 0;

foreach($connection->query("SELECT * FROM matricula WHERE id_asignatura = $id_asignatura") as $matricula){
    $numeroMatriculados++;
    $notaMediaAsignatura = $notaMediaAsignatura + $matricula['nota_final'];
    if($matricula['nota_final'] >= 5){
        $porcentajeAprobados++;
    }
    if($matricula['nota_final'] >= 9){
        $numeroSobresalientes++;
    }
    if($matricula['nota_final'] >= 7){
        $numeroNotables++;
    }
}

$notaMediaAsignatura = $notaMediaAsignatura/$numeroMatriculados;
$numeroSuspensos = $numeroMatriculados - $porcentajeAprobados;
$porcentajeAprobados = ($porcentajeAprobados/$numeroMatriculados) * 100;


?>

<br></br>
<section id="services" class="services">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="icon-box">
            <i class="bi bi-pencil-square"></i>
            <h4>Estadísticas Generales de <?php echo $datosAsignatura['nombre'] ?></h4>
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li>Número de Matriculados: <?php echo $numeroMatriculados?></li>
                        <li>Nota Media:  <?php echo number_format($notaMediaAsignatura,2);?></li>
                        <li>Número de Sobresalientes:  <?php echo $numeroSobresalientes?></li>
                        <li>Número de Notables:  <?php echo $numeroNotables?></li>
                        <li>Número de Suspensos:  <?php echo $numeroSuspensos?></li>
                        <li>Porcentaje de Aprobados:  <?php echo number_format($porcentajeAprobados,1)?>%</li>
                     
                    </ul>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="icon-box">
          <i class="bi bi-card-checklist"></i>
          <h4>Resultados Individuales</h4>
          <div class="row">
                <div class="col-md-12">
                    <ul>
                    <?php 
                        foreach($connection->query("SELECT id_estudiante FROM matricula WHERE id_asignatura = $id_asignatura") as $idEstudiante){
                           
                            $idEstudianteActual = $idEstudiante['id_estudiante'];
                            
                            $datosEstudianteActual = $connection->prepare("SELECT * FROM estudiante WHERE id_estudiante = $idEstudianteActual");
                            $datosEstudianteActual->execute();
                            $datosEstudianteActual = $datosEstudianteActual->fetch(PDO::FETCH_ASSOC);
                            
                            $datosMatriculaEstudiante = $connection->prepare("SELECT nota_final FROM matricula WHERE id_estudiante = $idEstudianteActual AND id_asignatura = $id_asignatura");
                            $datosMatriculaEstudiante->execute();
                            $datosMatriculaEstudiante = $datosMatriculaEstudiante->fetch(PDO::FETCH_ASSOC);

                            $datosExamenEstudiante = $connection->prepare("SELECT nota_examen FROM examen WHERE id_examen = (SELECT MAX(id_examen) FROM examen WHERE id_alumno = $idEstudianteActual AND id_asignatura = $id_asignatura)");
                            $datosExamenEstudiante->execute();
                            $datosExamenEstudiante = $datosExamenEstudiante->fetch(PDO::FETCH_ASSOC);
                            
                    ?>
                        <li><?php echo $datosEstudianteActual['apellido_estudiante']?>, <?php echo $datosEstudianteActual['nombre_estudiante']?> -> Nota Media: <?php echo $datosMatriculaEstudiante['nota_final']?> || Nota Último Exámen: <?php echo $datosExamenEstudiante['nota_examen']?></li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
      </div>
</section>
</body>
</html>