<html>
	<head>
		<title>Login</title>
	</head>
<?php
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Intenta buscar el usuario en la tabla alumnos.
    $queryalum = $connection->prepare("SELECT * FROM alumnos WHERE username=:username");
    $queryalum->bindParam("username", $username, PDO::PARAM_STR);
    $queryalum->execute();
 
    $resultalum = $queryalum->fetch(PDO::FETCH_ASSOC);
    
    //Si el usuario no se encuentra en tabla alumnos, lo intenta buscar en el de profesores.
    if (!$resultalum) {
        $queryprof = $connection->prepare("SELECT * FROM profesores WHERE username=:username");
        $queryprof->bindParam("username", $username, PDO::PARAM_STR);
        $queryprof->execute();

        $resultprof = $queryprof->fetch(PDO::FETCH_ASSOC);
        if (!$resultprof) {

            echo '<p class="error">El usuario no figura en la BD.</p>';
        }
        else{
            if (password_verify($password, $resultprof['password'])) {
                $_SESSION['user_id'] = $resultprof['id'];
                echo '<p class="success">Éxito, eres un profesor.</p>';
                header("Location: .$menu_profesores.php");
            } else {
                echo '<p class="error">El usuario y la contraseña no coinciden! (profesor).</p>';
            }
        }

    } else {
        if (password_verify($password, $resultalum['password'])) {
            $_SESSION['user_id'] = $resultalum['id'];
            echo '<p class="success">Éxito, eres un alumno.</p>';
            header("Location: .$menu_alumno.php");
        } else {
            echo '<p class="error">El usuario y la contraseña no coinciden!(alumno).</p>';
        }
    }
}
?>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Log In</button>
</form>
</body>
</html>