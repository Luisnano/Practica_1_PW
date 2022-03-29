<?php
    session_start();
    $_SESSION['n_preguntas']=0;
    $_SESSION['id_pregs']=array();
    $_SESSION['id_alumno']=1;
?>
<?php
    include('assets/headers/header_alum.php');
?>
<br>
<br>
<br>
<br>
<form action="procesa_respuesta.php" method="post">
<?php
    
    /* -------------------------------------------------------------------------- */
    /*                       VARIABLES GLOBALES_DEL_FICEHRO                       */
    /* -------------------------------------------------------------------------- */
    
    include('clases_examen.php');
    include('config.php');//Incluimos la configuración para obtener las globales
    
    //Inicio del programa (iniciamos sesión para comprobar si existe un usuario logeado)
    //session_start();

    //echo random_int(0,5);//Con esto generaremos los números para seleccionar entre la lista de preguntas
    
    /*
    //Si el session esta a true y es != de NULL entonces el usuario esta logeado, en cualquier otro caso no haremos nada
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){

        echo "<h1>Bienvenido</h1>";

    }
    else
        echo "<h1>No estas logeado</h1>";
    */
    
   /* -------------------------------------------------------------------------- */
   /*                                  FUNCIONES                                 */
   /* -------------------------------------------------------------------------- */

    //Para obtener la respuesta elegida sin repetición
    function devuelve_respuesta($seleccion_preguntas, &$usadas){
        
        //print_r($usadas);
        //echo "<br>";        

        $res_escogida = $seleccion_preguntas[random_int(0,count($seleccion_preguntas)-1)];

        while( in_array($res_escogida,$usadas) == true){

            $res_escogida = $seleccion_preguntas[random_int(0,count($seleccion_preguntas)-1)];
        
        }
        
        //Una vez obtengo la respuesta la insertamos en las utilizadas
        array_push($usadas,$res_escogida);

        return $res_escogida;
    }

    

    /* -------------------------------------------------------------------------- */
    /*                              INICIO ALGORITMO                              */
    /* -------------------------------------------------------------------------- */

   
    
    //obtenemos de la base de datos la lista de asignaturas
    $id_preg_totales = array();

    $tema= $_POST['tema'];
    $id_asignatura = $_SESSION['id_asignatura'];

    foreach ( $connection->query("SELECT * FROM pregunta ") as $i ){
        if($i['tema'] == $tema && $i['id_asignatura'] == $id_asignatura)
        array_push($id_preg_totales, $i['id_pregunta']);
    }

    //Truncamos en 4 preguntas (CONSULTAR MAS TARDE)
    shuffle($id_preg_totales);//Hacemos el shuffle para seleccionar las 4 preguntas de forma aleatoria

    while( count($id_preg_totales) > 4)
        array_pop($id_preg_totales);

    /* ------------------------- Preparamos EL NUEVO EXAMEN ------------------------ */
    //Variables de EXAMEN (id_examen,id_alumno,id_pregunta)
    $_SESSION['n_preguntas']=count($id_preg_totales);
    $_SESSION['ids_pregs']=$id_preg_totales;
    
    

    /* ---------------------------- MOSTRANDO EL HTML --------------------------- */

    for($i=0; $i < count($id_preg_totales); $i++){
        

        $pregunta=$connection->query("select * from pregunta where id_pregunta = $id_preg_totales[$i]");
        
        //Variables para hacerlo mas simple, el bucle for se requiere ya que se asuma que siempre puede haber n rows
        
        
        foreach ($pregunta as $j){
            
            $enunciado=$j['texto_pregunta'];
            $r1 = $j['r1'];
            $r2 = $j['r2'];
            $r3 = $j['r3'];
            $r4 = $j['r4'];            
            
            //Eliminacion de espacios para enviar de forma correcta las respuestas
            $v1 = elimina_espacios($j['r1']);
            $v2 = elimina_espacios($j['r2']);
            $v3 = elimina_espacios($j['r3']);
            $v4 = elimina_espacios($j['r4']);

        }
        //Corrección para evitar conversiones internas , evitar warnings
        
        $j=$i+1; //Para que quede mas bonito con respecto al post
        echo "<p>";
        
        echo "<h1>Pregunta ".($i+1)." :<br>".$enunciado."</h1>";
        echo "<br>";
        echo "<br>";
        echo "Opciones:<br>";
        echo "<br>";
        echo "<input  type='radio' name=$j value='$v1'/>"."a)"." ".$r1;
        echo "<br>";
        echo "<input type='radio' name=$j value='$v2'/>"."b)"." ".$r2;
        echo "<br>";
        echo "<input type='radio' name=$j value='$v3'/>"."c)"." ".$r3;
        echo "<br>";
        echo "<input type='radio' name=$j value='$v4'/>"."d)"." ".$r4;
        echo "<br>";
        echo "</p>";
        
    }
    



?>
    <input type="submit">
</form>
