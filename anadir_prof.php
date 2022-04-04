<?php 
include('assets/headers/header_admin.php');
include('config.php');

if (isset($_POST['anadir'])) {

  $userProf = $_POST['username'];
  $nombreProf = $_POST['nombre'];
  $esCoordinador = 0;
  $contrasenaprof = $_POST['password'];
  $idAsignatura = $_POST['id_asig'];
  $contrasenaprof = password_hash($contrasenaprof, PASSWORD_DEFAULT);

  //Insertamos estudiante en la BD.
  try {
  $anadirProf = "INSERT INTO profesor (user_prof,id_asignatura,es_coordinador,nombre_profesor,contraseña_profesor) VALUES (:user_prof,:id_asignatura,:es_coordinador,:nombre_profesor,:contrasena_profesor)";
  $anadirProf = $connection->prepare($anadirProf);
      
  $anadirProf->bindParam(':user_prof',$userProf,PDO::PARAM_STR);
  $anadirProf->bindParam(':id_asignatura',$idAsignatura,PDO::PARAM_INT,5);
  $anadirProf->bindParam(':es_coordinador',$esCoordinador,PDO::PARAM_BOOL);
  $anadirProf->bindParam(':nombre_profesor',$nombreProf,PDO::PARAM_STR);
  $anadirProf->bindParam(':contrasena_profesor',$contrasenaprof,PDO::PARAM_STR);
      
  $anadirProf->execute();
} catch (PDOException $Exception) {
    ?> <br></br><br></br> <h2><?php echo "Mensaje de Error: " . $Exception->getMessage();?></h2>  <?php 
    }
    
  header("Location: listado_prof.php");
}
?>
<br></br><br></br>
<div class="d-flex justify-content-center">
    <h2>Añadir Profesor a la BD</h2>
</div>
<section id="contact" class="contact">
      <div class="container">
        <div class="row mt-5">
            <form action="" method="post" class="php-email-form">
                <div class="col-md-12 form-group">
                  <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre Completo" required>
                  <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" required>
                </div>
              </div>
              <div class="d-flex justify-content-center">
    
    <div class="form">
          <div class="form-group"> 
            <h2>¿Qué Asignatura imparte este Profesor?</h2>
            <br></br>
            <div class="content-select" style="text-align:center;">
              <select class="select" name="id_asig" required>
                <option value="">Seleccione una Asignatura</option>
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
                  <input type="submit" name="anadir" class="btn btn-danger" value="Añadir">
                  <a href="listado_preguntas_tema.php" id="boton"  class="btn btn-warning">Cancelar</a>                   
              </div>
          </div>
      </div>
</section>