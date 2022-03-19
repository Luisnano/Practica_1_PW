<form action="procesa_respuesta.php" method="post">
<?php
    //Definicion de globales 
    $RESPUESTAS_USADAS=[];//Para evitar la repetición de las respuestas


    //include('config.php');//Incluimos la configuración para obtener las globales
    
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

    $pregunta=array("Pregunta 1","Pregunta 2","Pregunta 3","Pregunta 4");
    $respuestas=array("a","b","c","d","e","f","g","h");
    
    echo "<p>";
        
        $pregunta_generada=random_int(0,count($pregunta)-1);//Para guardar el numero de pregunta que se ha generado
        
        echo "<h1>Enunciado:".$pregunta[$pregunta_generada]."</h1>";
        echo "<br>";
        echo "<br>";
        echo "Preguntas:<br>";
        echo "<br>";
        echo "<input type='checkbox' name=p".$pregunta_generada."value=1/>".devuelve_respuesta($respuestas,$RESPUESTAS_USADAS);
        echo "<br>";
        echo "<input type='checkbox' name=p".$pregunta_generada."value=2/>".devuelve_respuesta($respuestas,$RESPUESTAS_USADAS);
        echo "<br>";
        echo "<input type='checkbox' name=p".$pregunta_generada."value=3/>".devuelve_respuesta($respuestas,$RESPUESTAS_USADAS);
        echo "<br>";
        echo "<input type='checkbox' name=p".$pregunta_generada."value=4/>".devuelve_respuesta($respuestas,$RESPUESTAS_USADAS);
        echo "<br>";

    echo "</p>";




?>
    <input type="submit">
</form>
