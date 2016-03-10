<?php require 'conectado.php';?>
<?php if (empty($_SESSION['usuario'])):?>
  <?php header('location:../../principal.php');?>
<?php endif;?>


<!DOCTYPE HTML>
<html>
<head>
  <title>Crear Pregunta - Modulo Encuestas</title>
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
  <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/> 
  <link rel="stylesheet" href="../../css/style_form_preguntas.css" type="text/css" media="all"/>               
  <link rel="stylesheet" href="../../css/style_form_saved_answer.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>

  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>                
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script>                
  <script type="text/javascript" src="../../js/bootstrap.js" ></script>
  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>                
  <script type="text/javascript" src="../../js/jquery.textcomplete.js" ></script>
  <!-- <script type="text/javascript" src="../../js/config.js" ></script> -->                               
  
  <script type="text/javascript" src="../../js/adicionar_pregunta.js" ></script>
  <script type="text/javascript" src="../../js/skel.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/adicionar_mod.js" ></script>-->
  <!--<script type="text/javascript" src="../../js/adicionar_modulo.js" ></script>-->

  <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <!-- <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

  <script type="text/javascript" src="../../js/preguntas.js" ></script>
  <script type="text/javascript" src="../../js/opciones_pregunta.js" ></script>

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
        <li ><?php include_once 'sesion.php';?></li>  
      </ul>

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
            <li><a href="../encuestas/index.php"><i class="fa  fa-home fa-fw"></i> Principal Editor</a></li>
            <li><a href="../encuestas/mi_perfil.php"><i class="fa  fa-tag fa-fw"></i> Perfil</a></li>
            <li>
              <a class="active" href="#" data-toggle="collapse" data-target="#dem"><i class="fa  fa-pencil fa-fw"></i> Encuestas<span class="fa arrow"></span></a>
              <ul id="dem" class="nav nav-second-level">
                <li><a href="../encuestas/adicionar.php">Nueva Encuesta</a></li>
                <li><a href="../encuestas/editar_encuesta.php">Modificar Encuestas</a></li>
                <li><a href="../encuestas/consulta.php">Activar o Desactivar</a></li>
              </ul>
            </li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#dem1"><i class="fa  fa-bar-chart-o fa-fw"></i> Anal&iacute;ticas<span class="fa arrow"></span></a>
              <ul id="dem1" class="nav nav-second-level">
               <li><a href="../analiticas/graficos1.php">Por pregunta</a></li>

               <li><a href="../analiticas/consulta1.php">Exportar respuestas</a></li> 
               <li><a href="../analiticas_avanzadas/graficos1.php">Resumen encuesta</a></li>
                                                                               
               <li><a href="../analiticas_avanzadas/graficos_mineria1.php">Avanzada</a></li>

             </ul>
           </li>
           <li >
            <a  href="#" data-toggle="collapse" data-target="#demp"><i class="glyphicon glyphicon-stats"></i> Anal&iacute;ticas Avanzadas<span class="fa arrow"></span></a>
            <ul id="demp" class="nav nav-second-level">
             <li><a href="../analiticas_avanzadas/generagraficos1.php">Por pregunta</a></li>
             <li><a href="../analiticas_avanzadas/mapagrafico1.php">Mapa gr&aacute;fico</a></li>
             <li><a href="../analiticas_avanzadas/arbolgrafico1.php">&Aacute;rbol gr&aacute;fico</a></li>
             <li><a href="../analiticas_avanzadas/graficos_burbuja1.php">Gr&aacute;fico Burbuja</a></li>
           </ul>
         </li>
         <ul class="nav navbar-top-links visible-xs">
          <li>
            <?php if (! empty($_SESSION["usuario"])): ?> 
            <li><a href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo $_SESSION["usuario"]?></a></li>
            <li><a href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n </a></li>
          <?php else:?>
          <li><a href="../no_registrado/index.php" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a></li> 
        <?php endif;?>
      </li>
    </ul>
  </ul>
