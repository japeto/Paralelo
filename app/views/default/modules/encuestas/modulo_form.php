<?php session_start();?>
<div class="panel panel-default"> 
<script type="text/javascript" src="../../js/adicionar_pregunta2.js" ></script>
<div class="panel-heading">        
       <form action="../../../../../indice_encuestas.php" method="POST">
           <div><input type="hidden" id="id_encuesta" value='<?php echo $_SESSION['id_encuesta'];?>'></div>           
           <div><center><label>Asignar un nuevo m&oacute;dulo a: <?php echo $_SESSION['nombre_encuesta'];?></label></center></div></div>
           <div class="panel-body">
           <div><label>Nombre del m&oacute;dulo</label><input type="text" id="nombre_modulo" placeholder="Ingrese el nombre del nuevo modulo" class="form-control" tabindex="1"/></div>
           </div>
           <center><a href="#" id="guard2" class="btn btn-primary" >Guardar</a>
            <a href="#" id="cancel1" class="btn btn-primary" >Cancelar</a><center><br>
        </form>   
    </div>

