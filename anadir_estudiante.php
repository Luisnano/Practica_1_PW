<?php 
include('assets/headers/header_admin.php');
include('config.php');

$idEstudianteEdit= $_SESSION['id_estudiante_edit'];

if (isset($_POST['anadir'])) {

  $pregunta = $_POST['pregunta'];
  $r1 = $_POST['r1'];
  $r2 = $_POST['r2'];
  $r3 = $_POST['r3'];
  $r4 = $_POST['r4'];
  $correcta = $_POST['correcta'];

  //Insertamos estudiante en la BD.
  $anadirEstudiante = "INSERT INTO estudiante (user_alum,nombre_estudiante,apellido_estudiante,contraseña_estudiante) VALUES (:user_alum,:nombre_estudiante,:apellido_estudiante,:contraseña_estudiante)";
  $anadirEstudiante = $connection->prepare($anadirEstudiante);
      
  $anadirEstudiante->bindParam(':user_alum',$userAlum,PDO::PARAM_INT, 5);
  $anadirEstudiante->bindParam(':nombre_estudiante',$nombreEstudiante,PDO::PARAM_STR);
  $anadirEstudiante->bindParam(':apellido_estudiante',$apellidoEstudiante,PDO::PARAM_STR);
  $anadirEstudiante->bindParam(':contraseña_estudiante',$contraseñaEstudiante,PDO::PARAM_STR);
      
  $anadirEstudiante->execute();
  header("Location: mensaje_anadido_exito.php");
}
?>
<br></br><br></br>
<div class="d-flex justify-content-center">
    <h2>Añadir estudiante a la BD</h2>
</div>
<section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
                <div class="col-md-12 form-group">
                  <input type="text" name="r1" class="form-control" id="r1" placeholder="Nombre" required>
                  <input type="text" name="r2" class="form-control" id="r2" placeholder="Apellidos" required>
                  <input type="text" name="r3" class="form-control" id="r3" placeholder="Username" required>
                  <input type="text" name="r4" class="form-control" id="r4" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="correcta" id="correcta" placeholder="Respuesta Correcta (Solo la primera palabra)" required>
              </div>
            
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Añadir">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>