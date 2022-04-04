<?php
    session_start();
    include('assets/headers/header_alum.php');
?>

<body style="text-indent:20px">
<br></br><br></br><br></br>

<?php
include('config.php');

    echo "<h2>Las asignaturas en las que estoy matriculado son:</h2>";
    echo "<br>";
    echo "<p>";
    $id_session = $_SESSION['id'];
    $consulta = "SELECT nombre from asignatura,matricula where matricula.id_estudiante = $id_session GROUP BY nombre";

    foreach ($connection->query($consulta) as $c){
        echo $c['nombre'].", ";
    }

    echo"<p>";
?>
<br>
<a href="menu_alumnos.php">¿Alguna Consulta más?</a><br><br>
<a href="cierra_sesion.php">Salir</a>
</body>

