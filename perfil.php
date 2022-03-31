<?php
    session_start();
    include('assets/headers/header_alum.php');
?>

<?php
    echo "<h2>Nombre:".$SESSION['nombre']."</h2>";
    echo "<br>";
    foreach ($connection->query('SELECT * from matricula') as $mat){
        if($mat['id_estudiante'] == $_SESSION['id']){
            
            //Mostrar todas las asignaturas

        }
    }
?>