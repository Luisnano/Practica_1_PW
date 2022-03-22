<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion de Tema</title>
</head>
<body>
    <h1>Bienvenido al menu de seleccion de asignaturas</h1>
    <form action="selecciona_tema.php" method="post">

        <?php
            include('../config.php');
            $query_asignatura = $connection->query("SELECT * FROM asignatura");
            //Hay que mostrar solos las asignaturas que esten verificados los alumnos
            
            //Creacion del desplegable
            echo "<h2> Selecciona la asignatura de la que deseas hacer el examen: </h2>";
            echo "<select name='asignatura'>";
                foreach($connection->query("SELECT * FROM asignatura") as $i){
                    echo "<option value=".$i['nombre'].">".$i['nombre']."</option>";
                }
            echo "</select>";

        ?>

        <input type="submit">
    </form>
</body>
</html>