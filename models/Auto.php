<?php
    class Auto
    {
        public $id;
        public $placa;
        public $modelo;
        public $marca;
        public $descripcion;

        function __construct($i=0,$p="",$mo="",$ma="",$desc="")
        {
            $this->id = $i;
            $this->placa = $p;
            $this->modelo = $mo;
            $this->marca = $ma;
            $this->descripcion = $desc;
        }
    }
?>