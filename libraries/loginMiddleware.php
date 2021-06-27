<?php
include_once("models/Connection.php");
class loginMiddleware
{
    public static function init()
    {     
        if (isset($_REQUEST['module']) && $_REQUEST['module'] == 'login') 
            loginMiddleware::procesar();
    }

    public static function isLogin()
    {
        $sesion = false;
        if (isset($_SESSION['usuario']))
            $sesion = true;
		else
		{
			$sesion = false;
		}
        return $sesion;
    }

    public static function procesar()
	{
		$action = "";
		if(isset($_REQUEST['action']))
			$action = $_REQUEST['action'];

		if($action == "login")
    		loginMiddleware::loginUser();
		else if($action == "logout")
        	loginMiddleware::logoutUser();
    
	}

	/* Si no está logueado el usuario, se carga la página de login */
	public static function requiredLogin()
	{
		if(!isset($_SESSION['usuario']))
    	{
			include_once("login/login.php");
        	exit();
		}
		else
        	return true;
	}

	/* Función empleada para loguear */
	public static function loginUser()
	{
		$usuario = $_REQUEST['usuario'];
		$clave = $_REQUEST['clave'];
		$conexion = new Connection();		
		$resultado = $conexion->db->query("SELECT COUNT(*) AS total FROM usuarios WHERE username = '$usuario' AND password = '$clave'");
	
		$total = $resultado->fetch_assoc();
		if($total["total"] == 1)
		{
			$_SESSION['usuario'] = $usuario;
			$val = "PageMain";
			$_REQUEST["module"] = $val;
			loginMiddleware::isLogin();
			include_once("index.php");
		}
		else
		{
			$error = true;
			$val = "LoginError";
			$_REQUEST["module"] = $val;
			loginMiddleware::isLogin();
			return $error;
			include_once("index.php");
		}
	}

	public static function logoutUser()
	{
    	$_SESSION = array();
    	session_destroy();
	}
}
