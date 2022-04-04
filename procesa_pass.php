<?php
    session_start();
?>

<?php
    include('config.php');
    $id=$_SESSION['id'];
    $insercion = "UPDATE estudiante SET contraseña_estudiante =? where id_estudiante = $id";
    $pass = $_POST['pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $connection->prepare($insercion)->execute([$pass]);
    header("Location:menu_alumnos.php");
?>