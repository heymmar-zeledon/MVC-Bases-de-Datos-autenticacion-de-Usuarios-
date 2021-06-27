<?php
    include_once("menu.php");
?>
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
    <title>Agregar</title>
</head>
<body>
        <div class="container">
            <h5 class="container-fluid text-center">Agregar Persona</h5>
            <form role="form" id="agregarpersona" method="POST">
            <input type="hidden" name="module" value="persona"/>
            <input type="hidden" name="action" value="<?php echo $eventoFormulario;?>"/>
                <div class="row">
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="id" class="h6">ID</label>
                        <input type="number" class="form-control" placeholder="Ingrese el ID" name="id" value="<?php echo $personaActual->id;?>"
                        <?php if($eventoFormulario == "actualizar") echo "readonly";?> required/>
                    </div>
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="nombre" class="h5">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Ingresa el nombre" value="<?php echo $personaActual->nombre; ?>" required/>
                    </div>
                        <div class="form-group col-sm-6" style="color:white;">
                        <label for="edad" class="h5">Edad</label>
                        <input type="number" name="edad" class="form-control" placeholder="Ingrese la Edad" value="<?php echo $personaActual->edad; ?>" required/>
                    </div>
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="sexo" class="h5">Sexo</label>
                        <select name="sexo" required class="form-control">
                            <option value="Masculino" <?php if($personaActual->sexo == "Masculino") echo "selected"; ?>>
                                Masculino
                            </option>
                            <option value="Femenino" <?php if($personaActual->sexo == "Femenino") echo "selected"; ?>>
                                Femenino
                            </option>
                        </select>
                    </div>
                    <div class="container-fluid text-center" style="width:40%;">
                        <input type="submit" class="btn btn-success" style="margin:3px; width:90%;" id="persona" name="<?php echo $eventoFormulario; ?>" value="Guardar" />
                    </div>
                </div>
            </form>     
        </div>
</body>
</html>
