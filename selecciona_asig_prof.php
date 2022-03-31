<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];

$asig_impartidas = "SELECT id_asignatura,nombre FROM asignatura WHERE id_asignatura = (SELECT id_asignatura FROM profesor WHERE id_profesor = $id_prof) ";
$num_asig_recientes = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $_SESSION['id_asig_edit']= $_POST['id_asig'];
  header("Location: selecciona_tema_prof.php");
  die();
}
?>
<br></br>

<section id="asignatura" class="pricing">
  <div class="container">
    
    <div class="d-flex justify-content-center">
      <h2>Tus Asignaturas Recientes</h2>
    </div>
    <br></br>
    <div class="row">
      <?php     
      foreach($connection->query($asig_impartidas) as $datos){
        if($num_asig_recientes < 4){  
      ?>
      <div class="col-lg-3 col-md-6">
        <div class="box">
          <h3><?php echo $datos['nombre']?></h3>
          <div class="btn-wrap">
          <form action="" method="post" class="php-email-form">
            <button class="btn btn-danger" name="id_asig" value="<?php echo $datos['id_asignatura']?>" type="submit">Seleccionar</button>
          </form>
          </div>
        </div>
      </div>
      <?php  
          $num_asig_recientes++; 
          }  
        }
      ?>
    </div>
      
<br></br>

  <div class="d-flex justify-content-center">
    <div class="form">
      <form action="" method="post">
          <div class="form-group"> 
            <h2>¿Cuál de tus Asignaturas quieres editar?</h2>
            <br></br>
            <div class="content-select" style="text-align:center;">
              <select class="select" name="id_asig" required>
                <option value="">Seleccione una Asignatura</option>
                <?php     
                  foreach($connection->query($asig_impartidas) as $datos)
                  {
                ?>
                  <option name="id_asig" value="<?php echo $datos['id_asignatura']?>"> <?php echo $datos['nombre']?> </option>
                <?php    
                  }
                ?>
              </select>
            </div>
          </div>

  <br></br>

        <div style="text-align:center;">
            <input type="submit" name="asignatura" class="btn btn-danger" value="Seleccionar">
            <a href="index.html" id="boton"  class="btn btn-warning">Cancelar</a>                   
        </div>
      </form>
    </div> 
  </div>   
</section>
</body>
</html>