<?php
    

    function elimina_espacios($string){
        
        return str_replace(' ','_',$string);
    
    }

    function elimina_guiones($string){
        
        return str_replace('_',' ',$string);
        
    }
?>