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
<div class="cont-login-in">
    <div class="container">
        <h3 id="h4">Inicio de Sesion</h3>
    </div>
    <br>
    <img class="img-login" src="User_Circle.png">   
    <br>
    <br>
    <form role="form" method="post" action="index.php">
        <center>
            <div class="form-group">
                <input type="hidden" name="module" value="login">
                <input type="hidden" name="action" value="login">
                <input type="text" class="form-control smm" id="in-user" placeholder="Usuario" name="usuario" required autofocus>
                <br>
                <input type="password" class="form-control smm" id="in-user-2" placeholder="Clave" name="clave" required>
                <br>
                <button class="btn btn-lg btn-success btn-login" type="submit">Ingresar</button>
            </div></center>
        </form>
</div>
    <?php 
        if(isset($error)) 
        {
    ?>
        <div id="mensaje" style="position: fixed; top: 50%; left: 50%; z-index: 1000; width: 400px; text-align: center; margin-left: -200px;" class="alert alert-danger" role="alert">Datos incorrectos</div>

    <?php
        }
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>