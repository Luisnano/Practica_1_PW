<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_asig = ['tema_edit'];
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}
?>


<?php
if (isset($_POST['anadir'])) {

  $pregunta = $_POST['pregunta'];
  $r1 = $_POST['r1'];
  $r2 = $_POST['r2'];
  $r3 = $_POST['r3'];
  $r4 = $_POST['r4'];
  $correcta = $_POST['correcta'];


  $anadirpregunta = "INSERT INTO pregunta (id_asignatura,texto_pregunta,r1,r2,r3,r4,correcta,tema) VALUES (?,?,?,?,?,?,?,?)";
  $connection->prepare($insercion)->execute([$id_asig_edit,$pregunta,$r1,$r2,$r3,$r4,$correcta,$tema_asig]);

  $consultapregunta = "SELECT texto_pregunta FROM pregunta";

  header("Location: mensaje_anadido_exito.php");
}
?>
<section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="form-group mt-3">
                <textarea class="form-control" name="pregunta" rows="2" placeholder="Pregunta" required></textarea>
              </div>
              <div class="row">
                <div class="col-md-8 form-group">
                  <input type="text" name="r1" class="form-control" id="r1" placeholder="Respuesta 1" required>
                  <input type="text" name="r2" class="form-control" id="r2" placeholder="Respuesta 2" required>
                  <input type="text" name="r3" class="form-control" id="r3" placeholder="Respuesta 3" required>
                  <input type="text" name="r4" class="form-control" id="r4" placeholder="Respuesta 4" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="correcta" id="correcta" placeholder="Respuesta Correcta (Solo la primera palabra)" required>
              </div>
            
              <div class="my-3">
                <div class="error-message"></div>
                <div class="sent-message">Pregunta añadida con Éxito!</div>
              </div>
              <div class="text-center"><button name="anadir" value="anadir" type="submit">Añadir</button></div>
            </form>

          </div>
      </div>
</section>