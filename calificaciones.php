<?php
    session_start();
    include('assets/headers/header_alum.php')
?>
<?php
    include('config.php');
    include('actualiza_matricula.php');
?>
<body>
    <br><br><br></br>
    <h1>Bienvenido a tus Calificaciones</h1>
    <br><br>
    <h2>Calificaciones Generales del alumno</h2>
    <div class="d-flex justify-content-center">
    <table>
        
        <?php
            $n_notas=0;
            $media=0;
            $query="SELECT * from examen";
            $res=$connection->query($query);
            echo "<tr>";
            echo "<th>Notas</th>";
            echo "</tr>";
            foreach($res as $i){
                
                if($i['id_alumno']==$_SESSION['id'])
                {
                    $media+=$i['nota_examen'];
                    ++$n_notas;
                    echo "<tr>";
                    echo "<td>".$i['nota_examen']."</td>";
                    echo "</tr>";
                }

            }
            echo "<tr>";
                echo "<th>Media</th>";
            echo "</tr>";
                echo "<tr>";
                    echo "<td>".bcdiv($media,$n_notas,2)."</td>";
                echo "</tr>";
            
        ?>
    </table>
    
    </div>
    


    <a href="menu_alumnos.php">Volver atras</a>
</body>