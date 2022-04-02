<!DOCTYPE html>
<html lang="en">

<?php 
session_start();
if(!isset($_SESSION['loggedin']) ||  $_SESSION['loggedin'] == false || $_SESSION['tipo'] != 'profesor'){
  header("Location: mensaje_error.php");
}
?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VC | Profesores</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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

<body>


  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="menu_profesores.php">Virtual Campus</a></h1>
      <nav id="navbar" class="navbar">
        <ul>

          <li class="dropdown"><a href=""><span>Gestión</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="selecciona_asig_prof.php">Preguntas</a></li>
              <li><a href="gestion_resultados.php">Resultados</a></li>
            </ul>
          </li>
          <li><a href="cierra_sesion.php">Cerrar Sesión</a></li>
          <li><a href="perfil_prof.php" class="getstarted"><?php echo $_SESSION['nombre']; ?></a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->