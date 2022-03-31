<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_edit = $_SESSION['tema_edit'];

$info_preguntas = "SELECT * FROM pregunta WHERE tema = '$tema_edit'";
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}
?>

    <div class="d-flex justify-content-center">
        <h2>¡Pregunta añadida con Éxito!</h2>
        <h3>Redirigiendo a lista de preguntas...</h3>
    </div>

</body>
</html>

<script>
  setTimeout(function(){
      window.location.href="listado_preguntas_tema.php";
  }, 5000);
</script>