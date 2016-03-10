<?php require_once 'conectado.php';?>
 <!DOCTYPE HTML>
<html>
<head>
  <title>Modulo Encuestado</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">                
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <!--<link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"/>                
  <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->                                
  <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>

  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <!--<script type="text/javascript" src="../../js/jquery.min.js" ></script>-->
  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script>
  <script type="text/javascript" src="../../js/bootstrap.js" ></script>


  <script type="text/javascript" src="../../js/principal1.js" ></script>  

  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>              
  <!--<script type="text/javascript" src="../../js/config.js" ></script>-->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>
  <script type="text/javascript" src="../../js/encuestas_cargar1.js" ></script> 

  <!-- <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> -->
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>  
<body>
  <div id="wrapper">
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

 <div id="main-wrapper" class="subpage">
    <div class="row">
      <div class="col-md-offset-2 col-md-8 col-md-offset-2">
       <div class="panel panel-default">
        <div class="panel-heading"> 
          <h4 class="panel-title">Seleccione la opcion que desea</h4>
        </div>
        <div class="panel-body">
        <br> 
          <center>
            <a href="../../../../../indice_usuario.php?action=resultados" class="btn btn-md btn-primary "><i class="fa  fa-list fa-fw"></i> Ver resultados preliminares</a>
            <a href="../../../../../indice_usuario.php?action=encuesta" class="btn btn-md btn-primary "><i class="fa  fa-chevron-right fa-fw"></i> Continuar Encuestas</a>
            <!-- <hr/> -->
            <!-- <a id="login" class="btn btn-md btn-primary "><i class="fa  fa-unlock fa-fw"></i> Accede</a> -->
          </center>                                                               
<div class="col-md-4 col-md-offset-4" style="display:non;">
<div id="panelacceso" class="panel login-panel panel-info">
  <!-- <div class="panel-heading"> -->
      <!-- <h3 class="panel-title"> Inicie Sesi&oacute;n en su Cuenta</h3> -->
      <!-- <h3 class="panel-title"><i class="fa  fa-user fa-fw"></i>  Ingrese a Survey Promesa</h3> -->
  <!-- </div> -->
  <div class="panel-body">
      <form role="form">
          <fieldset>
              <div class="form-group">
                  <input id="user" name="usuario" class="form-control" placeholder='ingrese su nombre de usuario' type="text" required/>
              </div>
              <div class="form-group">
                  <input id="pass" name="contrasena"  class="form-control" placeholder='ingrese su contraseña' type="password" required/>
              </div>
               <div class="form-group">
                  <a id="canlogin" type="submit" class="btn btn-sm btn-danger pull- btn-md" title=""><i class="fa  fa-times fa-fw"></i> Cancelar</a>
                  <a id="btnlogin2" type="submit" class="btn btn-sm btn-primary pull-right btn-md" title=""><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a>
               </div>
               <center>
                  <div id="validarlog" class="alert alert-danger">
                  El nombre de Usuario o la contraseña <br/> NO son correctos.
                  </div>               
                <a href="modules/no_registrado/buscar_contrasena.php" >¿Olvido su nombre de usuario o contrase&ntilde;a?</a>
               </center>
          </fieldset>
      </form>
  </div>
</div>
</div>

      </div>
      <br>
    </div> 
  </div>
</div>
</div>

 <?php include_once 'footer.php';?>
</div>                   
</body>
</html>
