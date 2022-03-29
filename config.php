<?php
//Config se utilizará para ser incluido en cada php que necesite tener acceso a la base de datos.
define('USER', 'root');
define('PASSWORD', '1001');
define('HOST', 'localhost');
define('DATABASE', 'test');
 
try {
    $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
/*
$_SESSION['id'] = $resultprof['id_profesor'];
$_SESSION['username'] = $resultprof['user_prof'];
$_SESSION['nombre'] = $resultprof['nombre_profesor'];
$_SESSION['loggedin'] = true;
$_SESSION['tipo'] = 'profesor';
*/

?>