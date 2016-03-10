<?php require 'conectado.php';?>
<!DOCTYPE HTML>
<html>
    <head>
  <title>Principal - Ingreso</title>
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
  <link rel="stylesheet" href="../../css/style_form_ingreso_pin.css" type="text/css" media="all"/>             
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>                

  <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans++Condensed:300,300italic,700" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <script type="text/javascript" src="../../js/jquery.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>-->
  <!-- <script type="text/javascript" src="../../js/config.js" ></script> -->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>                
  <script type="text/javascript" src="../../js/focus.js" ></script>   
  <!--<script type="text/javascript" src="../../js/encuestado_ingreso_pin1.js" ></script>-->
  <!-- <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> -->
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
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

    <div id="main-wrapper" class="subpage">    
      <div class="container">                                    
        <div class="row">
          <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <?php $v = (int) $_SESSION['no_activa'];?>                                                    
            <?php  if ($v > 0): ?>
            <div class="alert alert-info">
              Debe ingresar un Pin para diligenciar la encuesta
            </div>
            <!--<script> alert("la Encuesta que usted intenta acceder ya no se encuestra activa \n Debe solicitar activarla para poder diligenciarla. o su contraseña no se encuentra registrada");</script>-->
            <?php $_SESSION['no_activa'] = 0?>
            <!--<script>$(location).attr('href',"ingreso_pin.php");</script>-->
          <?php endif;?>
          <?php $v = (int) $_SESSION['no_activa'];?>                                            
          <?php  if ($v < 0): ?>
          <div class="alert alert-danger">
            Pin no válido. Inténtelo nuevamente.
          </div>
          <?php $_SESSION['no_activa'] = 0?>
        <?php endif;?>
        
        <div class="panel panel-default">
          <div class="panel-heading"> 
            Ingrese su Pin
          </div>
          <div class="panel-body">
            <form action="../../../../../indice_encuestado.php" method="POST">
              <div><center><input type="hidden" name="id_encuesta" class="form-control" value="<?php echo $_SESSION['id_encuesta'];?>"/></center></div>
              <div>
                PIN:    
                <input type="text" name="pin" placeholder="Ingrese su codigo de 6 cifras que se le ha suministrado" class="form-control" tabindex="1"/>
              </div>                                          
              <br>
              <!--                                                <div><center><a href="#" id="ingreso_pin" class="btn btn-primary" tabindex="2">Aceptar</a></center></div>    -->
              <div><center><button type="submit" class="btn btn-primary" tabindex="2">Aceptar</button></center></div>    
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
