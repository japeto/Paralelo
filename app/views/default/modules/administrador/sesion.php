<?php if (! empty($_SESSION["usuario"])): ?> 
    <li><a class="hidden-xs" href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo $_SESSION["usuario"]?></a></li>
    <li><a class="hidden-xs" href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n  </a></li>
<?php else:?>
    <li><a class="hidden-xs" href="#" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n   </a></li>        
     
<?php endif;?>
