<?php require_once 'conectado.php';?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>ETL  - Modulo Analisis</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0, user-scalable=no">
                               
                <link rel="stylesheet" href="../../css/main.css" type="text/css" media="all">
                <link rel="stylesheet" href="../../css/style.css" type="text/css" media="all">                
                <link rel="stylesheet" href="../../css/bootstrap.css" type="text/css" media="all"/>                
                <link rel="stylesheet" href="../../css/bootstrap-theme.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/bootstrap-theme.min.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/bootstrap-responsive.css" type="text/css" media="all"/>                                
                <link rel="stylesheet" href="../../css/bootstrap-select.css" type="text/css" media="all"/>                                                
		        <link rel="stylesheet" href="../../css/style-desktop.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/estilo_tabla.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/css/ui-lightness/jquery-ui-1.10.3.custom.css" type="text/css" media="all"/>
                <link rel="stylesheet" href="../../css/style_form_preguntas.css" type="text/css" media="all"/>
		        <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.css" />
                <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.min.css" />
                <link rel="stylesheet" type="text/css" href="../../js/jqplot/jquery.jqplot.css"  />
                
                  
                <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
                <link href='http://fonts.googleapis.com/css?family=Oswald|Lato' rel='stylesheet' type='text/css'>
		
                <script type="text/javascript" src="../../js/jquery-1.9.1.js" ></script>
                <script type="text/javascript" src="../../js/jquery-ui.js" ></script>
                <script type="text/javascript" src="../../js/bootstrap.js" ></script>
                <script type="text/javascript" src="../../js/bootstrap-select.js" ></script>                
                <script type="text/javascript" src="../../js/config.js" ></script>
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
                
                <script type="text/javascript" src="../../js/analisis_avanzado_llenar_dimensiones.js" ></script>                                
                                                
	</head>  
	<body>
        <!-- Header -->
            <!--<br>
            <br>
			<div id="header">
                            
				<header class="container" id="site-header">
                                        
							<div id="logo">
                                                            <h1>Modulo <?php echo $_SESSION['modulo'];?> Analiticas</h1>
							</div>
                </header>                           
            </div>-->
            <div class="container-fluid">
                        <div id="principal">

                           <div class="row container">
                              <!--<div class="col-md-4"><img src="images/logo13.png" class="img-responsive" alt=""></div>-->

                              <br>
                              <div class="col-md-12">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-10">
                                  <CENTER><p id="nombreProyec"> Reconociendo mi Salud Sexual y Reproductiva II </p></CENTER><br>  
                              </div>
                          </div>
                      </div>

    <div class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            </div>
    </div>                                          
                                                    <div class="collapse navbar-collapse" id="myNavbar" style="font-family: 'Lato', sans-serif;">
                                                        <ul class="nav navbar-nav navbar-right">
                                                            <li><a href="../../../../../indice_principal.php?action=index" ><i class="glyphicon glyphicon-home"></i>  Home</a></li>
                                                            <li class="current_page_item"><a href="../../../../../indice_principal.php?action=<?php echo $_SESSION['direccionar'];?>">Volver</a></li>
                                                            <li><?php include_once 'sesion.php';?></li>     
                                                        </ul>
                                                    </div>
    </div>                          

                                                 
	<div id="main-wrapper" class="subpage">
				<div class="container">
					<div class="row">
                        <div class="col-sm-3">
                          <ul class="nav nav-pills nav-stacked">
                            <strong><i class="glyphicon glyphicon-cog"></i> Opciones</strong>
                            <hr> 
                            <li><a href="index.php">Inicio</a></li>                                                    
                            <li><a href="graficos.php">Graficos</a></li>
                        </ul>
                        <hr>
                    </div>
                                            
                                            <!--<div class="6u skel-cell-important">-->
                                                
                                                <div class="col-md-8"> 
                  <div class="panel panel-default">
                   <div class="panel-heading">
                                                    
                                                    <div><center><h3>GRAFICOS</h3></center></div>
                                                    </div>
                                                    <div class="panel-body">
                                                    <div id="grafica"></div>

                                                    &nbsp;
                                                    <form action="../../../../../indice_analiticas_avanzadas.php" method="POST">                                                                                                                                                                        
                                                        <div><input type="text" name="sql1" value="SELECT pregunta17 FROM encuesta1 WHERE (consentimiento = 'Acepto') AND (fecha_de_fin_de_diligenciada_la_encuesta IS NOT NULL) AND (pregunta1 IS NOT NULL) AND 
