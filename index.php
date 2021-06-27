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
    <title>Index</title>
</head>
<body>
<div class="container">
    <div class="hijo">
        <H4 class="border border-success" id="h4"> MVC & BASES DE DATOS</H4>
        <a type=button class="btn btn-primary" id="PageMain" href="index.php?module=PageMain">Pagina Principal</a>
        <br>
        <br>
        <a type=button class="btn btn-info" id="persona" href="index.php?module=persona">Persona</a> &nbsp&nbsp&nbsp <a type=button class="btn btn-info" id="auto" href="index.php?module=auto">Auto</a>&nbsp&nbsp&nbsp <a type=button class="btn btn-info" id="auto" href="index.php?module=usuario">Usuarios</a>
    </div>
</div>

<hr/>
    <?php include_once("mainControllers.php"); ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>