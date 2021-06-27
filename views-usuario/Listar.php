<?php
    include_once("menuUsuario.php");

    if(isset($message))
        echo "<p><b>$message</b></p>";
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
    <title>Lista de personas</title>
</head>
<body>
<?php
echo "<div class='container-tabla pt-3' style='margin-bottom:15px;'>";
echo "<fieldset>";
        echo "<table class='table table-bordered'>";
            echo "<tr></tr>";
            echo "<tr><th class='border border-info' 
            colspan='5'><h5>Listado de Usuarios</h5></th></tr>";
            echo "<tr><th class='border border-info'>Nombre de usuario</th>
            <th class='border border-info'>Contraseña</th>
            <th class='border border-info'>Correo Electronico</th>
            <th class='border border-info'>Acciones</th>";
            foreach($listaUsuarios as $user)
            {           
                echo "<tr>";
                echo "<td class='border border-info'>";
                echo $user->getUSername();
                echo "</td>";
                echo "<td class='border border-info'>";
                echo $user->getPassword();
                echo "</td>";
                echo "<td class='border border-info'>";
                echo $user->getEmail();
                echo "</td>";
                echo "<td class='border border-info'>";
                echo "<a class='btn btn-success' href='?module=usuario&action=editar&input-username=" . $user->getUSername() . "'>Editar</a>
                <a class='btn btn-danger' href='?module=usuario&action=borrar&input-username=" . $user->getUSername() . "'>Borrar</a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "<tr>";
        echo "</table>";
echo "</fieldset>";
echo "</div>";
?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
