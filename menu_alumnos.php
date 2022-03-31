<?php
    session_start();
    $_SESSION['al_temporal']=1;
?>
<?php
    include('assets/headers/header_alum.php');
    
    echo"<h1>". $_SESSION['id']."</h1>";
?>

    <h1>Bienvenido, ¿Qué quieres hacer hoy?</h1>
    
    <br><br>
    <p> 
        <a href="localhost/">Cambiar mi contraseña</a><br> 
        <a href="selecciona_asig.php">Realizar examenes</a><br>
        <!--Añadir desplegable de asignaturas y tal, DEBE MOSTRAR UNICAMENTE LAS MATRICULADAS POR EL ALUMNO  -->
        <a href="calificaciones.php">Ver Calificaciones</a><br>
        <!--Las calificaciones mostradas serán las del alumno en cada una de las asignaturas y la media -->

    </p>
    <p><a href="cierra_sesion.php">Cerrar sesión</a></p>
    <!-- Hacer un logout -->
    
    
</body>
</html>