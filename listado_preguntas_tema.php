<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_edit = $_SESSION['tema_edit'];

$tema_asig = "SELECT id_asignatura,tema FROM pregunta WHERE id_asignatura = $id_asig_edit GROUP BY tema";
$info_preguntas = "SELECT * FROM pregunta WHERE tema = '$tema_edit'";
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}
?>
<br></br><br></br>

<div class="d-flex justify-content-center">
    <h2>Preguntas disponibles sobre <?php echo $tema_edit ?></h2>
</div>

<section id="blog" class="blog">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="justify-content-center entries">
                <?php foreach( $connection->query($info_preguntas) as $pregunta){ ?>
                    
                    <article class="entry">
                    <h2 class="entry-title">
                        <a href=""><?php echo $pregunta['texto_pregunta']?></a>
                    </h2>

                    <div class="entry-content">
                        <p>
                        <ul>
                            <li>Respuesta 1:<?php echo $pregunta['r1']?></li>
                            <li>Respuesta 2:<?php echo $pregunta['r2']?></li>
                            <li>Respuesta 3:<?php echo $pregunta['r3']?></li>
                            <li>Respuesta 4:<?php echo $pregunta['r4']?></li>
                            </ul>
                            <p>Respuesta correcta:<?php echo $pregunta['correcta']?></p>
                        </p>
                        <div class="read-more">
                            <a href="blog-single.html">Editar</a>
                            <a href="blog-single.html">Borrar</a>
                        </div>
                    </div>
                    </article>
                <?php }?>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <form action="anadir_pregunta.php" method="post" class="php-email-form">
            <button class="btn btn-danger" name="id_asig" value="<?php echo $datos['id_asignatura']?>" type="submit">Añadir</button>
        </form>
    </div>
</section>
</body>
</html>
