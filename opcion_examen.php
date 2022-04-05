<?php
    session_start();
?>
<?php
    include('assets/headers/header_alum.php');
    $_SESSION['tema'] = $_POST['tema'];
    $id_asignatura = $_SESSION['id_asignatura'];
?>
<br>

<div class="d-flex justify-content-center">
    <h1>¿Qué Quieres Hacer?></h1>
</div>
    
    <br><br>
    <div class="d-flex justify-content-center">
    <p> 
        <a href="genera_exam.php">Realizar examen</a><br>
        <a href="revisiones.php">Resivar Preguntas Exámen</a><br> 
        <a href="menu_alumnos.php">Volver</a>
    </p>
    </div>
    <!-- Hacer un logout -->
    
    
    
</body>
</html>