<?php require_once 'conectado.php';?>
<?php if (empty($_SESSION['usuario'])):?>
    <?php header('location:../../principal.php');?>
<?php endif;?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Pines generados - Modulo Pines</title>
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
  <link rel="stylesheet" href="../../css/estilo_tabla.css" type="text/css" media="all"/>
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
  <script type="text/javascript" src="../../js/pines_generar.js" ></script>

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
        <?php include_once 'sesion.php';?>
      </ul>

      <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu">
           <li class="current_page_item">
            <a href="../administrador/index.php"><i class="fa  fa-home fa-fw"></i> Principal Administrador</a>
          </li>
          <li><a href="../administrador/mi_perfil.php"><i class="fa  fa-tag fa-fw"></i> Perfil</a></li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
            <ul id="demo" class="nav nav-second-level">
              <li><a href="../usuarios/adicionar.php">Crear nuevo</a></li>
              <li><a href="../usuarios/listado_usuario.php">Actualizar</a></li>
              <li><a href="../usuarios/consulta.php">Activar o Desactivar</a></li>
            </ul>
          </li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#de"><i class="fa  fa-tags fa-fw"></i> Perfiles<span class="fa arrow"></span></a>
            <ul id="de" class="nav nav-second-level">
             <li><a href="../perfil/adicionar.php">Nuevo perfil</a></li>
             <li><a href="../perfil/listado_perfil.php">Actualizar perfil</a></li>
             <li><a href="../perfil/consulta.php">Activar o Desactivar</a></li>
           </ul>
         </li>
         <li>
          <a href="../../../../../indice_principal.php?action=pines"><i class="fa  fa-qrcode fa-fw"></i> Pines<span class="fa arrow"></span></a>
          <ul id="de" class="nav nav-second-level">
           <li><a href="../pines/index.php">Generar Pin</a></li>
           <li><a href="../pines/consulta.php">Consultar Pines</a></li>
           <li><a href="../pines/listados.php">Listado</a></li>
         </ul>
       </li>
       <li>
        <a href="#" data-toggle="collapse" data-target="#dem"><i class="fa  fa-bar-chart-o fa-fw"></i> Anal&iacute;ticas<span class="fa arrow"></span></a>
        <ul id="dem" class="nav nav-second-level">
         <li><a href="../analiticas/graficos.php">Por pregunta</a></li>
         <li><a href="../analiticas/consulta.php">Exportar respuestas</a></li> 
         <li><a href="../analiticas_avanzadas/graficos.php">Resumen encuesta</a></li>
                                                                               
         <li><a href="../analiticas_avanzadas/graficos_mineria.php">Avanzada</a></li>

       </ul>
     </li>
     <li>
      <a href="#" data-toggle="collapse" data-target="#demp"><i class="glyphicon glyphicon-stats"></i> Anal&iacute;ticas Avanzadas<span class="fa arrow"></span></a>
      <ul id="demp" class="nav nav-second-level">
       <li><a href="../analiticas_avanzadas/generagraficos.php">Por pregunta</a></li>

       <li><a href="../analiticas_avanzadas/mapagrafico.php">Mapa gr&aacute;fico</a></li>
       <li><a href="../analiticas_avanzadas/arbolgrafico.php">&Aacute;rbol gr&aacute;fico</a></li>
       <li><a href="../analiticas_avanzadas/graficos_burbuja.php">Gr&aacute;fico Burbuja</a></li>
     </ul>
   </li>
   <ul class="nav navbar-top-links navbar-right visible-xs">
    <li>
      <?php if (! empty($_SESSION["usuario"])): ?> 
      <li><a  href='#' title='Usuario'><i class="fa  fa-user fa-fw"></i>Bienvenid@ <?php echo $_SESSION["usuario"]?></a></li>
      <li><a  href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n </a></li>
    <?php else:?>
    <li><a href="#" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a></li>  
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
      <h1 class="page-header">Perfil Administrador</h1>
      <?php $pines = $_SESSION['pines']?>

      <div class="panel panel-default">
       <div class="panel-body">                            
        <table class="table table-condensed">                                                        
          <?php 
          $numcolumnas = 5;   
          if (count($pines)>0)
          {
            echo "<thead><tr><th colspan=\"$numcolumnas\">CONTRASEÑAS GENERADAS</th></tr><thead><tbody><tr><td colspan=\"$numcolumnas\">se generaron ".count($pines)." contraseñas de acceso</td></tr>";
            $i = 1;
            foreach ($pines as $p):
              $resto = ($i % $numcolumnas); 
            if($resto == 1)
            { 
              echo "<tr>";
            }
            echo "<td>".$p."</td>";

            if($resto == 0)
            {
              echo "</tr>"; 
            }
            $i++; 
            endforeach;

            if($resto != 0)
            {
              for ($j = 0; $j < ($numcolumnas - $resto); $j++)
              {
                echo "<td></td>";
              }
              echo "</tr>";
            } 
          }
          else
          { 
            echo "<tr><td>0 elementos encontrados</td></tr> ";
          } ?> 
        </tbody>
      </table>                                                        
    </div>
  </div>
</div>
</div>
</div>
<?php include_once 'footer.php';?>
</div> 
</body>
</html>