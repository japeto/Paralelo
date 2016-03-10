<?php
$conexion = pg_connect("host=localhost port=5432 dbname=datos_proyecto user=administrador password=123456") or die ("Error de conexion. ". pg_last_error());

$categorias = array();
$administracion = array('Administracion');
$ingenieria = array('Ingenieria');
$salud = array('Salud');
 
$query = "SELECT facultad FROM respuestas WHERE (facultad = 'administracion') OR (facultad = 'ingenieria') GROUP BY facultad";
$resultado = pg_query($conexion, $query); 
    

while ($fila = pg_fetch_assoc($resultado)) 
{
    $categorias[] = $fila['facultad'];
}
 

$consulta = "SELECT facultad, count (facultad) as cantidad  FROM respuestas WHERE (facultad = 'administracion') OR (facultad = 'ingenieria') OR (facultad = 'salud') GROUP BY facultad ORDER BY cantidad, facultad ;";

$result = pg_query($conexion, $consulta); 

pg_close($conexion); 
while($fila = pg_fetch_assoc($result)){
    if($fila['facultad'] == 'administracion'):
        $administracion[] = (double)$fila['cantidad'];
    elseif ($fila['facultad'] == 'ingenieria'):
        $ingenieria[] = (double)$fila['cantidad'];    
     elseif ($fila['facultad'] == 'salud'):
        $salud[] = (double)$fila['cantidad'];
    endif;
}
 

echo json_encode( array($categorias,$administracion, $ingenieria, $salud) );