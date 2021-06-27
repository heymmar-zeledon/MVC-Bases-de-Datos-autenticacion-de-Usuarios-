<?php
    include_once("menuAuto.php");
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
        <div class="container" style="margin-bottom:2%;">
            <h5 class="container-fluid text-center">Agregar Auto</h5>
            <form role="form" id="agregarpersona" method="POST">
            <input type="hidden" name="module" value="auto"/>
            <input type="hidden" name="action" value="<?php echo $eventoFormulario;?>"/>
                <div class="row">
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="id" class="h6">ID</label>
                        <input type="number" class="form-control" placeholder="Ingrese el ID" name="id" value="<?php echo $autoActual->id;?>"
                        <?php if($eventoFormulario == "actualizar") echo "readonly";?> required/>
                    </div>
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="placa" class="h5">Placa</label>
                        <input type="text" name="placa" class="form-control" placeholder="Ingresa la placa" value="<?php echo $autoActual->placa; ?>" required/>
                    </div>
                        <div class="form-group col-sm-6" style="color:white;">
                        <label for="modelo" class="h5">Modelo</label>
                        <input type="text" name="modelo" class="form-control" placeholder="Ingrese el modelo" value="<?php echo $autoActual->modelo; ?>" required/>
                    </div>
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="marca" class="h5">Marca</label>
                        <input type="text" name="marca" class="form-control" placeholder="Ingrese la marca" value="<?php echo $autoActual->marca; ?>" required/>
                    </div>
                    <div class="form-group col-sm-6" style="color:white;">
                        <label for="descripcion" class="h5">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion" value="<?php echo $autoActual->descripcion; ?>" required/>
                    </div>
                    <div class="container-fluid text-center" style="width:40%; height:51px;">
                        <input type="submit" class="btn btn-success" style="margin:3px; width:90%;" id="auto" name="<?php echo $eventoFormulario; ?>" value="Guardar" />
                    </div>
                </div>
            </form>     
        </div>
</body>
</html>