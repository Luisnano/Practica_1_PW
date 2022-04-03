<?php 
include('assets/headers/header_admin.php');
include('config.php');

$idEstudianteEdit= $_SESSION['id_estudiante_edit'];

if (isset($_POST['anadir'])) {

  $userAlum = $_POST['nombre'];
  $nombreEstudiante = $_POST['apellidos'];
  $apellidoEstudiante = $_POST['username'];
  $contraseñaEstudiante = password_hash($_POST['password'], PASSWORD_DEFAULT);

  //Insertamos estudiante en la BD.
  $anadirEstudiante = "INSERT INTO estudiante (user_alum,nombre_estudiante,apellido_estudiante,contraseña_estudiante) VALUES (:user_alum,:nombre_estudiante,:apellido_estudiante,:contraseña_estudiante)";
  $anadirEstudiante = $connection->prepare($anadirEstudiante);
      
  $anadirEstudiante->bindParam(':user_alum',$userAlum,PDO::PARAM_INT, 5);
  $anadirEstudiante->bindParam(':nombre_estudiante',$nombreEstudiante,PDO::PARAM_STR);
  $anadirEstudiante->bindParam(':apellido_estudiante',$apellidoEstudiante,PDO::PARAM_STR);
  $anadirEstudiante->bindParam(':contraseña_estudiante',$contraseñaEstudiante,PDO::PARAM_STR);
      
  $anadirEstudiante->execute();
  header("Location: listado_estudantes.php");
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
                  <input type="text" name="r1" class="form-control" id="nombre" placeholder="Nombre" required>
                  <input type="text" name="r2" class="form-control" id="apellidos" placeholder="Apellidos" required>
                  <input type="text" name="r3" class="form-control" id="username" placeholder="Username" required>
                  <input type="password" name="r4" class="form-control" id="password" placeholder="Contraseña" required>
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