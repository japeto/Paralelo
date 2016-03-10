<?php $ruta = "consentimiento/"; ?>
<?php $destino = $ruta. $_FILES['archivo']['name']; ?>
<?php copy ($_FILES['archivo']['tmp_name'], $destino) ?> 
