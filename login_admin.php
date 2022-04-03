<?php 

include('config.php');
session_start();

if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin' && $password == '12345')
    {
        $_SESSION['tipo'] = 'admin';
        $_SESSION['loggedin'] = true;
        header("Location: menu_admin.php");
    }else{
        echo '<p class="error">Credenciales Incorrectas.</p>';
    }

}
?>
<html>
	<head>
		<title>VC | ADMINISTRADOR</title>
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

    <style>
        h1 {
            text-align: center;
            margin-top: 1%;
        }
    </style>
<body>

<h1>Inicio Sesión | ADMINISTRADOR</h1>
<section id="login" class="contact">
    <div class="container">
        <form action="" method="post" class="php-email-form">
            <div class="row">
            <div class="col-sm-4 form-group">
            </div>
            <div class="col-sm-4 form-group">
                <input type="text" class="form-control" name="username" pattern="[a-zA-Z0-9]+" placeholder="Usuario" required />
            </div>
            </div>
            <div class="row">
            <div class="col-sm-4 form-group">
            </div>
            <div class="col-sm-4 form-group">
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
            </div>
            </div>
            <div class="text-center">
                <button name="login" value="login" type="submit">Acceder</button>
                <a href="index.html" class="btn-get-started animate__animated animate__fadeInUp scrollto">Volver</a>
            </div>
            </form>
        </div>
        </div>
</section>
</body>
</html>