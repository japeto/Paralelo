<?php require_once 'conectado.php';?>
<?php $_SESSION['modulo'] = 'Encuestas'?>
<?php $_SESSION['direccionar'] = 'editor'?>

<?php if (empty($_SESSION['usuario'])):?>
    <?php header('location:../../principal.php');?>
<?php endif;?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Principal - Modulo Encuestas</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
    <style>
video {
    width: 100%;
    height: auto;
}
</style>
  <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">                
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/estilo_tabla.css" type="text/css" media="all">
  <!-- <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css" media="all"/>                
  <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/> 
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->                               
  <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>

  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>

  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>-->
  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>                
  <!-- <script type="text/javascript" src="../../js/config.js" ></script> -->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>
  <!-- <script type="text/javascript" src="../../js/encuestas_listado.js" ></script> -->
  
  <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <!-- <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>  
<body>

  <div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">Survey PROMESA</a>
      </div>
      <ul class="nav navbar-top-links navbar-right">
        <li><?php include_once 'sesion.php';?></li>  
      </ul>

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li><a href="../encuestado/index.php"><i class="fa  fa-home fa-fw"></i> Principal Encuestado</a> </li>
            <li><a href="../encuestado/mi_perfil.php"><i class="fa  fa-tag fa-fw"></i> Perfil</a></li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#dem"><i class="fa  fa-pencil fa-fw"></i> Encuestas<span class="fa arrow"></span></a>
              <ul id="dem" class="nav nav-second-level">
                <li><a href="../encuestado/responder.php">Responder Encuesta</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#dem1"><i class="fa  fa-bar-chart-o fa-fw"></i> Anal&iacute;ticas<span class="fa arrow"></span></a>
              <ul id="dem1" class="nav nav-second-level">
               <!-- <li><a href="../analiticas/graficos2.php">Gr&aacute;ficos</a></li> -->
                <!-- <li><a href="../analiticas/consulta2.php">Exportar respuestas</a></li>  -->
               <li><a href="../analiticas_avanzadas/graficos2.php">Resumen gr&aacute;fico</a></li>                                                                               
               <!-- <li><a href="../analiticas_avanzadas/graficos_mineria2.php">Avanzados</a></li> -->
             </ul>
           </li>
           <!-- <li>
            <a href="#" data-toggle="collapse" data-target="#demp"><i class="glyphicon glyphicon-stats"></i> Anal&iacute;ticas Avanzadas<span class="fa arrow"></span></a>
            <ul id="demp" class="nav nav-second-level">
             <li><a href="../analiticas_avanzadas/generagraficos2.php">Gr&aacute;ficos</a></li>
             <li><a href="../analiticas_avanzadas/mapagrafico2.php">Mapa gr&aacute;fico</a></li>
             <li><a href="../analiticas_avanzadas/arbolgrafico2.php">&Aacute;rbol gr&aacute;fico</a></li>
             <li><a href="../analiticas_avanzadas/graficos_burbuja2.php">Gr&aacute;fico Burbuja</a></li>
           </ul>
         </li> -->
         <ul class="nav navbar-top-links visible-xs">
          <li>
            <?php //if ( !empty($_SESSION["encuestado"]) ): ?> 
              <?php ///if ( !empty($_SESSION["nombre_encuestado"]) ): ?> 
                <!-- <li><a href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php //echo ">> ".$_SESSION["nombre_encuestado"]?></a></li> -->
              <?php //else:?>
                <li><a href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo "<< ".$_SESSION["encuestado"]?></a></li>
              <?php //endif;?>
              <li><a href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n </a></li>
            <?php //else:?>
              <li><a href="../no_registrado/index.php" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a></li>        
              <!--<li><a href='' title='Usuario'>Aun no se identifica</a></li>-->    
            <?php //endif;?>
          </li>
    </ul>
  </ul>
</div> 
</div>
</nav> 
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Perf&iacute;l Encuestado</h1>
    </div>
  </div>
    <div class="row">
    <div class="col-sm-offset-1 col-sm-9" >
      <div class="panel panel-default">
        <div class="panel-heading"> 
          Validacion de encuesta.
        </div>
        <div class="panel-body">
          <form action="../../../../../indice_encuestado.php" method="POST">
            <input type="hidden" name="id_encuesta" class="form-control" value="<?php echo trim($_SESSION['usuario_completo']['encuesta']);?>"/>
            <input type="hidden" name="pin" placeholder="" class="form-control" tabindex="1" value="<?php echo trim($_SESSION['usuario_completo']['pin']);?>" />
            <br>
            <div class="form-group ">
              <div class="col-md-12">
                La encuesta que usted debe responder es<br><br> <h2> <?php echo $_SESSION["usuario_completo"]['nombre_encuesta']['titulo'];?> </h2>
                <hr/>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <!-- <a id="aceptainsert" class="btn btn-primary" tabindex="1">Aceptar</a> -->
                <button type="submit" id="continuarinsert"class="btn btn-primary" tabindex="2">Continuar >> </button>
              </div>
            </div>
          </form>   
        </div>
        </div>
      </div> 
    </div>
    <!-- <div class="row"> -->
        <!-- <div class="col-lg-8 col-md-10" > -->
          <!-- <input type="hidden" id="id_usuario" value="<?php //echo $_SESSION['usuario'];?>"/> -->
          <!-- Seleccione la encuesta que desea responder. -->
        <!-- </div> -->
        <!-- &nbsp; -->
        <!-- <div class="col-lg-offset-2 col-md-8" style="margin-top:30px;"> -->
          <!-- <div class="tablita"> -->
            <!-- <table id="listadoencuestas" class="table table-condensed"></table> -->
          <!-- </div> -->
        <!-- </div> -->
    </div>
    <?php include_once 'footer.php';?>
  </div> 
</body>
</html>