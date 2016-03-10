<?php
 session_start();
  unset($_SESSION["usuario"]); 
  unset($_SESSION["pines"]);
  session_destroy();
  header("Location: ../../../../../indice_principal.php?action=index");
  exit;
  ?>