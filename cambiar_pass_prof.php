<?php
    session_start();
    include('assets/headers/header_prof.php');
    include('config.php');
    $idProf = $_SESSION['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $insercion = "UPDATE profesor SET contraseña_profesor = ? where id_profesor = $idProf";
    $pass = $_POST['pass'];
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $connection->prepare($insercion)->execute([$pass]);
    header("Location:menu_profesores.php");
    }
?>

<br></br><br></br>
<h2>Selecciona la contraseña nueva</h2>
<form action="" method="post">

    Nueva contraseña: <input type="password" name="pass">

    <input type="submit" value="Cambiar">
</form> 