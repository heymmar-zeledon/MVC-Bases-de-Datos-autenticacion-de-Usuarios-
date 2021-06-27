<?php
    include_once("menuAuto.php");
?>
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
    <div class="container">
    <Form method="POST">
        <div class="container-fluid nav justify-content-center">    
            <p class="nav-item nav-link disabled">Buscar por placa:</p>
            <input type="hidden" name="module" value="auto"/>
            <input type="hidden" name="action" value="<?php echo $eventoFormulario;?>"/>
            <input type="text" name="placa" class="form-control nav-item nav-link" style="width: 30%;">&nbsp&nbsp
            <input type="submit" name="<?php echo $eventoFormulario; ?>" value="Buscar" class="nav-item nav-link btn btn-success" style="height: 38px; width: 20%;" required />
        </div>
        </Form>
    </div>
    <hr>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

    
