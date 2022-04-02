<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_asig = $_SESSION['tema_edit'];
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}

if (isset($_POST['anadir'])) {

  $pregunta = $_POST['pregunta'];
  $r1 = $_POST['r1'];
  $r2 = $_POST['r2'];
  $r3 = $_POST['r3'];
  $r4 = $_POST['r4'];
  $correcta = $_POST['correcta'];

  //Insertamos pregunta en la BD.
  $anadirpregunta = "INSERT INTO pregunta (id_asignatura,texto_pregunta,r1,r2,r3,r4,correcta,tema) VALUES (:id_asignatura,:texto_pregunta,:r1,:r2,:r3,:r4,:correcta,:tema)";
  $anadirpregunta = $connection->prepare($anadirpregunta);
      
  $anadirpregunta->bindParam(':id_asignatura',$id_asig_edit,PDO::PARAM_INT, 5);
  $anadirpregunta->bindParam(':texto_pregunta',$pregunta,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':r1',$r1,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':r2',$r2,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':r3',$r3,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':r4',$r4,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':correcta',$correcta,PDO::PARAM_STR);
  $anadirpregunta->bindParam(':tema',$tema_asig,PDO::PARAM_STR);
      
  $anadirpregunta->execute();
  header("Location: mensaje_anadido_exito.php");
}
?>
<br></br><br></br>
<div class="d-flex justify-content-center">
    <h2>Añadir pregunta sobre <?php echo $tema_asig ?></h2>
</div>
<section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
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
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Añadir">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>