(pregunta2 IS NOT NULL) AND (pregunta3 IS NOT NULL) AND (pregunta4 IS NOT NULL) AND (pregunta5 IS NOT NULL) AND (pregunta6 IS NOT NULL) AND 
(pregunta7 IS NOT NULL) AND (pregunta8 IS NOT NULL) AND (pregunta9 IS NOT NULL) AND (pregunta10 IS NOT NULL) AND (pregunta11 IS NOT NULL) AND 
(pregunta12 IS NOT NULL) AND (pregunta13 IS NOT NULL) AND  (pregunta14 IS NOT NULL) AND  (pregunta15 IS NOT NULL) AND (pregunta16 IS NOT NULL) AND 
(pregunta17 IS NOT NULL) AND (pregunta18 IS NOT NULL) AND  (pregunta19 IS NOT NULL) AND  (pregunta20 IS NOT NULL) AND (pregunta21 IS NOT NULL) AND 
(pregunta22 IS NOT NULL) AND (pregunta23 IS NOT NULL) AND (pregunta24 IS NOT NULL) AND  (pregunta25 IS NOT NULL) AND (pregunta26 IS NOT NULL) AND 
(pregunta27 IS NOT NULL) AND (pregunta28 IS NOT NULL) AND  (pregunta29 IS NOT NULL) AND  (pregunta30 IS NOT NULL) AND  (pregunta31 IS NOT NULL) AND 
(pregunta32 IS NOT NULL) AND (pregunta33 IS NOT NULL) AND  (pregunta34 IS NOT NULL) AND  (pregunta35 IS NOT NULL) AND  (pregunta36 IS NOT NULL) AND 
(pregunta37 IS NOT NULL) AND (pregunta38 IS NOT NULL) AND  (pregunta39 IS NOT NULL) AND  (pregunta40 IS NOT NULL) AND  (pregunta41 IS NOT NULL) AND 
(pregunta42 IS NOT NULL) AND (pregunta43 IS NOT NULL) AND (pregunta44 IS NOT NULL) AND (pregunta45 IS NOT NULL) AND (pregunta46 IS NOT NULL) AND (pregunta47 IS NOT NULL) AND 
(pregunta48 IS NOT NULL) AND (pregunta49 IS NOT NULL) AND (pregunta50 IS NOT NULL) AND (pregunta51 IS NOT NULL) AND (pregunta52 IS NOT NULL) AND (pregunta53 IS NOT NULL) AND 
(pregunta54 IS NOT NULL) AND (pregunta55 IS NOT NULL) AND (pregunta56 IS NOT NULL) AND (pregunta57 IS NOT NULL) AND (pregunta58 IS NOT NULL) AND (pregunta59 IS NOT NULL) AND 
(pregunta60 IS NOT NULL) AND (pregunta61 IS NOT NULL) AND (pregunta62 IS NOT NULL) AND (pregunta63 IS NOT NULL) AND (pregunta64 IS NOT NULL) AND (pregunta65 IS NOT NULL) AND 
(pregunta66 IS NOT NULL) AND (pregunta67 IS NOT NULL) AND (pregunta68 IS NOT NULL) AND (pregunta69 IS NOT NULL) AND (pregunta70 IS NOT NULL) AND (pregunta71 IS NOT NULL) AND 
(pregunta72 IS NOT NULL) AND (pregunta73 IS NOT NULL) AND (pregunta74 IS NOT NULL) AND (pregunta75 IS NOT NULL) AND (pregunta76 IS NOT NULL) AND (pregunta77 IS NOT NULL) AND 
(pregunta78 IS NOT NULL) AND (pregunta79 IS NOT NULL) AND (pregunta80 IS NOT NULL) AND (pregunta81 IS NOT NULL) AND (pregunta82 IS NOT NULL) AND (pregunta83 IS NOT NULL) AND 
(pregunta84 IS NOT NULL) AND (pregunta85 IS NOT NULL) AND (pregunta86 IS NOT NULL) AND (pregunta87 IS NOT NULL) AND (pregunta88 IS NOT NULL) AND (pregunta89 IS NOT NULL) AND 
(pregunta90 IS NOT NULL) AND (pregunta91 IS NOT NULL) AND (pregunta92 IS NOT NULL) AND (pregunta93 IS NOT NULL) AND (pregunta94 IS NOT NULL) AND (pregunta95 IS NOT NULL) AND 
(pregunta96 IS NOT NULL) AND (pregunta97 IS NOT NULL) AND (pregunta98 IS NOT NULL) AND (pregunta99 IS NOT NULL) AND (pregunta100 IS NOT NULL) AND (pregunta101 IS NOT NULL) AND 
(pregunta102 IS NOT NULL) AND (pregunta103 IS NOT NULL) AND (pregunta104 IS NOT NULL) AND (pregunta105 IS NOT NULL) AND (pregunta106 IS NOT NULL) AND (pregunta107 IS NOT NULL) AND 
(pregunta108 IS NOT NULL) AND (pregunta109 IS NOT NULL) AND (pregunta110 IS NOT NULL) AND (pregunta111 IS NOT NULL) AND (pregunta112 IS NOT NULL) AND (pregunta113 IS NOT NULL) AND 
(pregunta114 IS NOT NULL) AND (pregunta115 IS NOT NULL) AND (pregunta116 IS NOT NULL) AND (pregunta117 IS NOT NULL) AND (pregunta118 IS NOT NULL) AND (pregunta119 IS NOT NULL) 
ORDER BY (pin) ASC;"/></div>
                                                        &nbsp;
                                                        &nbsp;
