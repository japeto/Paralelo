<?php
/*
CLASE PARA LA CONEXION Y LA GESTION DE LA BASE DE DATOS Y LA PAGINA WEB
*/
class database 
{

 private $conexion;

    /* METODO PARA CONECTAR CON LA BASE DE DATOS*/
 public function conectarse()
 {     
   try 
    {
        //$db = new PDO('mysql:host=localhost;dbname=test', $usuario, $contraseña);
        //$this->conexion = new PDO('pgsql:host=localhost;port=5432;dbname=ProyectoTramas', 'postgres', 'hv104952114405jr');
        $this->conexion = new PDO('pgsql:host=localhost;port=5432;dbname=tramas', 'japeto', 'jeffersonamado');
        //$db->setAttribute(PDO::PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT, true);
        return($this->conexion);
    } 
    catch (PDOException $e)
    {        
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        exit();
    } 
 } 

 public function insertar($consulta, $datos)
 { 
    $result = $this->conexion->prepare($consulta);
    if ( $result->execute($datos) ) 
    {
        return 1;        
    }
    else
    {
        return 0;        
    }   
 }
 
  public function insertarDevuelveId($consulta, $datos)
 {  
     try 
     {        
        $resultado = $this->conexion->prepare($consulta);                    
        $resultado->execute($datos);        
     }
     catch(PDOException $e)
    {        
       echo '<br />' . $e->getMessage();
    }
     if (!$resultado) 
     {           
           return "No existen resultados.\n";           
     }
     else
     {   
           foreach ($resultado->fetchAll(PDO::FETCH_NUM) as $row) 
           {
               $fila = $row;                    
           }
           
      }
      return $fila;       
 } 

 function reiniciarNumeroId($nombre_secuencia, $valor_reinicio)
 {       
     try 
     {
        $this->conexion->beginTransaction();
        $this->conexion->exec("ALTER SEQUENCE ".$nombre_secuencia." RESTART ".$valor_reinicio.";");      
        $this->conexion->commit();    
     }
     catch (PDOException $e) 
     {
         $this->conexion->rollBack();
         echo '<br />' . $e->getMessage(); 
     }
 }
 
 function crearTabla($nombre_tabla)
 {       
     try 
     {
        $this->conexion->beginTransaction();
        $consulta ="CREATE TABLE ".$nombre_tabla."(pin character varying(50) NOT NULL, consentimiento character varying(1000), fecha_de_creacion_pin date DEFAULT now(), fecha_de_inicio_de_diligenciada_la_encuesta date DEFAULT now(), hora_de_inicio_de_diligenciada_la_encuesta time without time zone DEFAULT now(),tipo_dispositivo character varying(1000), fecha_de_fin_de_diligenciada_la_encuesta date DEFAULT now(), hora_de_fin_de_diligenciada_la_encuesta time without time zone DEFAULT now(), CONSTRAINT PK_".$nombre_tabla." PRIMARY KEY (pin)); ALTER TABLE ".$nombre_tabla." OWNER TO administrador;";    
        $this->conexion->exec($consulta);  
        $this->conexion->commit(); 
     }
     catch (PDOException $e) 
     {
         $this->conexion->rollBack();
         echo '<br />' . $e->getMessage(); 
     }
 }
 
 
 function crearTabla_respuestas($nombre_tabla)
 {       
     try 
     {
        $this->conexion->beginTransaction();
        $consulta ="CREATE TABLE ".$nombre_tabla."(pin character varying(50) NOT NULL DEFAULT 'AAAA000000', CONSTRAINT PK_".$nombre_tabla." PRIMARY KEY (pin)); ALTER TABLE ".$nombre_tabla." OWNER TO administrador;";    
        $this->conexion->exec($consulta);  
        $this->conexion->commit();    
     }
     catch (PDOException $e) 
     {
         $this->conexion->rollBack();
         echo '<br />' . $e->getMessage(); 
     }
 }
 function adicionarCampos_a_la_Tabla($nombre_tabla, $nombre_campo, $tipo_datos)
 {    
     try 
     {
        $this->conexion->beginTransaction();
        $consulta ="ALTER TABLE ".$nombre_tabla." ADD COLUMN ".$nombre_campo." ".$tipo_datos.";";
        print $consulta;
        $this->conexion->exec($consulta);
        $this->conexion->commit();
     }
     catch (PDOException $e) 
     {
         $this->conexion->rollBack();
         echo '<br />' . $e->getMessage(); 
     }
 }
  
 
 function eliminarTabla($nombre_tabla)
 {    
     try 
     {
        $this->conexion->beginTransaction();
        $consulta ="DROP TABLE IF EXISTS ".$nombre_tabla.";";
        $this->conexion->exec($consulta);  
        $this->conexion->commit();    
     }
     catch (PDOException $e) 
     {
         $this->conexion->rollBack();
         echo '<br />' . $e->getMessage(); 
     }
 }
 
