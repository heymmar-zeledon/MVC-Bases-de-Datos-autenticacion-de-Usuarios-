<?php
    include_once("Connection.php");
    include_once("Auto.php");

    class AutoDAL
    {
        public static function listAll()
        {
            $connection = new Connection();
            $result = $connection->db->query("SELECT * FROM autos");

            $listaAutos = array();

            for($i = 0; $i < mysqli_num_rows($result); $i++)
            {
                $array_autos = $result->fetch_assoc();
                $listaAutos[$i] = new Auto($array_autos['id'],$array_autos['placa'],$array_autos['modelo'],$array_autos['marca'],$array_autos['descripcion']);
            }
            return $listaAutos;
        }

        public static function findById($idAuto)
        {
            $connection = new Connection();
            $result = $connection->db->query("SELECT * FROM autos WHERE id = $idAuto");

            $autoActual = new Auto();

            if(mysqli_num_rows($result) > 0)
            {
                $array_autos = $result->fetch_assoc();
                $autoActual = new Auto($array_autos['id'],$array_autos['placa'],$array_autos['modelo'],$array_autos['marca'],$array_autos['descripcion']);
            }
            return $autoActual;
        }

        public static function insert($nuevoAuto)
        {
            $connection = new Connection();
            $stmt = "INSERT INTO autos(id, placa, modelo, marca, descripcion) VALUE ('$nuevoAuto->id', '$nuevoAuto->placa', '$nuevoAuto->modelo', '$nuevoAuto->marca', '$nuevoAuto->descripcion')";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }

        public static function update($autoEditar)
        {
            $connection = new Connection;
            $stmt = "UPDATE autos SET placa = '$autoEditar->placa', modelo = '$autoEditar->modelo', marca = '$autoEditar->marca', descripcion = '$autoEditar->descripcion' WHERE id = $autoEditar->id";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }

        public static function delete($idAuto)
        {
            $connection = new Connection();
            $stmt = "DELETE FROM autos WHERE id = $idAuto";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }

        public static function BPP($placa)
        {
            $connection = new Connection();
            $stmt = "SELECT * FROM autos WHERE placa = '$placa'";
            $resultado = $connection->db->query($stmt);

            $autoActual = new auto();

            if(mysqli_num_rows($resultado) == 0)
            {
                $autoActual = NULL;
                return $autoActual;
            }
            else if(mysqli_num_rows($resultado) > 0)
            {
                $array_autos = $resultado->fetch_assoc();
                $autoActual = new Auto($array_autos['id'],$array_autos['placa'],$array_autos['modelo'],$array_autos['marca'],$array_autos['descripcion']);
                return $autoActual;
            }
        }

        public static function list($AutoEncontrado)
        {
            $listaAutos = array();
            array_push($listaAutos,$AutoEncontrado);
            return $listaAutos;
        }
    }
?>