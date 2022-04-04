<?php
    session_start();
    include('assets/headers/header_prof.php');
    include('config.php');
    $idProf = $_SESSION['id'];
    $insercion = "UPDATE profesor SET contraseña_profesor = ? where id_profesor = $idProf";
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $connection->prepare($insercion)->execute([$pass]);
    header("Location:menu_prof.php");

?>
<br>
<br>
<br>
<h2>Selecciona la contraseña nueva</h2>
<form action="procesa_pass.php" method="post">

    Nueva contraseña: <input type="password" name="pass">

    <input type="submit" value="Cambiar">
</form> 