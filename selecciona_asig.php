<?php
    include('assets/headers/header_alum.php');
?>
<br>
<br>
<br>
<br>
    <h1>Bienvenido al menu de seleccion de asignaturas</h1>
    <form action="selecciona_tema.php" method="post">

        <?php
            include('config.php');
            $query_asignatura = $connection->query("SELECT * FROM asignatura");
            //Hay que mostrar solos las asignaturas que esten verificados los alumnos
            
            //Creacion del desplegable
            echo "<h2> Selecciona la asignatura de la que deseas hacer el examen: </h2>";
            echo "<select name='asignatura'>";
                foreach($connection->query("SELECT * FROM asignatura") as $i){
                    echo "<option value=".$i['id_asignatura'].">".$i['nombre']."</option>";
                }
            echo "</select>";

        ?>

        <input type="submit">
    </form>
</body>
</html>