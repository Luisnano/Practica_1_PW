<?php 
include('assets/headers/header_prof.php');
include('config.php');
$id_prof = $_SESSION['id'];
$id_asig_edit = $_SESSION['id_asig_edit'];
$tema_asig = "SELECT id_asignatura,tema FROM pregunta WHERE id_asignatura = $id_asig_edit GROUP BY tema";
foreach($connection->query("SELECT nombre FROM asignatura WHERE id_asignatura = $id_asig_edit") as $asig_edit){
    $nombre_asig = $asig_edit['nombre'];
}
?>



<section id="contact" class="contact">
      <div class="container">

        <div class="row mt-5">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="error-message"></div>
                <div class="sent-message">Pregunta añadida con Éxito!</div>
              </div>
              <div class="text-center"><button type="submit">Añadir</button></div>
            </form>

          </div>
      </div>
    </section><!-- End Contact Section -->