<?php
    class respuesta{
        public $enunciado;
        public $seleccion;

        public function __construct($en, $sel){
                $this->enunciado=$en;
                $this->seleccion=$sel;
        }
    };

    function elimina_espacios($string){
        return str_replace(' ','_',$string);
    }

    function elimina_guiones($string){
        return str_replace('_',' ',$string);
        
    }
?>