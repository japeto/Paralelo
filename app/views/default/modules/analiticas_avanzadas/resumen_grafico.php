<?php require_once 'conectado.php';?>
<!DOCTYPE HTML>
<html>
  <head>

  <title>Graficos  - Modulo Analisis</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />

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
  <!--<script type="text/javascript" src="../../js/config.js" ></script>-->
  <script type="text/javascript" src="../../js/skel.min.js" ></script>

  <!--<script type="text/javascript" src="../../js/principal1.js" ></script>
  <script type="text/javascript" src="../../js/verPreliminares.js" ></script>-->

  <!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->

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

                <!-- Load d3.js and c3.js -->
    <script type="text/javascript" src="../../js/c3/d3.js"></script>
    <script type="text/javascript" src="../../js/c3/c3.js"></script>
    <!-- Load c3.css -->
    <link href="../../js/c3/c3.css" rel="stylesheet" type="text/css">
    <!-- Load d3.js-->
    <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>

    <script type="text/javascript" src="../../js/analisis_resumen_graficos.js" ></script>

  <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
  <link href="dist/css/timeline.css" rel="stylesheet">
  <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <script src="dist/js/sb-admin-2.js"></script>
  <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</head>
<body>
<!--
<div id="header-wrapper">
<header class="container" id="site-header">
  <div class="row">
      <div class="12u">
        <div id="logo">
        <h1>Modulo Analiticas</h1>
      </div>
      <nav id="nav">
        <ul>
        <li><?php //include_once '../../sesion.php';?></li>
        </ul>
      </nav>
    </div>
  </div>
</header>
</div>-->
<!-- <div class="container-fluid">
<div id="principal">
 -->
 <div id="wrapper">

  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="container-fluid">
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
        <li class="current_page_item"><a href="../../../../../indice_principal.php?action=index" id="modeltrigger"><i class="glyphicon glyphicon-home"></i>  Inicio</a></li>
      </ul>
    </div>
  </nav>

  <div id="page-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">Resultados Preliminares</h1>
          <br>
          <center>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  Participación estudiantil según universidad, Cali 2014.
                </h4>
              </div>
              <div id="grafica0">
              </div>
            </div>
          </center>                                
          <hr>
        </div>
      </div>
      
      <div class="row">
       <div class="col-lg-12">
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                Clasificación socioeconómica según estrato estudiantes universitarios Cali, 2014.
              </h4>
            </div>
            <div class="panel-body">
              <div id="grafica1"></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class='panel-title'>
                Procedencia de ingresos económicos para  sostenimiento de estudiantes universitarios Cali, 2014.
              </h4>
            </div>
            <div class="panel-body">
              <div id="grafica2"></div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class='panel-title'>
                Percepción de riesgo académico en estudiantes universitarios Cali, 2014.
              </h4>
            </div>
            <div class="panel-body">
              <div id="grafica3"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Dialogo previo sobre sexualidad antes del inicio de relaciones  sexuales Estudiantes universitarios Cali, 2014.
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica4"></div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. '/n' Evitar o posponer una práctica  sexual.
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica5"></div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014 /n Cosas que te gustan o te disgustan en las prácticas sexuales.
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica6"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
           <h4 class='panel-title'>
            Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. Formas de evitar el embarazo.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica7"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. Formas de evitar el embarazo.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica8"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. Uso de preservativos o métodos de barrera  para evitar infecciones de transmisión sexual (VIH/SIDA)</h4>
          </div>
          <div class="panel-body">
            <div id="grafica9"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. El pasado sexual de ambos (número de parejas, prácticas sexuales).
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica10"></div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Concertación con la pareja en temas de sexualidad estudiantes universitarios Cali, 2014. El pasado sexual de ambos (número de parejas, prácticas sexuales).
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica11"></div>
          </div>
        </div>
      </div>
      
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class='panel-title'>
              Frecuencia declarada de infecciones de transmisión sexual en estudiantes universitarios Cali, 2014.
            </h4>
          </div>
          <div class="panel-body">
            <div id="grafica12"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
           <h4 class='panel-title'>
            Frecuencia declarada de realización de la prueba del VIH?  en estudiantes universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica13"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Frecuencia de uso de métodos anticonceptivos estudiantes universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica14"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Participación en grupos juveniles estudiantes universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica15"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>Percepción de manifestaciones Homofóbicas en el entorno estudiantes universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica16"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Venta de preservativos en campus universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica17"></div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class='panel-title'>
            Frecuencia de consulta a  establecimiento de salud para obtener atención en salud sexual y reproductiva en el último año. estudiantes universitarios Cali, 2014.
          </h4>
        </div>
        <div class="panel-body">
          <div id="grafica18"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<?php include_once 'footer.php';?>
</div>
</body>
</html>
