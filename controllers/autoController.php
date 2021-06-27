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
    include_once('models/Auto.php');
    include_once('models/AutoDAL.php');

    class autoController
    {
        public static function procesar()
        {
            $action="";
            if(isset($_REQUEST['action']))
            {
                $action = $_REQUEST['action'];
            }

            if($action == "agregar") self::agregar();
            else if($action == "insertar") self::insertar();
            else if($action == "editar") self::editar();
            else if($action == "actualizar") self::actualizar();
            else if ($action == "buscarPorPlaca")self::buscarPorPlaca();
            else if ($action == "MostrarPorPlaca")self::MostrarPorPlaca();
            else if($action == "borrar") self::borrar();
            else self::listar();
        }
        
        public static function agregar()
        {
            $autoActual = new Auto();
            $eventoFormulario = "insertar";
            include_once("views-auto/agregarOeditarAuto.php");
        }

        public static function insertar()
        {
            $nuevoAuto = new Auto((int)$_POST['id'],$_POST['placa'],$_POST['modelo'],$_POST['marca'],$_POST['descripcion']);
            $resultado = AutoDAL::insert($nuevoAuto);

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

            $listaAutos = AutoDAL::listAll();
            include_once("views-auto/listarAuto.php");
        }

        public static function editar()
        {
            $idAuto = $_GET['id'];

            $autoActual = AutoDAL::FindbyId($idAuto);
            $eventoFormulario = "actualizar";
            include_once("views-auto/agregarOeditarAuto.php");
        }

        public static function actualizar()
        {
            $actualizarAuto = new Auto((int)$_REQUEST['id'],$_POST['placa'],$_POST['modelo'],$_POST['marca'],$_POST['descripcion']);
            $resultado = AutoDAL::update($actualizarAuto);

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
            $listaAutos = AutoDAL::listAll();
            include_once("views-auto/listarAuto.php");
        }

        public static function borrar()
        {
            $id = $_GET['id'];
            $resultado = AutoDAL::delete($id);

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
            $listaAutos = AutoDAL::listAll();
            include_once("views-auto/listarAuto.php");
        }

        public static function buscarPorPlaca()
        {
            $eventoFormulario = "MostrarPorPlaca";
            include_once("views-auto/BuscarPorPlaca.php");
        }

        public static function MostrarPorPlaca()
        {
            $placa = $_POST['placa'];
            $resultado = AutoDAL::BPP($placa);

            if($resultado == NULL)
            {
                $message = "<div class='alert alert-warning'>
                <strong>Warning!</strong> !El auto no existe.</div>";
                $listaAutos = AutoDAL::listAll();
                include_once("views-auto/listarAuto.php");
            }
            else
            {
                $message = "<div class='alert alert-success'>
                <strong>Success!</strong> !Auto Encontrado.</div>";
                $listaAutos = AutoDAL::list($resultado);
                include_once("views-auto/listarAuto.php");
            }
        }

        public static function listar()
        {
            $listaAutos = AutoDAL::listAll();
            include_once("views-auto/listarAuto.php");
        }
    }
?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
