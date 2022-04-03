<?php 
$notaMedia = 0;
$numeroExamenes = 0;

foreach($connection->query("SELECT * FROM estudiante") as $estudiante){

    $id_estudiante = $estudiante['id_estudiante'];
    foreach($connection->query("SELECT * FROM asignatura") as $asignatura){

        $id_asignatura = $asignatura['id_asignatura'];
        
        foreach($connection->query("SELECT * FROM examen WHERE id_alumno = $id_estudiante AND id_asignatura = $id_asignatura") as $examen){
            $numeroExamenes++;
            $notaMedia = $notaMedia + $examen['nota_examen'];
        }
        
        if($numeroExamenes > 0){
            $notaMedia = $notaMedia/$numeroExamenes;
            $actualizaMatricula = $connection->prepare("UPDATE matricula SET nota_final = $notaMedia WHERE id_estudiante = $id_estudiante AND id_asignatura = $id_asignatura");
            $actualizaMatricula->execute();
            $notaMedia = $numeroExamenes = 0;
        }
      
    }
}
?>

