<?php
 session_start();
  unset($_SESSION["usuario"]); 
  //unset($_SESSION["nombre_cliente"]);
  session_destroy();
  header("Location: ../../../../../indice_principal.php?action=index");
  exit;
  ?>