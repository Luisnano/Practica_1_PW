<?php
    include('assets/headers/header_alum.php');
    include('config.php');
    session_start();
?>

<br><br><br>


    <?php
        
        foreach(
            $connection->query("SELECT nombre,id_preguntas FROM examen,asignatura where examen.id_asignatura=asignatura.id_asignatura") 
            as $row
            )
        {
            $id_as = $_SESSION['id_asignatura'];
           
            

            preg_match_all('!\d+!', $row['id_preguntas'], $ids_pregs);//trim de elementos enteros de cadena
            //print_r($ids_pregs);
            
            foreach($ids_pregs as $i){//Por algun motivo se guarda como una matriz por lo que hay que recorrerla 
                foreach($i as $j){
                    
                    //Mostrar preguntas
                    foreach(
                        $connection->query("SELECT * from pregunta where id_asignatura=$id_as AND id_pregunta=$j") 
                        as $p
                    )
                    {
                        echo "<p>Asignatura:  ".$row['nombre']."</p>";
                        echo "<p>Tema: ".$p['tema']."</p>";
                        echo "<p>Pregunta: ".$p['texto_pregunta']."</p>";
                        echo "<br>";
                        echo "<p>a)".$p['r1']."</p>";
                        echo "<p>b)".$p['r2']."</p>";
                        echo "<p>c)".$p['r3']."</p>";
                        echo "<p>d)".$p['r4']."</p>";
                        echo "<p>La respuesta correcta: ".$p['correcta']."</p>";
                        echo "<br><br>";
                    }

                }
            }
            echo "<br><br><br>";
        }
        echo "</table>";
    ?>

<a href="menu_alumnos.php">Volver</a>

