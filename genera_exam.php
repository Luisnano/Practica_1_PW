<form action="procesa_respuesta.php" method="post">
<?php
    
    /* -------------------------------------------------------------------------- */
    /*                       VARIABLES GLOBALES_DEL_FICEHRO                       */
    /* -------------------------------------------------------------------------- */
   


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
    $id_asignatura = $_POST['id_asignatura'];

    foreach ( $connection->query("SELECT id_pregunta FROM pregunta where tema=$tema AND id_asignatura=$id_asignatura ") as $i ){
        array_push($id_preg_totales, $i['id_pregunta']);
    }

    //Truncamos en 4 preguntas (CONSULTAR MAS TARDE)
    shuffle($id_preg_totales);//Hacemos el shuffle para seleccionar las 4 preguntas de forma aleatoria

    while( count($id_preg_totales) > 4)
        array_pop($id_preg_totales);

    

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

        }

        //Corrección para evitar conversiones internas , evitar warnings
        

        echo "<p>";
        
        echo "<h1>Enunciado ".($i+1)." :<br>".$enunciado."</h1>";
        echo "<br>";
        echo "<br>";
        echo "Preguntas:<br>";
        echo "<br>";
        echo "<input type='checkbox' name=p".$i."value=".$r1."/>"."a)".$r1;
        echo "<br>";
        echo "<input type='checkbox' name=p".$i."value=".$r2."/>"."b)".$r2;
        echo "<br>";
        echo "<input type='checkbox' name=p".$i."value=".$r3."/>"."c)".$r3;
        echo "<br>";
        echo "<input type='checkbox' name=p".$i."value=".$r4."/>"."d)".$r4;
        echo "<br>";
        echo "</p>";

    }
    



?>
    <input type="submit">
</form>
