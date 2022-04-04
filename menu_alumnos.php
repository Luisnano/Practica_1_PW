<?php
    session_start();
?>
<?php
    include('assets/headers/header_alum.php');
?>
<br>

<div class="d-flex justify-content-center">
    <h1>Bienvenido <?php echo $_SESSION['nombre'] ?>, ¿Qué quieres hacer hoy?</h1>
</div>
    
    <br><br>
    <div class="d-flex justify-content-center">
    <p> 
        
        <a href="cambiar_pass.php">Cambiar mi contraseña</a><br> 
        <a href="selecciona_asig.php">Realizar examenes</a><br>
        <!--Añadir desplegable de asignaturas y tal, DEBE MOSTRAR UNICAMENTE LAS MATRICULADAS POR EL ALUMNO  -->
        <a href="calificaciones.php" style>Ver Calificaciones</a><br>
        <a href="revisiones.php" style>Revision de Examenes</a><br>
        <!--Las calificaciones mostradas serán las del alumno en cada una de las asignaturas y la media -->
        <a href="cierra_sesion.php">Cerrar sesión</a>
    </p>
    </div>
    <!-- Hacer un logout -->
    
    
    
</body>
</html>