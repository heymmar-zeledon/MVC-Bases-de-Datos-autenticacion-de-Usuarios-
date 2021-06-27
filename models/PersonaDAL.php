<?php
    include_once("Connection.php");
    include_once("Persona.php");
    class PersonaDAL
    {
        public static function listAll()
        {
            $connection = new Connection();
            $result = $connection->db->query("SELECT * FROM personas");

            $listaPersonas = array();

            for($i = 0; $i < mysqli_num_rows($result); $i++)
            {
                $array_persona = $result->fetch_assoc();
                $listaPersonas[$i] = new Persona($array_persona['id'],$array_persona['nombre'],$array_persona['edad'],$array_persona['sexo']);
            }
            return $listaPersonas;
        }

        public static function findById($idPersona)
        {
            $connection = new Connection();
            $result = $connection->db->query("SELECT * FROM personas WHERE id = $idPersona");

            $personaActual = new Persona();

            if(mysqli_num_rows($result) > 0)
            {
                $array_persona = $result->fetch_assoc();
                $personaActual = new Persona($array_persona['id'],$array_persona['nombre'],$array_persona['edad'],$array_persona['sexo']);
            }
            return $personaActual;
        }

        public static function insert($nuevaPersona)
        {
            $connection = new Connection();
            $stmt = "INSERT INTO personas(id, nombre, edad, sexo) VALUE ('$nuevaPersona->id', '$nuevaPersona->nombre', '$nuevaPersona->edad', '$nuevaPersona->sexo')";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }

        public static function update($personaEditar)
        {
            $connection = new Connection();
            $stmt = "UPDATE personas SET nombre = '$personaEditar->nombre', edad = '$personaEditar->edad', sexo = '$personaEditar->sexo' WHERE id = $personaEditar->id";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }

        public static function delete($idPersona)
        {
            $connection = new Connection();
            $stmt = "DELETE FROM personas WHERE id = $idPersona";
            $resultado = $connection->db->query($stmt);
            return $resultado;
        }
    }
?>