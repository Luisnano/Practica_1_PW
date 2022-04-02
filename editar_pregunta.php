<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_asig = $_SESSION['tema_edit'];
$id_pregunta_edit = $_SESSION['id_pregunta_edit'];

$datosPregunta = $connection->prepare("SELECT * FROM pregunta WHERE id_pregunta=$id_pregunta_edit");
$datosPregunta->execute();
$datosPregunta = $datosPregunta->fetch(PDO::FETCH_ASSOC);

$pregunta = $datosPregunta['texto_pregunta'];
$r1 = $datosPregunta['r1'];
$r2 = $datosPregunta['r2'];
$r3 = $datosPregunta['r3'];
$r4 = $datosPregunta['r4'];
$correcta = $datosPregunta['correcta'];

if (isset($_POST['anadir'])) {

  $pregunta = $_POST['pregunta'];
  $r1 = $_POST['r1'];
  $r2 = $_POST['r2'];
  $r3 = $_POST['r3'];
  $r4 = $_POST['r4'];
  $correcta = $_POST['correcta'];

  //Insertamos pregunta en la BD.
  $anadirpregunta = "UPDATE pregunta SET texto_pregunta= '$pregunta', r1= '$r1', r2= '$r2', r3= '$r3', r4= '$r4', correcta = '$correcta' WHERE id_pregunta = $id_pregunta_edit";
  $anadirpregunta = $connection->prepare($anadirpregunta);
  $anadirpregunta->execute();
  header("Location: mensaje_anadido_exito.php");
  
}

?>
<div class="d-flex justify-content-center">
    <h2>Editar pregunta sobre <?php echo $tema_edit ?></h2>
</div>
<section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
              <div class="form-group mt-3">
                <textarea class="form-control" name="pregunta" rows="2" required><?php echo $pregunta?></textarea>
              </div>
              <div class="row">
                <div class="col-md-8 form-group">
                  <input type="text" name="r1" class="form-control" id="r1" value="<?php echo $r1?>" required>
                  <input type="text" name="r2" class="form-control" id="r2" value="<?php echo $r2?>" required>
                  <input type="text" name="r3" class="form-control" id="r3" value="<?php echo $r3 ?>" required>
                  <input type="text" name="r4" class="form-control" id="r4" value="<?php echo $r4 ?>" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="correcta" id="correcta" value="<?php echo $correcta?>" required>
              </div>
            
              <div class="my-3">
                <div class="error-message"></div>
                <div class="sent-message">Pregunta añadida con Éxito!</div>
              </div>
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Actualizar">
                  <a href="index.html" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>