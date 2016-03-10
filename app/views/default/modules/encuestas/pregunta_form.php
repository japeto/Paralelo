<?php session_start();?>

<div class="alert alert-danger" id="mensajepregunta" style="display:none;"></div>
<div class="panel panel-default">
  <div class="panel-heading">
     Adicionar preguntas a Encuesta: <?php echo $_SESSION['nombre_encuesta'];?>
   </div>
   <div class="panel-heading">
     M&oacute;dulo: <?php echo $_SESSION['nombre_modulo'];?>
   </div>          
     <div class="panel-body">
      <form>
       <div><select class="selectpicker form-control" id="id_tipo_pregunta" data-width="" data-live-search="true" data-style="btn btn-primary" data-size="5" tabindex="1"></select></div>
       <br>
       <div id="caja1"><label>Ingrese el texto de la pregunta</label><input type="text" id="texto_pregunta" placeholder="Introduce texto de la pregunta" class="form-control" tabindex="2"/></div>
       <br>
       <div id="caja2" ><label id='etq'>Ingrese las opciones de respuesta</label><textarea class='form-control' id='opciones' placeholder='para ingresar las opciones escriba la primera y luego presione la tecla enter' rows='4' cols='50' tabindex='2'></textarea></div>
       <div id="area_opciones"></div>
       <div id="otras_opciones"></div>
     </form>
     <div id="caja3"><center><label>Vista previa</label></center></div>
     <div id="vista_previa"></div>
     
     <center><a href="#" id="guardarpregunta" class="btn btn-primary" >Guardar</a>
      <a href="#" id="cance" class="btn btn-primary" >Cancelar</a></center>           
    </div>
  </div>

  <script type="text/javascript" src="../../js/jquery.textcomplete.js" ></script>
  <script type="text/javascript" src="../../js/preguntas.js" ></script>
  <script type="text/javascript" src="../../js/opciones_pregunta.js" ></script>    