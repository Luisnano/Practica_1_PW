<?php 
include('assets/headers/header_admin.php');
include('config.php');

$idProf = $_SESSION['id_prof_edit'];

$datosProf = $connection->prepare("SELECT * FROM profesor WHERE id_profesor=$idProf");
$datosProf->execute();
$datosProf = $datosProf->fetch(PDO::FETCH_ASSOC);

$userProf = $datosProf['user_prof'];
$nombreProf = $datosProf['nombre_profesor'];
$idAsignatura = $datosProf['id_asignatura'];
$contrasenaprof = $datosProf['contraseña_profesor'];

$datosAsig = $connection->prepare("SELECT nombre FROM asignatura WHERE id_asignatura=$idAsignatura");
$datosAsig->execute();
$datosAsig = $datosAsig->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['anadir'])) {

    $userProf = $_POST['username'];
    $nombreProf = $_POST['nombre'];
    $esCoordinador = 0;
    $contrasenaprof = $_POST['password'];
    $idAsignatura = $_POST['id_asig'];
    $contrasenaprof = password_hash($contrasenaprof, PASSWORD_DEFAULT);

  //Insertamos estudiante en la BD.
  $editarProf = "UPDATE profesor SET user_prof = '$userProf', nombre_profesor = '$nombreProf', id_asignatura= $idAsignatura, contraseña_profesor = '$contrasenaProf' WHERE id_profesor = $idProf";
  $editarProf = $connection->prepare($editarProf);
  $editarProf->execute();

  header("Location: listado_prof.php");
}
?>
<br></br><br></br>
<div class="d-flex justify-content-center">
    <h2>Editar Profesor de la BD</h2>
</div>
<section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
                <div class="col-md-12 form-group">
                  <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $nombreProf?>" required>
                  <input type="text" name="username" class="form-control" id="username" value="<?php echo $userProf?>" required>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Nueva contraseña (No escribir nada si desea mantener la anterior)">
                </div>
              </div>
              <div class="form">
          <div class="form-group"> 
            <h2>¿Qué Asignatura imparte este Profesor?</h2>
            <br></br>
            <div class="content-select" style="text-align:center;">
              <select class="select" name="id_asig" required>
                <option value="<?php echo $datosProf['id_asignatura']?>">Mantener <?php echo $datosAsig['nombre']?></option>
                <?php     
                  foreach($connection->query("SELECT * FROM asignatura") as $asignatura)
                  {
                ?>
                  <option name="id_asig" value="<?php echo $asignatura['id_asignatura']?>"> <?php echo $asignatura['nombre']?> </option>
                <?php    
                  }
                ?>
              </select>
            </div>
          </div>
          <br></br>
              <div style="text-align:center;">
                  <input type="submit" name="anadir" class="btn btn-danger" value="Actualizar">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
            </form>
          </div>
      </div>
</section>