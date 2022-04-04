<?php 
include('assets/headers/header_admin.php');
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    if(isset($_POST['editar'])){
        $_SESSION['id_prof_edit'] = $_POST['editar'];
        header("Location: editar_prof.php");
    }
    if(isset($_POST['borrar'])){
        $_SESSION['id_prof_edit'] = $_POST['borrar'];
        header("Location: borrar_prof.php");
    }
}
?>
<br></br><br></br>

<div class="d-flex justify-content-center">
    <h2>Profesores Actuales en la BD</h2>
</div>
<br></br>
<div class="d-flex justify-content-center">
        <form action="anadir_prof.php" method="post" class="php-email-form">
            <button class="btn btn-danger" name="id_asig" value="" type="submit">Añadir Profesor</button>
        </form>
</div>
<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="justify-content-center entries">
                <?php foreach( $connection->query("SELECT * FROM profesor") as $profesor){ 
                    $idProfesor = $profesor['id_profesor'];
                    ?>
                    <article class="entry">
                    <h2 class="entry-title">
                        <a href=""><?php echo $profesor['nombre_profesor']?></a>
                    </h2>
                    <div class="entry-content">
                        <p>
                        <p>Asignaturas en Curso:</p>
                            <ul>
                                <?php foreach( $connection->query("SELECT * FROM asignatura WHERE id_asignatura = (SELECT id_asignatura FROM profesor WHERE id_profesor = $idProfesor)") as $asignatura){ 

                                            $idGrado = $asignatura['id_grado'];
                                            $datosGrado = $connection->prepare("SELECT * FROM grado WHERE id_grado=$idGrado");
                                            $datosGrado->execute();
                                            $datosGrado = $datosGrado->fetch(PDO::FETCH_ASSOC);

                                            $idCentro = $datosGrado['id_centro'];
                                            $datosCentro = $connection->prepare("SELECT * FROM centro WHERE id_centro=$idCentro");
                                            $datosCentro->execute();
                                            $datosCentro = $datosCentro->fetch(PDO::FETCH_ASSOC);
                                            ?>
                                            <li><?php echo $asignatura['nombre']?></li>
                                    <?php
                                        } 
                                    ?>
                            </ul>
                            <p>Grado: <?php echo $datosGrado['nombre_grado']?></p>
                            <p>Centro: <?php echo $datosCentro['nombre_centro']?></p>
                        </p>
                        <div class="read-more">
                            <form action="" method="post" class="php-email-form">
                                <button class="btn btn-danger" name="editar" value="<?php echo $profesor['id_profesor']?>" type="submit">Editar</button>
                                <button class="btn btn-danger" name="borrar" value="<?php echo $profesor['id_profesor']?>" type="submit">Borrar</button>
                            </form>
                        </div>
                    </div>
                    </article>
                <?php }?>
            </div>
        </div>
    </div>
</section>
</body>
</html>
