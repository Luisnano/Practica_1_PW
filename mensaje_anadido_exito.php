<?php 
include('assets/headers/header_prof.php');
include('config.php');
?>
<br></br><br></br>
    <div class="d-flex justify-content-center">
        <h2>¡Pregunta añadida con Éxito!</h2>
    </div>
    <div class="d-flex justify-content-center">
        <h3>Redirigiendo a lista de preguntas...</h3>
    </div>

</body>
</html>

<script>
  setTimeout(function(){
      window.location.href="listado_preguntas_tema.php";
  }, 3000);
</script>