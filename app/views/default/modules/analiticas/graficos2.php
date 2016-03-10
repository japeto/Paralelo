<?php require_once 'conectado.php';?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Graficos  - Modulo Analisis</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">

   <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
  <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">                
  <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>
  <!-- <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/> -->                                
  <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                
  <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/estilo_tabla.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
  <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.css" />
  <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.min.css" />
  <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.css"  />

  <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'> -->

  <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>
  <script type="text/javascript" src="../../js/jquery-ui.js" ></script>
  <!--<script type="text/javascript" src="../../js/bootstrap.js" ></script>-->
  <script type="text/javascript" src="../../js/bootstrap-select.js" ></script> 
  <script type="text/javascript" src="../../js/skel.min.js" ></script>                
  
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  
  <script language="javascript" type="text/javascript" src="../../js/jqplot/jquery.jqplot.js"></script>                                
  <script language="javascript" type="text/javascript" src="../../js/jqplot/jquery.jqplot.min.js"></script>                
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.json2.min.js"></script>                
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.pointLabels.min.js"></script>                              
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.dateAxisRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.canvasTextRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.categoryAxisRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.barRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.pieRenderer.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../js/jqplot/plugins/jqplot.donutRenderer.min.js"></script>
  
  <script type="text/javascript" src="../../js/c3/d3.js"></script>
  <script type="text/javascript" src="../../js/c3/c3.js"></script>
  <!-- Load c3.css -->
  <link href="../../js/c3/c3.css" rel="stylesheet" type="text/css">
  <!-- Load d3.js-->
  <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

  <script type="text/javascript" src="../../js/analisis_cargar_combos.js" ></script>    

  <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
  <link href="../../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="../../dist/css/timeline.css" rel="stylesheet">
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
                  <!-- <li><a href="../encuestas/editar_encuesta.php">Modificar Encuestas</a></li> -->
                  <!-- <li><a href="../encuestas/consulta.php">Activar o Desactivar</a></li> -->
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="collapse" data-target="#dem1"><i class="fa  fa-bar-chart-o fa-fw"></i> Anal&iacute;ticas<span class="fa arrow"></span></a>
                <ul id="dem1" class="nav nav-second-level">
                 <li><a href="../analiticas/graficos2.php">Gr&aacute;ficos</a></li>
                 <!-- <li><a href="../analiticas/consulta2.php">Exportar respuestas</a></li>  -->
                 <li><a href="../analiticas_avanzadas/graficos2.php">Resumen gr&aacute;fico</a></li>                                                                               
                 <li><a href="../analiticas_avanzadas/graficos_mineria2.php">Avanzados</a></li>
               </ul>
             </li>
             <li>
              <a href="#" data-toggle="collapse" data-target="#demp"><i class="glyphicon glyphicon-stats"></i> Anal&iacute;ticas Avanzadas<span class="fa arrow"></span></a>
              <ul id="demp" class="nav nav-second-level">
               <li><a href="../analiticas_avanzadas/generagraficos2.php">Gr&aacute;ficos</a></li>
               <li><a href="../analiticas_avanzadas/mapagrafico2.php">Mapa gr&aacute;fico</a></li>
               <li><a href="../analiticas_avanzadas/arbolgrafico2.php">&Aacute;rbol gr&aacute;fico</a></li>
               <li><a href="../analiticas_avanzadas/graficos_burbuja2.php">Gr&aacute;fico Burbuja</a></li>
             </ul>
           </li>
           <ul class="nav navbar-top-links visible-xs">
            <li>
              <?php if ( !empty($_SESSION["encuestado"]) ): ?> 
                <?php if ( !empty($_SESSION["nombre_encuestado"]) ): ?> 
                  <li><a href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo $_SESSION["nombre_encuestado"]?></a></li>
                <?php else:?>
                  <li><a href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo $_SESSION["encuestado"]?></a></li>
                <?php endif;?>
                <li><a href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n </a></li>
              <?php else:?>
                <li><a href="../no_registrado/index.php" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a></li>        
                <!--<li><a href='' title='Usuario'>Aun no se identifica</a></li>-->    
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
        <h1 class="page-header">Perfil Encuestado</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Crear Gr&aacute;fico  
            </h4>                                               
          </div>
          <div class="panel-body">
            <form action="../../../../../indice_encuestas.php" method="POST">                                                        
              <div>                            
                <input type="hidden" id="id_usuario" value='<?php echo $_SESSION['usuario'];?>'/>                                                            
                <input type="hidden" id="id_tipo_pregunta_grafico" value='1'/>
              </div> 
              <br>
              <div><select class="selectpicker form-control" id="grafico_seleccionado" name="encuesta_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="1">                                                            
                <option value="0">Selecciona tipo de Gr&aacute;fico</option>
                <option value="1">Barras</option>
                <option value="2">Pastel</option>
                <option value="3">Dona</option>
              </select>
            </div>
            <br>
            <div id="enc"><select class="selectpicker form-control" id="encuesta_seleccionada" name="encuesta_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="1">                                                            
              <option value="0">Seleccione la Encuesta</option>
            </select>
          </div>
          <br>
          <div id="mod"><select class="selectpicker form-control" id="modulo_seleccionado" name="modulo_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="2">
            <option value="0">Seleccione un M&oacute;dulo</option>
          </select>
        </div>                                                        
        <br>
        <div id="pre"><select class="selectpicker form-control" id="pregunta_seleccionada" name="pregunta_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="2">
          <option value="0">Seleccione una Pregunta</option>                                                            
        </select>
      </div> 
      <br>
      <div id="university">
       <select class="selectpicker form-control"  id="id_university" name="universidad_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="2">                        
         <option value="0">Seleccione la Universidad</option>
         <option value="uvsf">UNIVERSIDAD DEL VALLE (sede San Fernando)</option>
         <option value="uvme">UNIVERSIDAD DEL VALLE (sede Melendez)</option>
         <option value="puj">PONTIFICIA UNIVERSIDAD JAVERIANA</option>                                
         <option value="usc">UNIVERSIDAD SANTIAGO DE CALI</option>                
       </select>
     </div>
     <br>
     <div id="fac">
       <select class="selectpicker form-control"  id="id_facultad" name="facultad_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="2">                        
         <option value="0">Seleccione la Facultad</option>                                                               
       </select>
     </div>
     <br>
     <div id="prog">
       <select class="selectpicker form-control"  id="id_programa" name="programa_a_graficar" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="2">                        
         <option value="0">Seleccione el Programa</option>                                                               
       </select>
     </div>
     <br>
     <div id="date">
      <input type='text' class='caja1' placeholder="seleccione la fecha de inicio" id='show_rango1' tabindex="3"/><input type='hidden' id='rango1' />
      <br>
      <input type='text' class='caja1' placeholder="seleccione la fecha de fin" id='show_rango2' tabindex="4"/><input type='hidden' id='rango2' />                                
    </div>
    <br>
    <div id="code">
      <input type='text' class='caja1' placeholder="ingrese el codigo" id='codigo' tabindex="5"/>
    </div>                                                       
    <br>
    <div><center><a href="#" id="consulta" class="btn btn-primary boton" tabindex="6">Consultar</a> <button type="reset" id="clear" class="btn btn-primary " tabindex="6" >limpiar</button> </center></div>
    <br>
  </form>
</div>
</div>
</div>

<div class="col-lg-6">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class='panel-title'>
        Gr&aacute;fico Resultado
      </h4>                                                    
    </div>
    <div class="panel-body">
      <div id="grafica"></div>
    </div>
  </div>
</div>
</div>

</div>
</div>
<?php include_once 'footer.php';?>
</body>
</html>