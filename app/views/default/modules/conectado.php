<?php
/* Empezamos la sesión */
session_start();
/* Creamos la sesión */
//$_SESSION['username'] = $_POST['username'];
/* Si no hay una sesión creada, redireccionar al index. */
if(empty($_SESSION['username'])) 
    { // Recuerda usar corchetes.
        header('Location: index.php');
    } // Recuerda usar corchetes
