<?php
    session_start();
    $_SESSION['nota_examen']=0;
?>

<?php
include('config.php');
include('clases_examen.php');

    //Variables de la clase examen
    $alumno=$_SESSION['id'];
    $preguntas=$_SESSION['ids_pregs'];
    $seleccionadas="";

    //Para pasar las preguntas a char y poder insertarla en el sql
    for($i=0; $i< count($_SESSION['ids_pregs']);++$i ){
        $seleccionadas.=$_SESSION['ids_pregs'][$i].',';
    }
    
    echo "<br><br>";
    $nota_examen=0;
    echo "<br><br>";
    //calculo de la nota del examen
    foreach($_POST as $respuestas){
        foreach($preguntas as $i){
            foreach($connection->query("SELECT * from pregunta where id_pregunta=$i") as $j){
                //Comprobar que sean iguales las correctas seleccionadas y las recibidas
                if($j['correcta'] == elimina_guiones($respuestas)){
                    ++$nota_examen;
                }            
            }
        }
    }
    
    $nota_examen=($nota_examen/$_SESSION['n_preguntas'])*10;
    
    //Una vez tengamos los elementos, creamos un nuevo examen y los insertamos
    $insercion = "INSERT INTO examen (id_alumno,id_pregunta,nota_examen) VALUES (?,?,?)";
    $connection->prepare($insercion)->execute([$alumno,$seleccionadas,$nota_examen]);
    
    
    header("Location: http://localhost/Practica_1_PW/menu_alumnos.php");
?>