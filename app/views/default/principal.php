<?php session_start()?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Principal Proyecto Tramas</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">

	<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>                
	<script type="text/javascript" src="js/jquery-ui.js" ></script>                
	<script type="text/javascript" src="js/principal.js" ></script>  
	<!--<script type="text/javascript" src="js/bootstrap.js" ></script> --> 

	<!--<script type="text/javascript" src="js/config.js" ></script>-->
	<script type="text/javascript" src="js/skel.min.js" ></script>   
  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>-->
  <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>                 
  <link rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all"/>
  <!-- <link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="css/bootstrap-responsive.css" type="text/css" media="all"/> -->
  <link rel="stylesheet" href="css/style-desktop.css" type="text/css" media="all"/>               
  <link rel="stylesheet" href="css/style_form_login.css" type="text/css" media="all"/>
  <!--<link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!--<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> 
  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="bower_components/bootstrap-social/bootstrap-social.css" rel="stylesheet">-->

  
  <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="dist/css/timeline.css" rel="stylesheet">
  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="dist/js/sb-admin-2.js"></script>
  <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
   
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
        <li><?php include_once 'sesion.php';?></li>
      </ul>
    </div>
  </div>
 </nav>

 <div id="main-wrapper" >
  <div class="container">
  <div class="row">
      <div class="col-lg-12">
      <!-- <h1 class="page-header">Crear Encuestas</h1> -->
      <br>
      <br>

     <div id="apppanel">
      <div id="result"></div>
      <!-- <div id="content">
       <center>
        <div class="col-sm-3">
        </div>     
        <div class="col-md-6">
         
         <div class="panel panel-default">
          <div class="panel-heading">
           <h3>Desea RESPONDER la encuesta</h3></div>
           <div class="panel-body">
             <a id="response" href="#" class="btn btn-primary" title="">Aceptar</a>
           </div>
         </div>
       </div>
     </center>
   </div> -->
<div id="content">
    <div class="row">
     <!-- <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Bienvenidos</h3>
     </div>
       <div class="panel-body">
        <center>
          <a id="response" href="#" class="btn btn-primary btn-md ">Diligenciar Encuestas</a>
          <a href="modules/no_registrado/adicionar.php" class="btn btn-primary btn-md ">Registrarme</a>
        </center>
        <br>
        <a href="#" class="btn btn-md btn-primary btn-block">Crear Nueva Encuesta</a>
       </div>
     </div> -->
     <div class="container">
    <!--  <div id="banner"> -->
    <div class="col-lg-12">
      <div class="jumbotron">
        <!-- <center><h1>Bienvenidos</h1></center> -->
        <br>
        <center>
         <!--  <ul class="pager">
           <li><a id="response" href="#" class="btn  btn-lg btn-info">Diligenciar Encuesta</a></li>
          <li><a href="modules/no_registrado/adicionar.php" class="btn  btn-lg btn-info">Registrarme</a></li>
        </ul> -->
        <a id="response" href="#" type="button" class="btn btn-primary btn-lg">Diligenciar Encuesta</a>

        <!-- <a href="modules/no_registrado/adicionar.php" type="button" class="btn btn-primary btn-lg">Registrarme</a> -->
        <!-- <a href="file/ManualUsuario.docx" download  type="button" class="btn btn-md btn-primary">Manual de Usuario</a>
        <a href="file/ManualUsuario.docx" download  type="button" class="btn btn-md btn-primary">Video</a> -->
       </center>
      </div>
      </div>
    </div>
   </div>
   </div>
</div>

            
<!-- <div class="col-md-4 col-md-offset-4">
<div id="panelacceso" class="login-panel panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">Inicie Sesi&oacute;n en su Cuenta</h3>
  </div>
  <div class="panel-body">
      <form role="form">
          <fieldset>
              <div class="form-group">
                  <input id="user" name="usuario" class="form-control" placeholder='ingrese su nombre de usuario' type="text" required/>
              </div>
              <div class="form-group">
                  <input id="pass" name="contrasena"  class="form-control" placeholder='ingrese su contraseña' type="password" required/>
                  <div id="validarlog" class='error' style="color: red"><p>El nombre de Usuario o la contraseña no son correctos</p></div>
              </div>
              <div class="checkbox">
                  <label>
                      <input name="remember" type="checkbox" value="remember-me" id="remember_me">¡Recu&eacute;rdame!
                  </label>
              </div>
              
               <center> 
                  <a id="btnlogin" type="submit" class="btn btn-sm btn-primary btn-md" title="">Iniciar Sesi&oacute;n</a>
                  <a id="canlogin" type="submit" class="btn btn-sm btn-primary btn-md" title="">Cancelar</a>
               </center> 
               <br>
               <div><a href="modules/no_registrado/buscar_contrasena.php" >¿Olvido su nombre de usuario o contrase&ntilde;a?</a></div><br>
          </fieldset>
      </form>
  </div>
</div>
</div> -->
</div>


</div>
</div>    
</div>



<!-- <div id="footer-wrapper"> -->
<!-- Footer -->
<!-- <div id="footer-wrapper"> -->
    <!-- <div class="12u">
            <div class="divider"></div>
        </div> -->
    <footer>
        <section>
          <center>
            <img class="img-responsive" src="images/survey1.PNG" width="500px" height="80px"><br>
            <!-- <div class="text-center">
              <a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
              <a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
            </div> -->
          </center>
        </section>
        <center>  
        <section class="home-copyright">
          <div class="container">
            <p>Copyright © 2016 <a href="/">Survey PROMESA</a><a href="#"></a></p>
          </div>
        </section>
      </center> 
    </footer>
<!-- </div>   -->
<!-- <footer>
<div class="container">
<div class="col-lg-12 col-md-12 col-sm-12">
 &copy; 2015 Survey Promesa | by <a href="http://www.eisc.univalle.edu.co/tramas/" target="_blank"> p </a> 
</div>


</div>
</footer> -->
</body>
<!--<div class="container">
<div id="iniciar_sesion" class="modal">
<form>           
<ul>
<li><input id="user" name="usuario" class="caja" placeholder='ingrese su nombre de usuario' type="text"/></li>  
<li><input id="pass" name="contrasena" class="caja" placeholder='ingrese su contraseña' type="password"/></li>
</ul>
</form>
</div>
</div>

<div class="container" id="tipo_usar" class="modal">

<center><h4>Desea RESPONDER la encuesta</h4></center>

</div>-->
</html>


