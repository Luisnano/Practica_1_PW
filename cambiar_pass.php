<?php
    session_start();
    include('assets/headers/header_alum.php');
?>
<br>
<br>
<br>
<h2>Selecciona la contraseña nueva</h2>
<form action="procesa_pass.php" method="post">

    Nueva contraseña: <input type="password" name="pass">

    <input type="submit" value="Cambiar">
</form> 