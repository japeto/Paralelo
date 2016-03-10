<?php session_start()?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Principal Proyecto Tramas</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
  
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script type="text/javascript" src="js/jquery-1.9.1.js" ></script>                
  <script type="text/javascript" src="js/jquery-ui.js" ></script>                
  <script type="text/javascript" src="js/principal.js" ></script>  
  <!--<script type="text/javascript" src="js/bootstrap.js" ></script> --> 
  <!--<script type="text/javascript" src="js/config.js" ></script>-->
  <script type="text/javascript" src="js/skel.min.js" ></script>   

  <link rel="stylesheet" href="css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>                 
  <link rel="stylesheet" href="css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="all"/>
  
  <link rel="stylesheet" href="css/style-desktop.css" type="text/css" media="all"/>               
  <link rel="stylesheet" href="css/style_form_login.css" type="text/css" media="all"/>
  
  
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
          
          <div class="col-lg-4 col-md-3 col-md-offset-2">
            <div id="panelacceso" class="panel login-panel panel-info">
              <div class="panel-heading">
                <!-- <h3 class="panel-title"> Inicie Sesi&oacute;n en su Cuenta</h3> -->
                <h3 class="panel-title"><i class="fa  fa-user fa-fw"></i>  Ingrese a Survey PROMESA</h3>
              </div>
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
                      <a id="btnlogin" type="submit" class="btn btn-sm btn-primary pull-right btn-md" title=""><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a>
                    </div>
                    <hr/>
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
          
          <div class="col-lg-4 col-md-3">
            <div class="login-panel panel panel-info">
              <!-- <div class="panel-heading">
            </div> -->
            <div class="panel-body">
              <h4>Survey Encuesta</h4>
              Puedes crear tus encuesta en cualquier momento.
              <center><img class="img-responsive" src="images/sesion.jpg" width="200px" height="100px"></center>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>    
</div>

<footer>
  <section>
    <center><img class="img-responsive" src="images/survey1.PNG" width="500px" height="80px">
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

</body>
</html>


