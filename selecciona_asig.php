<?php
    session_start();
    //print_r($_SESSION);
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
            
            
            //Creacion del desplegable
            echo "<h2> Selecciona la asignatura de la que deseas hacer el examen: </h2>";
            echo "<select name='asignatura'>";
                //Hay que mostrar solos las asignaturas que esten verificados los alumnos
                foreach($connection->query("SELECT id_estudiante,id_asignatura from matricula") as $m){
                    
                    if($m['id_estudiante'] == $_SESSION['id']){
                        $as_coincidente = $m['id_asignatura'];
                        foreach($connection->query("SELECT * FROM asignatura WHERE id_asignatura LIKE $as_coincidente ") as $i){
                            
                            echo "<option value=".$i['id_asignatura'].">".$i['nombre']."</option>";
                        
                        }
                    }
                }
            echo "</select>";

        ?>

        <input type="submit">
    </form>
</body>
</html>