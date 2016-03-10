<?php if (! empty($_SESSION["usuario"])): ?> 
    <li><a class="hidden-xs" href='' title='Usuario'><i class="fa  fa-user fa-fw"></i> Bienvenid@ <?php echo $_SESSION["usuario"]?></a></li>
    <li><a class="hidden-xs" href='desconectado.php' title='Cerrar Sesi&oacute;n'><i class="fa  fa-sign-out fa-fw"></i> Cerrar Sesi&oacute;n </a></li>
<?php else:?>
    <li><a class="hidden-xs" href="../no_registrado/index.php" id="login" ><i class="fa  fa-sign-in fa-fw"></i> Iniciar Sesi&oacute;n</a></li>        
    <!-- <li><a href='' title='Usuario'>Aun no se identifica</a></li>  -->   
<?php endif;?>
