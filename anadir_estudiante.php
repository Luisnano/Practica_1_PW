<?php 
include('assets/headers/header_admin.php');
include('config.php');

if (isset($_POST['anadir'])) {

  $userAlum = $_POST['username'];
  $nombreEstudiante = $_POST['nombre'];
  $apellidoEstudiante = $_POST['apellidos'];
  $contraseñaEstudiante = $_POST['password'];
  $contraseñaEstudiante = password_hash($contraseñaEstudiante, PASSWORD_DEFAULT);

  //Insertamos estudiante en la BD.
  $anadirEstudiante = "INSERT INTO estudiante (user_alum,nombre_estudiante,apellido_estudiante,contraseña_estudiante) VALUES (:user_alum,:nombre_estudiante,:apellido_estudiante,:contrasena_estudiante)";
  $anadirEstudiante = $connection->prepare($anadirEstudiante);

  $anadirEstudiante->bindParam(':user_alum',$userAlum,PDO::PARAM_STR,50);
  $anadirEstudiante->bindParam(':nombre_estudiante',$nombreEstudiante,PDO::PARAM_STR,50);
  $anadirEstudiante->bindParam(':apellido_estudiante',$apellidoEstudiante,PDO::PARAM_STR,50);
  $anadirEstudiante->bindParam(':contrasena_estudiante',$contraseñaEstudiante,PDO::PARAM_STR,255);
  $anadirEstudiante->execute();

  
  header("Location: listado_estudiantes.php");
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
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>
                  <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos" required>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                </div>
              </div>
            
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Añadir">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>