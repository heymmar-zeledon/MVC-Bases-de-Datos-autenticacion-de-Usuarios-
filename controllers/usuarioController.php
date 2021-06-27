<?php
include_once('models/usersDAL.php');

class usuarioController {
    
    public static function procesar()
    {
        $action = ""; 
        if(isset($_REQUEST['action']))
            $action = $_REQUEST['action'];
        /** Si se pulsó el botón agregar */
        
        if($action == "agregar") self::agregar();
        else if($action == "insertar") self::insertar();
        else if($action == "editar") self::editar();
        else if($action == "actualizar") self::actualizar();
        else if($action == "borrar") self::borrar();
        else self::listar();
    }

    public static function agregar()
    {
        $newUser = new Users();
        $eventoFormulario = "insertar";
        include_once("views-usuario/add.php");
    }

    public static function insertar()
    {
        $newUser = new Users();
        $newUser->setUsername($_REQUEST['input-username']); 
        $newUser->setPassword($_REQUEST['input-password']); 
        $newUser->setEmail($_REQUEST['input-email']);  

        $resultado = usersDAL::insert($newUser);
                
        if($resultado)
            $message = "<div class='alert alert-success'>
            <strong>Success!</strong> !Dato Insertado correctamente.</div>";
        else
            $message = "<div class='alert alert-warning'>
            <strong>Warning!</strong> !Error al insertar el dato.</div>";
        $listaUsuarios = usersDAL::listAll();
        include_once("views-usuario/Listar.php");
    }

    public static function editar()
    {
        $username = $_GET['input-username'];
        
        $usuarioActual = usersDAL::findById($username);
        $eventoFormulario = "actualizar";
        include_once("views-usuario/edit.php");
    }

        /** Si se pulsó el botón actualizar */
    public static function actualizar()
    {
        $updateUser = new Users();
        $updateUser->setUsername($_REQUEST['input-username']);
        $updateUser->setPassword($_REQUEST['input-password']);
        $updateUser->setEmail($_REQUEST['input-email']);
            
        $resultado = usersDAL::update($updateUser);
        
        if($resultado)
            $message = "<div class='alert alert-success'>
            <strong>Success!</strong> !Dato Actualizado correctamente.</div>";
        else
            $message = "<div class='alert alert-warning'>
            <strong>Warning!</strong> !Error al insertar el dato.</div>";
        
        $listaUsuarios = usersDAL::listAll();
        include_once("views-usuario/Listar.php");
    }
        
        
    public static function borrar()
    {
        $username = $_GET['input-username'];

        $resultado = usersDAL::delete($username);
        
        if($resultado)
            $message = "<div class='alert alert-success'>
            <strong>Success!</strong> !Dato eliminado correctamente.</div>";
        else
            $message = "<div class='alert alert-warning'>
            <strong>Warning!</strong> !Error al insertar el dato.</div>";

        $listaUsuarios = usersDAL::listAll();
        include_once("views-usuario/Listar.php");
    }

    public static function listar()
    {
        $listaUsuarios = usersDAL::listAll();
        include_once("views-usuario/Listar.php");
    }
}
