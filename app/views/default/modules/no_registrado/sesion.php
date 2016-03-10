<?php if (! empty($_SESSION["usuario"])): ?> 
    <li><a href='' title='Usuario'><i class="glyphicon glyphicon-user"></i> Bienvenid@ <?php echo $_SESSION["usuario"]?></a></li>
    <li><a href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="glyphicon glyphicon-log-out"></i> Cerrar Sesi&oacute;n </a></li>
<?php else:?>
    <li><a href="#" id="login" ><i class="glyphicon glyphicon-log-in"></i> Iniciar Sesi&oacute;n</a></li>        
    <!--<li><a href='' title='Usuario'>Aun no se identifica</a></li>-->    
<?php endif;?>
