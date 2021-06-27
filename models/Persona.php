<?php
    class Persona
    {
        public $id;
        public $nombre;
        public $edad;
        public $sexo;

        function __construct($i = 0, $n = "", $e = 0, $s = "Masculino")
        {
            $this->id = $i;
            $this->nombre = $n;
            $this->edad = $e;
            $this->sexo = $s;
        }
    }
?>