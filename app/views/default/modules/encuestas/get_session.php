<?php

    if (is_ajax()){
        session_start();
        echo json_encode($_SESSION);
    }
    
    function is_ajax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';        
    }

?>
