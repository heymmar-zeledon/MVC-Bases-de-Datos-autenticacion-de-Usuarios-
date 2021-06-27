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
    <title>Module Persona</title>
</head>
<body>
    <div class="cont2">
        <div class="container-fluid nav justify-content-center">    
            <p class="nav-item nav-link disabled">Módulo Auto:</p>
            <a href="index.php?module=auto&action=agregar" type="button" class="nav-item nav-link active btn btn-small">Agregar</a>&nbsp&nbsp
            <a href="index.php?module=auto" class="nav-item nav-link btn btn-small">Listar</a>&nbsp&nbsp
            <a href="index.php?module=auto&action=buscarPorPlaca" type="button" class="nav-item nav-link active btn btn-small" style="width:30%;">Buscar Auto por placa</a>
        </div>
    </div>
    <hr>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>