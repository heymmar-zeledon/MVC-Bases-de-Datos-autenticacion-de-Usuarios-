<?php
    include_once("menu.php");

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
            colspan='5'><h5>Listado de Personas</h5></th></tr>";
            echo "<tr><th class='border border-info'>ID</th>
            <th class='border border-info'>Nombre</th>
            <th class='border border-info'>Edad</th>
            <th class='border border-info'>Sexo</th>
            <th class='border border-info'>Acciones</th>";
            foreach($listaPersonas as $persona)
            {           
                echo "<tr>";
                echo "<td class='border border-info'>";
                echo "$persona->id";
                echo "</td>";
                echo "<td class='border border-info'>";
                echo "$persona->nombre";
                echo "</td>";
                echo "<td class='border border-info'>";
                echo "$persona->edad";
                echo "</td>";
                echo "<td class='border border-info'>";
                echo "$persona->sexo";
                echo "</td>";
                echo "<td class='border border-info'>";
                echo "<a class='btn btn-success' href='?module=persona&action=editar&id=" . $persona->id . "'>Editar</a>
                <a class='btn btn-danger' href='?module=persona&action=borrar&id=" . $persona->id . "'>Borrar</a>";
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