</div> 
</div> 
</nav>

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Perfil Editor</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
      <!-- <div id="idmodpregun" style="display:none"><?php //include_once 'pregunta_form.php' ?></div> -->
      <div class="panel panel-default" id="idpregun">
        <div class="panel-heading">
          Adicionar M&oacute;dulos a la Encuesta: <strong> <?php //echo $_SESSION['nombre_encuesta'];?> </strong>
        </div>
        <div class="panel-body">
         <!-- <input type="checkbox" value="" checked> M&oacute;dulo: <b> <?php //echo $_SESSION['nombre_modulo'];?> </b><br/> -->
         <form class="form-inline" role="form" id="modseleccionado">
          <div class="well" id="listamodulos"></div>
          <div class="form-group">
            <input type="text" id="nombre_modulo" placeholder="Nombre del M&oacute;dulo" class="form-control"/>
            <a id="addotromodulo" class="btn btn-primary" ><span class="glyphicon glyphicon-plus-sign"></span> Adicionar M&oacute;dulo</a>
          </div>
        </form>

        <div>
          <input type="hidden" id="id_encuesta"/>
          <input type="hidden" id="id_modulo" />
        </div>
        <div id="nom" style="display:none"></div>
        <br>
        <!-- <div><center><a href="#" id="adicionarModulo" class="btn btn-primary" tabindex="1">Adicionar Modulo</a> -->
        <!-- <div><center><a href="#" id="adicionarPregunta" class="btn btn-md btn-primary" tabindex="2">Adicionar Pregunta</a></center></div> -->
        <!-- <br>
        <div>Vista previa Encuesta</div>
        <div id="informacion"></div>
        <br> --> 
      </div>
    </div>
    <div class="alert alert-danger" id="mensajepregunta" style="display:none;"></div>
    <div class="alert alert-danger" id="mensajeaddpregunta" style="display:none;"></div> 
    <div class="panel panel-default">
        <!-- <div class="panel-heading">
         Adicionar preguntas a Encuesta: <?php //echo $_SESSION['nombre_encuesta'];?>
       </div> -->
       <div class="panel-heading" id="preguntasadd">
         Adicionar preguntas a el M&oacute;dulo: <strong><?php echo $_SESSION['nombre_modulo'];?></strong> 
       </div>
       <br>    
       <div class="panel-body">
        <form>
         <div><select class="selectpicker form-control" id="id_tipo_pregunta" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="1"></select></div>
         <br>
         <div id="caja1">Ingrese el texto de la pregunta<input type="text" id="texto_pregunta" placeholder="Introduce texto de la pregunta" class="form-control" tabindex="2"/></div>
         <br>
         <div id="caja2" ><div id='etq'>Ingrese las opciones de respuesta</div> <textarea class='form-control' id='opciones' placeholder='para ingresar las opciones escriba la primera y luego presione la tecla enter' rows='4' cols='50' tabindex='2'></textarea></div>
         <div id="area_opciones"></div>
         <div id="otras_opciones"></div>
       </form>
       <div id="caja3"><center>Vista previa</center></div>
       <div id="vista_previa"></div>
       <center><a href="#" id="guardarpregunta" class="btn btn-primary" ><span class="glyphicon glyphicon-plus-sign"></span> Adicionar Pregunta</a>
        <!-- <a href="#" id="cance" class="btn btn-primary" >Cancelar</a> --></center>           
      </div>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="alert alert-success" id="vistaencuesta" style="display:none;"></div> 
    <div class="panel panel-default">
      <div class="panel-heading">
        Vista previa Encuesta: <b><?php echo $_SESSION['nombre_encuesta'];?> </b> y M&oacute;dulo: <b><?php echo $_SESSION['nombre_modulo'];?> </b>
      </div>
      <!-- <div class="panel-heading"> -->
      <!-- M&oacute;dulo: <?php //echo $_SESSION['nombre_modulo'];?> -->
      <!-- </div> -->
      <div class="panel-body">
        <!-- <div>Vista previa Encuesta</div> -->
        <div id="informacion"></div>
        <div><center><a href="#" id="terminarEdicion" class="btn btn-success" tabindex="1"><span class="glyphicon glyphicon-ok-sign"></span> Terminar</a></center></div><br>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once 'footer.php';?>
</div>
</body>
<div id="pregunta" class="modal"></div>        
<div id="modulo" class="modal"></div>
</html>



           