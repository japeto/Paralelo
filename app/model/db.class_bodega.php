<?php
/*
CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
*/
class database 
{

 private $conexion;

    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
 public function conectar_bodega()
 {
     
    if(!isset($this->conexion))
    {
        $this->conexion = pg_connect("host=localhost port=5432 dbname=proyecto user=administrador password=123456") or die ("Error de conexion. ". pg_last_error());    
        return $this->conexion;
    }    
 } 

 
  /* METODO PARA REALIZAR UNA CONSULTA 
 INPUT:
 $sql | codigo sql para ejecutar la consulta
 OUTPUT: $result
 */
 public function consulta($sql)
 {
    //$resultado = mysql_query($sql, $this->conexion);
    //echo $sql;
     $resultado = pg_query($this->conexion, $sql);     
    if(!$resultado)
    {
     echo 'Postgres Error: ' . pg_last_error();
     exit;
    }
    return $resultado;
 }
 
 public function insertado($sql)
 {
    $resultado = pg_query($this->conexion, $sql);     
   
    if(!$resultado)
    {
     echo 'Postgres Error: ' . pg_last_error();
     exit;
    }    
    return pg_affected_rows($resultado);     
 }
 




 /*METODO PARA CONTAR EL NUMERO DE RESULTADOS
 INPUT: $result
 OUTPUT: cantidad de registros encontrados
 */
 function numero_de_filas($result)
 {
  if(!is_resource($result)) 
      return false;
  return pg_num_rows($result);
 }

 /*METODO PARA CREAR ARRAY DESDE UNA CONSULTA
 INPUT: $result
 OUTPUT: array con los resultados de una consulta
 */
 
 public function obtenerArregloAsociativo($result)
 {
  if(!is_resource($result))
      return false;
   return pg_fetch_assoc($result);
 }

 //function fetch_array($result)
 public function obtenerArreglo($result)
 {
  if(!is_resource($result)) 
      return false;
   return pg_fetch_array($result);
 }
     /* METODO PARA CERRAR LA CONEXION A LA BASE DE DATOS */
 public function disconnect($con)
 {
     pg_close($con);     
 }

}
?>