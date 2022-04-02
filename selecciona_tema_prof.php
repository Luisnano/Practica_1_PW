<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];

$tema_asig = "SELECT id_asignatura,tema FROM pregunta WHERE id_asignatura = $id_asig_edit GROUP BY tema";
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}

$num_temas_recientes = 0;
?>
<br></br><br></br>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  
  $_SESSION['tema_edit']= $_POST['tema_edit'];
  header("Location: listado_preguntas_tema.php");
  die();
}
?>

<section id="pricing" class="pricing">
    <div class="container">
        <form action="selecciona_tema_prof.php" method="post">
            <div class="d-flex justify-content-center">
                <h2>Todos los Temas</h2>
            </div>

            <br></br>
            
            <div class="row">
                <?php     
                foreach($connection->query($tema_asig) as $datos){
                if($num_temas_recientes < 4){  
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="box">
                        <h3><?php echo $datos['tema']?></h3>
                        <div class="btn-wrap">
                            <form action="" method="post" class="php-email-form">
                                <button class="btn btn-danger" name="tema_edit" value="<?php echo $datos['tema']?>" type="submit">Seleccionar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php  
                    $num_temas_recientes++; 
                    }  
                }
                ?>

            </div>
        </form>

    <div class="d-flex justify-content-center">
        <div class="form">
            <form action="" method="post">
                <div class="form-group"> 
                    <h2>Elige un tema de <?php echo $nombre_asig ?></h2>
                    <br></br>
                    <div class="content-select" style="text-align:center;">
                        <select class="select" name="tema_edit" required>
                            <option value="">Seleccione un Tema</option>
                            <?php     
                                foreach($connection->query($tema_asig) as $temas)
                                {
                            ?>
                                <option name="tema_edit" value="<?php echo $temas['tema']?>"> <?php echo $temas['tema']?> </option>
                            <?php    
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <br></br>
                <div style="text-align:center;">
                    <input type="submit" name="asignatura" class="btn btn-danger" value="Seleccionar">
                    <a href="menu_profesores.php" id="boton" class="btn btn-warning">Cancelar</a>                   
                </div>
            </form>
        </div> 
    </div>   


</section>
</body>
</html>