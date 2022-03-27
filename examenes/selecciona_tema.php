<?php
    session_start();
    $_SESSION['id_asignatura']=$_POST['asignatura'];

?>


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
            foreach(
                $connection->query("select nombre,id_asignatura from asignatura")
                as $i
            )
            {
                if($i['id_asignatura'] == $_SESSION['id_asignatura'])
                echo "<h1>Bienvenido al menu de seleccion de temas de ".$i['nombre']."</h1>";
            }


            
            
            

            //Para evitar duplicacion obtendremos todos los temas de la asignatura dada
            $temas = array();
            foreach($connection->query("SELECT * FROM pregunta where id_asignatura =".$_SESSION['id_asignatura']) as $i){
                
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
            

        ?>

        <input type="submit">
    </form>
</body>
</html>