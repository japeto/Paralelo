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
  <!-- <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->    
  <link rel="stylesheet" href="../../css/style-form.css" type="text/css" media="all"/>                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
 <!-- <link rel="stylesheet" href="../../css/style-1000px.css" type="text/css" media="all"/> -->
  
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>
   -->
  <script type="text/javascript" src="../../js/jquery.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>
  <script type="text/javascript" src="../../js/bootstrap.min.js" ></script>-->
  <!--<script type="text/javascript" src="../../js/config.js" ></script>-->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>                
  <script type="text/javascript" src="../../js/recuperar_validador.js" ></script>
  <script type="text/javascript" src="../../js/focus.js" ></script>

  <!-- <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> -->
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
  </nav>
  <!-- Main -->                                                
  <div id="main-wrapper" class="subpage">
    <div class="container">
     <div class="row">
      <!-- Content -->                 
      <div class="col-md-offset-2 col-md-8 col-md-offset-2">
        <div class="panel panel-default" >
          <div class="panel-heading">
            Restituci&oacute;n de Contraseña
          </div>
          <div class="panel-body">
           <form action="../../../../../indice_principal.php" method="POST">
             <div><label>Hola,</label> <?php echo $_SESSION['usuario_encontrado']?></div>
             <div><input type="hidden" class="form-control" name="id_user" value="<?php echo $_SESSION['id_u'];?>"/></div>
             <div><input type="password" id="pass1" class="form-control" name="contrasena1" placeholder="Ingrese la nueva contraseña" tabindex="1"/></div>
             <br>
             <div><input type="password" id="pass2" class="form-control" name="contrasena2" placeholder="Ingrese nuevamente la nueva contraseña" tabindex="2"/></div>
             <br>
             <div><center><button type="submit" class="btn btn-primary boton" tabindex="3">Modificar</button></center></div>
           </form>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
<?php include_once 'footer.php';?>
</body>
</html>
