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
  <link rel="stylesheet" href="../../css/style_form_preguntas.css" type="text/css" media="all"/>
  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <script type="text/javascript" src="../../js/jquery.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script> -->
  <script type="text/javascript" src="../../js/bootstrap.min.js" ></script>
  <!-- <script type="text/javascript" src="../../js/config.js" ></script> -->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>
  <script type="text/javascript" src="../../js/focus.js" ></script>            
  <script type="text/javascript" src="../../js/adicionar_usuario.js" ></script>  
  <script type="text/javascript" src="../../js/usuario_adicionar_validador.js" ></script>  

  <!-- <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> -->
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../../js/usuarios_listado.js" ></script>          
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

    <!-- Main -->                                                
    <div id="main-wrapper">
      <div class="row">
        <div class="col-lg-12">

          <div class="col-md-offset-4 col-md-4 col-md-offset-4">
            <?php $actual = (int) $_SESSION['actualizar'];?>                                                                                                    
            <?php  if ($actual > 0): ?>
            <div class="alert alert-success">
             El registro se realizó correctamente
           </div>   
           <?php $_SESSION['actualizar'] = 0?>                                                        
         <?php endif;?>

         <?php  if ($actual < 0): ?> 
         <div class="alert alert-danger">
          El usuario ya se encuentra registrado.
          Intentelo de nuevo 
        </div> 
        <?php $_SESSION['actualizar'] = 0?>
      <?php endif;?>

      <?php $recupera = (int) $_SESSION['recupera'];?>
      <?php  if ($recupera > 0): ?>
      <div class="alert alert-success">
        La contraseña se actualizó correctamente
      </div>  
      <?php $_SESSION['recupera'] = 0?>
    <?php endif;?>
    <h2 class="page-header">Adicionar nuevo usuario</h2>
    <div class="panel panel-default" >
    <!-- <div class="panel-heading">
      <h4 class="panel-title">Adicionar nuevo usuario</h4>
    </div> -->
    <div class="panel-body">
     <form action="../../../../../indice_usuario.php" method="POST">
      <div><input type="hidden" name="modulo" value="no_registrado"/></div>
      <div>
        Nombres<input type="text" class="form-control" placeholder=""  id="name" name="nombre" tabindex="1"/>
      </div>
      <div>
        Apellidos<input type="text" class="form-control" placeholder="" id="last_name" name="apellido" tabindex="2"/>
      </div>
      <div>
        Correo Electr&oacute;nico<input type="text" class="form-control" placeholder="" id="email" name="correo1" tabindex="3"/>
      </div>
      <div>
        Login<input type="text" class="form-control" placeholder="" id="login" name="user" tabindex="4"/>
      </div>
      <div>
        Contrase&ntilde;a<input type="password" class="form-control" placeholder=""  id="pass1" name="contrasena10" tabindex="5"/>
      </div>    
      <div>
        Repetir contraseña<input type="password" class="form-control" placeholder="" id="pass2" name="contrasena20" tabindex="6"/>
      </div>
      <div>
        Activo<input type="checkbox" name="activo" value="si" checked>
      </div>
      <div>
        <center><button type="submit" class="btn btn-primary boton" tabindex="7">Guardar</button></center>           
      </div>                                                        
    </form> 
  </div> 
</div>
</div>

</div>
</div>
</div>
</div>
<?php include_once 'footer.php';?>
</body>
</html>
