<?php
$conexion = pg_connect("host=localhost port=5432 dbname=datos_proyecto user=administrador password=123456") or die ("Error de conexion. ". pg_last_error());

$categorias = array();
$administracion = array('Administracion');
$sistemas = array('Ingenieria');
$contaduria = array('contaduria');
$economia = array('economia');
 
$query = "SELECT programa FROM respuestas WHERE (programa = 'sistemas') OR (programa = 'contaduria') GROUP BY programa";
$resultado = pg_query($conexion, $query); 
    

while ($fila = pg_fetch_assoc($resultado)) 
{
    $categorias[] = $fila['programa'];
}
 

$consulta = "SELECT programa, count (programa) as cantidad  FROM respuestas WHERE (programa = 'administracion') OR (programa = 'sistemas') OR (programa = 'contaduria') OR (programa = 'economia') GROUP BY programa ORDER BY cantidad, programa ;";

$result = pg_query($conexion, $consulta); 

pg_close($conexion); 
while($fila = pg_fetch_assoc($result)){
    if($fila['programa'] == 'administracion'):
        $administracion[] = (double)$fila['cantidad'];
    elseif ($fila['programa'] == 'sistemas'):
        $sistemas[] = (double)$fila['cantidad'];    
     elseif ($fila['programa'] == 'contaduria'):
        $contaduria[] = (double)$fila['cantidad'];
     elseif ($fila['programa'] == 'economia'):
        $economia[] = (double)$fila['cantidad'];
    endif;
}
 

echo json_encode( array($categorias,$sistemas, $contaduria, $economia) );