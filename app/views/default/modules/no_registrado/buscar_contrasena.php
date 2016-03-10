<?php require 'conectado.php';?>
<!DOCTYPE HTML>
<html>
	<head>
	<title>Principal - No Registrado</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
              
  <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <!-- <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->  
  <link rel="stylesheet" href="../../css/style-form.css" type="text/css" media="all"/>                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
  
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->
 
  <script type="text/javascript" src="../../js/jquery.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js" ></script>-->
  
  <script type="text/javascript" src="../../js/skel.min.js" ></script>                
  <script type="text/javascript" src="../../js/recuperar_validador.js" ></script>
  <script type="text/javascript" src="../../js/focus.js" ></script>  

  
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <!-- <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  </head>  
  <body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#">Survey PROMESA</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-top-links navbar-right">
          <li class="current_page_item"><a href="../../../../../indice_principal.php?action=index" id="modeltrigger"><i class="glyphicon glyphicon-home"></i>  Inicio</a></li>
        </ul>
      </div>
      </div>
    </nav>
    <!-- Main -->                                                
    <div id="main-wrapper" class="subpage">
     <div class="row">
      <div class="col-md-offset-2 col-lg-8 col-md-4 col-md-offset-2">
        <div class="panel panel-default" >
          <div class="panel-heading">
           Restitucion de Contraseña
         </div>
         <div class="panel-body">
           <form action="../../../../../indice_principal.php" method="POST">
             Nombre de usuario<input type="text" id="param" class="form-control" name="parametro" placeholder="Ingrese su nombre de usuario o login" tabindex="1"/></div>
             <div><center><button type="submit" class="btn btn-primary boton" tabindex="3">Buscar</button></center></div>                                                                
             <br>
           </form>
         </div>
       </div>
     </div>
   </div>
   <?php include_once 'footer.php';?>
 </body>
</html>