<!--                                                        <div><select class="selectpicker form-control" id="dim_seleccionado" name="dimension_a_llenar" data-width="580px" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="1">                                                            
                                                                <option value="0">SELECCIONA LA DIMENSION A CARGAR</option>
                                                                <option value="departamento">Departamento</option>
                                                                <option value="encuesta">Encuesta</option>
                                                                <option value="encuestado">Encuestado</option>
                                                                <option value="facultad">Facultad</option>
                                                                <option value="modulo">Modulo</option>
                                                                <option value="municipio">Municipio</option>
                                                                <option value="opciones_de_respuesta">Opciones_de_respuesta</option>
                                                                <option value="preguntas">Preguntas</option>
                                                                <option value="programa">Programa</option>
                                                                <option value="universidad">Universidad</option>                                                                
                                                        </select>
                                                        </div> -->
                                                        &nbsp;
                                                        &nbsp;
<!--                                                        <div><center><a href="#" id="carga" class="btn btn-primary boton" tabindex="6">Consultar</a> <button type="reset" id="clear" class="btn btn-primary " tabindex="6" >limpiar</button> </center></div>-->
                                                        <div><center><input type="submit" class="btn btn-primary" value="Datos"></center></div>    
                                                        &nbsp;
                                                    </form>
                                                    <div class="tablita1" id="answer"></div>                                            
                                                </div>
                                                </div>
                                                </div>
                                               
					</div>
				</div>
        </div>
        <!-- Footer -->

	   <div id="footer-wrapper">
             <footer class="container" id="site-footer">
                                  <section>
                                          <center><img class="img-responsive" src="../../images/logos_inferior.png" width="1200px" height="180px"></center>
                                  </section>
                              <div class="12u">
                                  <div class="divider"></div>
                              </div>
             </footer>
      </div>
</div>
</div>
	</body>
</html>
