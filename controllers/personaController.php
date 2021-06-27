<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="Estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlador</title>
</head>
<body>
<?php
    include_once('models/Persona.php');
    include_once('models/PersonaDAL.php');

    class personaController
    {
        public static function procesar()
        {
            $action = "";
            if(isset($_REQUEST['action']))
            {
                $action = $_REQUEST['action'];
            }

            if($action == "agregar") self::agregar();
            else if($action == "insertar") self::insertar();
            else if($action == "editar") self::editar();
            else if($action == "actualizar") self::actualizar();
            else if($action == "borrar") self::borrar();
            else self::listar();
        }

        public static function agregar()
        {
            $personaActual = new Persona();
            $eventoFormulario = "insertar";
            include_once("views-persona/agregarOeditar.php");
        }

        public static function insertar()
        {
            $nuevoPersona = new Persona((int)$_POST['id'],$_POST['nombre'],$_POST['edad'],$_POST['sexo']);
            $resultado = PersonaDAL::insert($nuevoPersona);

            if($resultado)
            {
                $message = "<div class='alert alert-success'>
                <strong>Success!</strong> !Dato Insertado correctamente.</div>";
            }
            else
            {
                $message = "<div class='alert alert-warning'>
                <strong>Warning!</strong> !Error al insertar el dato.</div>";
            }
            $listaPersonas = personaDAL::listAll();
            include_once("views-persona/listar.php");
        }

        public static function editar()
        {
            $idPersona = $_GET['id'];

            $personaActual = PersonaDAL::findById($idPersona);

            $eventoFormulario = "actualizar";
            include_once("views-persona/agregarOeditar.php");
        }

        //si se pulso el boton guardar
        public static function actualizar()
        {
            $actualizarPersona = new Persona((int)$_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['edad'],$_REQUEST['sexo']);
            $resultado = PersonaDAL::update($actualizarPersona);

            if($resultado)
            {
                $message = "<div class='alert alert-success'>
                <strong>Success!</strong> !Dato Actualizado Correctamente.</div>";
            }
            else
            {   
                $message = "<div class='alert alert-warning'>
                <strong>Warning!</strong> !Error al actualizar el dato.</div>";
            }
            $listaPersonas = PersonaDAL::listAll();
            include_once("views-persona/listar.php");
        }

        public static function borrar()
        {
            $id = $_GET['id'];

            $resultado = PersonaDAL::delete($id);

            if($resultado)
            {
                $message = "<div class='alert alert-success'>
                <strong>Success!</strong> !Dato Borrado Correctamente.</div>";
            }
            else
            {
                $message = "<div class='alert alert-warning'>
                <strong>Warning!</strong> !Error al borrar el dato.</div>";
            }

            $listaPersonas = PersonaDAL::listAll();
            include_once("views-persona/listar.php");
        }

        public static function listar()
        {
            $listaPersonas = PersonaDAL::listAll();
            include_once("views-persona/listar.php");
        }
    }
?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
