<?php require_once 'conectado.php';?>
<?php $_SESSION['modulo'] = 'Encuestas'?>
<?php $_SESSION['direccionar'] = 'editor'?>
<?php if (empty($_SESSION['usuario'])):?>
    <?php header('location:../../principal.php');?>
<?php endif;?>

<!DOCTYPE HTML>
<html>
<head>


  <title>Crear Encuestas - Modulo Encuestas</title>
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
  <link rel="stylesheet" href="../../css/style-form.css" type="text/css" media="all"/>

  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>

  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>--> 
  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>                
  <!-- <script type="text/javascript" src="../../js/config.js" ></script> -->                
  <script type="text/javascript" src="../../js/skel.min.js" ></script>
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js" ></script>
  <script type="text/javascript" src="../../js/encuestas.js" ></script>
  
  <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="../../dist/css/fileinput.css" rel="stylesheet">
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
  <!-- <link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link href="../../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="../../dist/js/sb-admin-2.js"></script>
  <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
 <!--  <?php //include_once 'upload.php';?> -->
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
            <li><a href="../encuestas/index.php"><i class="fa  fa-home fa-fw"></i> Principal Editor</a></li>
            <li><a href="../encuestas/mi_perfil.php"><i class="fa  fa-tag fa-fw"></i> Perfil</a></li>
            <li>
              <a href="#" data-toggle="collapse" data-target="#dem"><i class="fa  fa-pencil fa-fw"></i> Encuestas<span class="fa arrow"></span></a>
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
           <li>
            <a href="#" data-toggle="collapse" data-target="#demp"><i class="glyphicon glyphicon-stats"></i> Anal&iacute;ticas Avanzadas<span class="fa arrow"></span></a>
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
          <?php $actual = (int) $_SESSION['actualizar'];?>                                                                                                    
          <?php  if ($actual > 0): ?>
           <div class="alert alert-info">                                                    
          El registro se realizó correctamente
          </div>
          <?php $_SESSION['actualizar'] = 0?>                                                        
          <?php endif;?>
        
      <div id="adi"></div>
      <div id="pread">
       <div class="panel panel-default" id="modp">
        <div class="panel-heading">
         Registrar una nueva Encuesta
       </div>
       <div class="panel-body">
        <form name='formname' role="form" action="../../../../../indice_encuestas.php" method="POST" enctype="multipart/form-data">
          <div>
            <input type="hidden" id="id_user" name="id_usuario" value='<?php echo $_SESSION['usuario'];?>'>
            <input type="hidden" id="estate" name="estado" value="Editar">
            <input type="hidden" id="flag" name="bandera" value="adicionar">
          </div>
          <div>
            Título
            <br>
            <input type="text" id="title" name="titulo_encuesta" placeholder="Introduce el titulo de la encuesta" class="form-control" tabindex="2"/>
          </div>
          <br>
          <div>Mensaje de Consentimiento</div>
          <br>
          <div><textarea id="consentimiento_info" class="form-control" name="consentimiento" tabindex="3" rows="8"></textarea></div>
          <br>
         <!--  <div class="form-group">
              <label>Subir Mensaje de Consentimiento</label>
              <input type="file">
          </div> -->
          <!-- <form method="POST"  action="" role="form" enctype="multipart/form-data"> -->
              <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-default btn-file">
                          Seleccionar consentimiento... <input type="file" name="archivo">
                          <span class="glyphicon glyphicon-folder-open"></span>
                      </span>
                  </span>
                  <span class="input-group-btn" style="display:none;">
                    <input class="btn btn-primary" type="submit" value="subir" name="subir">
                  </span>
                  <input type="text" class="form-control" readonly>           
              </div>
              <!-- <label>Subir Mensaje de Consentimiento</label> -->
              <!-- <div> -->
                <!-- <input type="file" name="archivo"> -->
                <!-- <input type="submit" value="subir" name="subir"> -->
              <!-- </div> -->
            <!-- </form>           -->
            <hr>
          <div><center><a type="button" id="port" class="btn btn-primary" onClick = "Ok();" value="Continuar"><span class="glyphicon glyphicon-circle-arrow-right"></span> Continuar</a></center></div>                                                                
        </div>
          </form>
          <!-- <div class="panel-body">
          <div class="row">
          <div class="col-lg-12">
          <form method="POST"  action=""role="form" enctype="multipart/form-data">
              <div class="input-group">
                  <span class="input-group-btn">
                      <span class="btn btn-default btn-file">
                          Seleccionar consentimiento... <input type="file" name="archivo">
                          <span class="glyphicon glyphicon-folder-open"></span>
                      </span>
                  </span>
                  <span class="input-group-btn" style="display:none;">
                    <input class="btn btn-primary" type="submit" value="subir" name="subir">
                  </span>
                  <input type="text" class="form-control" readonly>           
              </div> -->
              <!-- <label>Subir Mensaje de Consentimiento</label> -->
              <!-- <div> -->
                <!-- <input type="file" name="archivo"> -->
                <!-- <input type="submit" value="subir" name="subir"> -->
              <!-- </div> -->
           <!--  </form>
            </div>
            </div>
            </div> -->
    </div>
  </div>

</div>
</div>
</div>
<?php include_once 'footer.php';?>
</div>  
</body>
</html>