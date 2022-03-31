<?php
    session_start();

?>
<?php
    include('config.php');
?>
<body>
    <br><br>
    <h1>Bienvenido a tus Calificaciones</h1>
    <table>
        <tr>
            <th>Notas</th>
        </tr>
        
        <?php
            $query="SELECT * from examen where id_alumno = ? ";
            $res=$connection->prepare($query)->execute([$_SESSION['al_temporal']]);

            foreach($res as $i){
                
            }
            
            


        ?>
    </table>
    
</body>