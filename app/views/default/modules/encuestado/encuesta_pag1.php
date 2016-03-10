<?php session_start();?>
<?php if (empty($_SESSION['encuestado'])):?>
    <?php header('location:../../principal.php');?>
<?php endif;?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Principal encuesta</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/estilo_tabla.css" type="text/css" media="all">                
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <!-- <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->                                                                
  <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/style_cargar_encuesta.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>                
  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>

  <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans++Condensed:300,300italic,700" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>                
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script> 
  <script type="text/javascript" src="../../js/jquery-ui-1.10.3.custom.js" ></script> 
  <script type="text/javascript" src="../../js/encuestado_cargar.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>-->
  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>
  <!--<script type="text/javascript" src="../../js/config.js" ></script>-->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>                
  <script type="text/javascript" src="../../js/focus.js" ></script>

  <!-- <link href="../../dist/css/sb-admin-2.css" rel="stylesheet"> -->
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../../js/encuestado_continuar.js" ></script>    
                
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

  <!-- Main -->
  <div id="main-wrapper">
    <div class="row">
      <div class="col-lg-12">
       <!--<h4 class="page-header"><div id='title'></div></h4> -->
       <div id='title'></div>
       <div id="arreglos"></div>
     </div>
   </div>
   <div class="container">                                                                        
    <form><input type="hidden" id="id_encuesta" value="<?php echo $_SESSION['id_encuesta'];?>"/>
      <?php if (isset($_GET['mod'])):?>                                            
      <input type="hidden" id="id_modulo_actual" value="<?php echo $_GET['mod'];?>"/>
    <?php endif;?> 
    <input type="hidden" id="cantidad_total_modulos"/>
    <input type="hidden" id="pin" value="<?php echo $_SESSION["encuestado"];?>"/>
    <input type="hidden" id="id_universidad" value="<?php echo substr($_SESSION["encuestado"], 0, -6);?>"/>
  </form>                                            
  <div id="contenedor"></div>                                            
</div>  
</div>

<?php include_once 'footer.php';?>
</body>
</html>
