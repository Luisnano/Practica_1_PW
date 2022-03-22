<html>
	<head>
		<title>VC - Login</title>
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
	</head>
<?php
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //Intenta buscar el usuario en la tabla alumnos.
    $queryalum = $connection->prepare("SELECT * FROM alumno WHERE username=:username");
    $queryalum->bindParam("username", $username, PDO::PARAM_STR);
    $queryalum->execute();

    $resultalum = $queryalum->fetch(PDO::FETCH_ASSOC);
    
    //Si el usuario no se encuentra en tabla alumnos, lo intenta buscar en el de profesores.
    if (!$resultalum) {
        $queryprof = $connection->prepare("SELECT * FROM profesor WHERE username=:username");
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
                header("Location: menu_profesores.php");
                die();
            } else {
                echo '<p class="error">El usuario y la contraseña no coinciden! (profesor).</p>';
            }
        }

    } else {
        if (password_verify($password, $resultalum['password'])) {
            $_SESSION['user_id'] = $resultalum['id'];
            echo '<p class="success">Éxito, eres un alumno.</p>';
            header("Location: menu_alumno.php");
            die();
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
    <div class="text-center"><button type="submit">Send Message</button></div>
</form>
</body>
</html>