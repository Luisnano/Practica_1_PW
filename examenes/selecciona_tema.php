<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccion de Tema</title>
</head>
<body>
    
    <form action="genera_exam.php" method="post">
        
        <?php

            include('../config.php');
            echo "<h1>Bienvenido al menu de seleccion de temas de ".$_POST['asignatura']."</h1>";
            $nombre_recibido = $_POST['asignatura'];
            $id_asig_recibido;
            foreach($connection->query("SELECT * FROM asignatura") as $i)
            {
                if($i['nombre'] == $nombre_recibido)
                    $id_asig_recibido = $i['id_asignatura'];
            }
            
            //Para evitar duplicacion obtendremos todos los temas de la asignatura dada
            $temas = array();
            foreach($connection->query("SELECT * FROM pregunta where id_asignatura = $id_asig_recibido") as $i){
                
                if (!in_array($i['tema'],$temas))
                    array_push($temas,$i['tema']);

            }


            //Hacemos desplegables de los temas
            echo "<h2> Selecciona el tema del que deseas hacer el examen: </h2>";
            echo "<select name='tema'>";
                foreach($temas as $i){
                    echo "<option value=".$i.">".$i."</option>";
                }
            echo "</select>";
            
            echo "<br>";
            echo "<h2>Asignatura seleccionada previamente</h2>";
            echo "<select name ='id_asignatura'>";
                echo "<option value=".$id_asig_recibido.">".$_POST['asignatura']."</option>";
            echo "</select>";

        ?>

        <input type="submit">
    </form>
</body>
</html>