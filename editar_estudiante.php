<?php 
include('assets/headers/header_admin.php');
include('config.php');

$idEstudiante = $_SESSION['id_estudiante_edit'];


$datosEstudiante = $connection->prepare("SELECT * FROM estudiante WHERE id_estudiante=$idEstudiante");
$datosEstudiante->execute();
$datosEstudiante = $datosEstudiante->fetch(PDO::FETCH_ASSOC);

$userAlum = $datosEstudiante['user_alum'];
$nombreEstudiante = $datosEstudiante['nombre_estudiante'];
$apellidoEstudiante = $datosEstudiante['apellido_estudiante'];
$contrasenaEstudiante = $datosEstudiante['contraseña_estudiante'];

if (isset($_POST['anadir'])) {

  $userAlum = $_POST['username'];
  $nombreEstudiante = $_POST['nombre'];
  $apellidoEstudiante = $_POST['apellidos'];
  $contrasenaEstudiante = $_POST['password'];
  $contrasenaEstudiante = password_hash($contrasenaEstudiante, PASSWORD_DEFAULT);

  //Insertamos estudiante en la BD.
  $editarEstudiante = "UPDATE estudiante SET user_alum = '$userAlum', nombre_estudiante = '$nombreEstudiante', apellido_estudiante='$apellidoEstudiante', contraseña_estudiante = '$contrasenaEstudiante' WHERE id_estudiante = $idEstudiante";
  $editarEstudiante = $connection->prepare($editarEstudiante);
  $editarEstudiante->execute();

  header("Location: listado_estudiantes.php");
}
?>
<br></br><br></br>
<div class="d-flex justify-content-center">
    <h2>Editar estudiante de la BD</h2>
</div>
<section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
                <div class="col-md-12 form-group">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $nombreEstudiante?>" required>
                  <input type="text" name="apellidos" class="form-control" id="apellidos" value="<?php echo $apellidoEstudiante?>" required>
                  <input type="text" name="username" class="form-control" id="username" value="<?php echo $userAlum?>" required>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Nueva contraseña (No escribir nada si desea mantener la anterior)">
                </div>
              </div>
            
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Actualizar">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>