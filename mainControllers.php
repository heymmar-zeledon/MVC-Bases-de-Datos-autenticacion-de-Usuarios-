<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="Estilos.css">
    <link rel="stylesheet" href="Estilos2.css">
    <title>Login</title>
</head>
<body>
<?php
session_start();
require_once("libraries/loginMiddleware.php");
loginMiddleware::init();
$module = "";
if(isset($_REQUEST['module']))
{
    $module = $_REQUEST['module'];
}

if($module == "persona" && loginMiddleware::requiredLogin())
{
    include_once("controllers/personaController.php");
    personaController::procesar();
}
else if($module == "auto" && loginMiddleware::requiredLogin())
{
    include_once("controllers/autoController.php");
    autoController::procesar();
}
else if($module == "usuario" && loginMiddleware::requiredLogin())
{
    include_once("controllers/usuarioController.php");
    usuarioController::procesar();
}
else
{
    if ($module == "PageMain" && loginMiddleware::isLogin()) {
        require_once("libraries/loginMiddleware.php");
        $module = 'login';
        $action = 'logout';
        echo "<div class='alert alert-success'>
        <strong>Success!</strong> !Logeado Correctamente.</div>";
        echo "<div class='text-center'>";
        echo "<div class='text-center'>";
        echo "<a type=button class='btn btn-danger' id='cerrar_sesion' href='index.php?module=".$module."&action=".$action."'>Cerrar Sesion</a>";
        echo "</div>";
        echo "</div>";
    }
    else if($module == "LoginError")
    {
        echo "<div class='alert alert-danger'>
        <strong>Warning!</strong> !Este Usuario no existe.</div>";
        echo "<div class='alert alert-warning'>
        <strong>Warning!</strong> !No estas logeado pulsa cualquier modulo para logearte.</div>";
    }
    else
    {
        echo "<div class='alert alert-warning'>
        <strong>Warning!</strong> !No estas logeado pulsa cualquier modulo para logearte.</div>";
    }
    echo "<div class='container-fluid text-center' style='margin-bottom:15px;'>
    <h3>Pagina Principal</h3>
    <img src=autos_y_personas.jpg>
    </div>";
}
?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
