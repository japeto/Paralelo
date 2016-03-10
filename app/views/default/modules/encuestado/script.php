<?php require_once 'conectado.php';?>
                            <?php $radio = $_SESSION['radios'];?>
                            <?php $pregunta_radio = $_SESSION['pregunta_radio'];?>
                            <?php $radio_tabla = $_SESSION['radios_tabla'];?>
                            <?php //$checkbox = $_SESSION['check'];?>
                            <?php $pregunta_check = $_SESSION['pregunta_check'];?>
                            <?php $cajas_abierta = $_SESSION['cajas_abierta'];?>
                            <?php $cajas_fecha = $_SESSION['cajas_fecha'];?> 
                            <?php $pregunta_tabla = $_SESSION['preguntas_tabla']; ?>  


                            <?php $pregunta_combo_ubica = $_SESSION['preguntas_combo_ubicacion']; ?>  
                            <?php $pregunta_combo_univer = $_SESSION['preguntas_combo_universidad']; ?>  
                            <?php $pregunta_combo_semes = $_SESSION['preguntas_combo_semestre']; ?>  

                            <?php //echo "<script>recibirArreglos(".json_encode($radio).", ".json_encode($radio_tabla).", ".json_encode($checkbox).",".json_encode($pregunta_check).", ".json_encode($cajas_abierta).", ".json_encode($cajas_fecha).", ".json_encode($pregunta_tabla).")</script>";?>
                            <?php //echo "<script>recibirArreglos(".json_encode($radio).",".json_encode($pregunta_radio).", ".json_encode($radio_tabla).", ".json_encode($pregunta_check).", ".json_encode($cajas_abierta).", ".json_encode($cajas_fecha).", ".json_encode($pregunta_tabla).")</script>";?>
                            <?php //echo "<script>recibirArreglos(".json_encode($pregunta_radio).", ".json_encode($radio_tabla).", ".json_encode($pregunta_check).", ".json_encode($cajas_abierta).", ".json_encode($cajas_fecha).", ".json_encode($pregunta_tabla).")</script>";?>
                            <?php echo "<script>recibirArreglos(".json_encode($radio).", ".json_encode($pregunta_radio).", ".json_encode($radio_tabla).", ".json_encode($pregunta_check).", ".json_encode($cajas_abierta).", ".json_encode($cajas_fecha).", ".json_encode($pregunta_tabla).",".json_encode($pregunta_combo_ubica).",".json_encode($pregunta_combo_univer).",".json_encode($pregunta_combo_semes).")</script>";?>
