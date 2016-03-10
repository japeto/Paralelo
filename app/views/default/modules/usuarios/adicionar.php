<?php require 'conectado.php';?>
<?php if (empty($_SESSION['usuario'])):?>
    <?php header('location:../../principal.php');?>
<?php endif;?>

<!DOCTYPE HTML>
<html>
<head>
  <title>Adicionar Usuarios - Registrar nuevo</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">

  <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <!-- <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->
  <!-- <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                 -->
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>  
  <!-- <link rel="stylesheet" href="../../css/style_form_preguntas.css" type="text/css" media="all"/> -->
  <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>-->
  
  <script type="text/javascript" src="../../js/jquery.min.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>-->
  <!--<script type="text/javascript" src="../../js/config.js" ></script>s-->
  <script type="text/javascript" src="../../js/skel.min.js" ></script> 
  <script type="text/javascript" src="../../js/focus.js" ></script>            
  <script type="text/javascript" src="../../js/adicionar_usuario.js" ></script>            
  <script type="text/javascript" src="../../js/usuario_adicionar_validador.js" ></script> 

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
            <a href="../administrador/index.php"><i class="fa  fa-home fa-fw"></i> Principal Adminitrador</a>
          </li>
          <li><a href="../administrador/mi_perfil.php"><i class="fa  fa-tag fa-fw"></i> Perfil</a></li>
          <li>
            <a href="#" data-toggle="collapse" data-target="#demo"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
            <ul id="demo" class="nav nav-second-level">
              <li><a href="../usuarios/adicionar.php">Crear nuevo</a></li>
              <li><a href="../usuarios/adicionarvarios.php">Crear encuestados</a></li>
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
    </div>
    <div class="col-md-10 col-md-offset-1">
    <?php  //echo $_SESSION['actualizar']; ?>
    <?php $actual = (int) $_SESSION['actualizar'];?>
    <?php  if ($actual > 0): ?>                                                    
      <div class="alert alert-info">
      El registro se realizó correctamente <a href="listado.php" class="alert-link">Lista de usuaios</a>.
      </div>
      <?php $_SESSION['actualizar'] = 0?>
    <?php endif;?>

    <?php  if ($actual < 0): ?>
      <div class="alert alert-danger">
      El usuario ya se encuentra registrado. Inténtelo de nuevo 
      </div> 
      <?php $_SESSION['actualizar'] = 0?>
    <?php endif;?>

    <?php $recupera = (int) $_SESSION['recupera'];?>
    <?php  if ($recupera > 0): ?>
        <div class="alert alert-info">
        La contraseña se actualizó correctamente
        </div>    
    <?php $_SESSION['actualizar'] = 0?>                                                        
    <?php endif;?>

<div class="panel panel-default">
 <div class="panel-heading">
  Adicionar nuevo usuario           
</div>
<div class="panel-body">
  <form action="../../../../../indice_usuario.php" method="POST" class="form-horizontal addusuario">
    <input type="hidden" name="modulo" value="usuarios"/>
    <div class="form-group ">
        <label class="control-label col-sm-3">Nombres</label>
        <div class="col-md-8">
          <input type="text"  class="form-control" placeholder="Ingrese el nombre completo"  id="name" name="nombre" tabindex="1"/>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label col-sm-3">Apellidos</label>
        <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Ingrese los apellidos completos" id="last_name" name="apellido" tabindex="2"/>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label col-sm-3">Correo Electr&oacute;nico</label>
        <div class="col-md-8">
          <input type="text"  class="form-control" placeholder="Ingrese el correo electr&oacute;nico" id="email" name="correo1" tabindex="3"/>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label col-sm-3">Nombre de usuario</label>
        <div class="col-md-8">
          <input type="text" class="form-control" placeholder="Ingrese el nombre de usuario o login" id="login" name="user" tabindex="4"/>
        </div>
    </div>
    <div class="form-group ">
        <label class="control-label col-sm-3">Contrase&ntilde;a</label>
        <div class="col-md-3">
          <input type="password" class="form-control" placeholder="Ingrese una contraseña"  id="pass1" name="contrasena10" tabindex="5"/>
        </div>
        <label class="control-label col-sm-2">Repetir Contrase&ntilde;a </label>
        <div class="col-md-3">
          <input type="password" class="form-control" placeholder="Ingrese nuevamente" id="pass2" name="contrasena20" tabindex="6"/>
        </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-3">Universidad a la que pertenece:</label>
      <div class="col-md-8">
        <select class="selectpicker form-control"  id="universidadparticipante" name="universidadparticipante" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="7">                        
          <option value="0">Seleccione la Universidad</option>
          <option value="uvsf">UNIVERSIDAD DEL VALLE (sede San Fernando)</option>
          <option value="uvme">UNIVERSIDAD DEL VALLE (sede Melendez)</option>
          <option value="uvpa">UNIVERSIDAD DEL VALLE (sede Palmira)</option>
          <option value="uvyu">UNIVERSIDAD DEL VALLE (sede Yumbo)</option>
          <option value="uvbu">UNIVERSIDAD DEL VALLE (sede Buenaventura)</option>
          <option value="uvbg">UNIVERSIDAD DEL VALLE (sede Buga)</option>
          <option value="uvtu">UNIVERSIDAD DEL VALLE (sede Tulua)</option>
          <option value="uvca">UNIVERSIDAD DEL VALLE (sede Caicedonia)</option>
          <option value="uvza">UNIVERSIDAD DEL VALLE (sede Zarzal)</option>
          <option value="uvcr">UNIVERSIDAD DEL VALLE (sede Cartago)</option>
          <option value="uvno">UNIVERSIDAD DEL VALLE (sede Norte del Cauca)</option>
          <option value="puj">PONTIFICIA UNIVERSIDAD JAVERIANA</option>
          <option value="usc">UNIVERSIDAD SANTIAGO DE CALI</option>
        </select>
      </div>
    </div>
    <div class="form-group">
    <label class="control-label col-sm-3">Perfil</label>
      <div class="col-md-4">
        <select class="form-control" id="tipousaurio" name="tipousaurio" tabindex="8">
          <option value="-1">Selecciona un perfil</option>
        </select>
      </div>
        <label class="control-label col-sm-2">Estado: </label>
        <div class="col-md-2">
        <!-- <input type="checkbox"  class="" name="activo" value="si" checked> -->
            <input type="checkbox"  id="activo" name="activo" value="si" checked tabindex="9">
            <div class="btn-group pull-right">
                <label for="activo" class="btn btn-default">
                    <span class="glyphicon glyphicon-ok"></span>
                    <span> </span>
                </label>
                <label for="activo" class="btn btn-default active">
                    Activo
                </label>
            </div>
        </div>
    </div>
    <hr/>
    <div class="col-sm-offset-5 col-sm-2 col-xs-12">
      <button type="submit" class="btn btn-primary boton " tabindex="10"><i class="fa  fa-user fa-fw"></i> Crear nuevo usuario</button>
      <!-- <a href="../usuarios/adicionarvarios.php" class="btn btn-info boton " tabindex="11"><i class="fa fa-group fa-fw"></i> Crear varios usuarios</a> -->
    </div>
  </form>  
</div>
</div>
</div>
</div>
</div>
<?php include_once 'footer.php';?>
</div> 
</body>
</html>

