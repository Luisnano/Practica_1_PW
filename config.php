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
?>