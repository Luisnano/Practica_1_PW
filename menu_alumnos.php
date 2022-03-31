<?php
    session_start();
?>
<?php
    include('assets/headers/header_alum.php');
?>
<br><br><br>
    <h1>Bienvenido <?php echo $_SESSION['nombre'] ?>, ¿Qué quieres hacer hoy?</h1>
    
    <br><br>
    <p> 
        <a href="cambiar_pass.php">Cambiar mi contraseña</a><br> 
        <a href="selecciona_asig.php">Realizar examenes</a><br>
        <!--Añadir desplegable de asignaturas y tal, DEBE MOSTRAR UNICAMENTE LAS MATRICULADAS POR EL ALUMNO  -->
        <a href="calificaciones.php">Ver Calificaciones</a><br>
        <!--Las calificaciones mostradas serán las del alumno en cada una de las asignaturas y la media -->

    </p>
    <p><a href="cierra_sesion.php">Cerrar sesión</a></p>
    <!-- Hacer un logout -->
    
    
</body>
</html>