 function obtenerId($nombre_secuencia)
 {
    
    $resultado = $this->conexion->prepare("SELECT nextval(?) as id;");  
    $resultado->execute(array($nombre_secuencia));   
    
    if (!$resultado) 
       {
           
           return "No existen resultados.\n";           
       }
       else
       {
           foreach ($resultado->fetchAll(PDO::FETCH_NUM) as $row) 
           {
               $fila = $row;
           }
       }       
    
       return $fila;
    
 }


 public function actualizar($consulta, $parametros)
 {
    $result = $this->conexion->prepare($consulta);    
    if ($result->execute($parametros)) 
    {
        print "<p>Registro modificado correctamente.</p>\n";        
    }
    else 
    {
     print "<p>Error al modificar el registro.</p>\n";       
    }
 }
 
 
 public function actualizar1($consulta, $parametros)
 {
    $result = $this->conexion->prepare($consulta);    
    if ($result->execute($parametros)) 
    {
        return 1;
    }
    else 
    {
        return 0;
    }
 } 
 
 public function eliminarRegistros($consulta, $datos)
 {     
     $result = $this->conexion->prepare($consulta);     
     if ($result->execute($datos)) 
     {
         return 1;
     }
     else 
     {
         return 0;
     }
   }
   
   public function actualizarSinPreparar($consulta)
   {        
       //$resultado = $this->conexion->execute($consulta);              
       $resultado = $this->conexion->exec($consulta);
        
       if ($resultado) 
       {           
           return 1;
       }
       else
       {           
           return 0;
       }
       
   } 
   
   public function consultarConParametrosSinPreparar($consulta)
   {        
       $resultado = $this->conexion->query($consulta);              
        
       if (!$resultado) 
       {
           
           return "No existen resultados.\n";           
       }
       else
       {           
           
           foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $row) 
           {
               $fila[] = $row;
           }
       }
       return $fila;
   }  
   
   public function consultarConParametros($consulta, $parametros)
   {        
       $resultado = $this->conexion->prepare($consulta); 
       
       $resultado->execute($parametros);
        
       if (!$resultado) 
       {
           
           return "No existen resultados.\n";           
       }
       else
       {
           $cantidad_de_filas = $this->cantidad_de_filas($resultado);
           print $cantidad_de_filas;
           foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $row) 
           {
               $fila = $row;
           }
       }
       return $fila;
   }   
   
   public function consultarConParametrosVarios($consulta, $parametros)
   {        
       $resultado = $this->conexion->prepare($consulta);                    
       $resultado->execute($parametros);
        
       if (!$resultado) 
       {
           
           return "No existen resultados.\n";           
       }
       else
       {           
           foreach ($resultado->fetchAll(PDO::FETCH_ASSOC) as $row) 
           {
               $fila[] = $row;
           }
       }
       return $fila;
   } 
   public function consultar($conexionDB, $consulta)
   {
       $consulta = "SELECT COUNT(*) FROM $dbTabla WHERE apellidos LIKE :apellidos";
       $result = $conexionDB->prepare($consulta);       
       
       $result->execute(array(":apellidos" => "%$apellidos%"));
       if (!$result) 
       {
           print "<p>Error en la consulta.</p>\n";           
       }
       else
       {
           print "<p>Se han encontrado " . $result->fetchColumn() . " registros.</p>\n";           
       }
   $conexionDB= null;
       return $result;
   }
 
   
 function cantidad_de_filas($result)
 {
  if(!is_resource($result)) 
      return false;
  return $result->rowCount() . ", ";
 }
  
 public function desconectar($valor)
 {       
     $this->conexion = $valor;
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
