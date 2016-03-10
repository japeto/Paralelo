<?php
 session_start();
  unset($_SESSION["usuario"]); 
  unset($_SESSION["id_encuesta"]);
  unset($_SESSION["nombre_encuesta"]);
  unset($_SESSION['id_modulo']);
  unset($_SESSION['nombre_modulo']);
  //unset($_SESSION["nombre_cliente"]);
  session_destroy();
  header("Location: ../../../../../indice_principal.php?action=index");
  exit;
  ?>