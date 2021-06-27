<?php
    include_once("menuUsuario.php");
    include_once("views-usuario/bootstrap.php");
?>

<div class="container p-2 border bg-light">
    <form method="POST" class="row g-3 needs-validation" novalidate>
        <input type="hidden" name="module" value="usuario" />
        <input type="hidden" name="action" value="<?php echo $eventoFormulario; ?>" />
        <!-- ---------------------------------------------------------------------------------- -->
        <div class="col-md-4">
            <p class="input-group-text" id="addon-wrapping">Nombre de usuario: <input class="form-control" type="text" name="input-username" value="<?php echo $usuarioActual->getUsername(); ?>" <?php if($eventoFormulario == "actualizar") echo "readonly"; ?> /></p>
        </div>
        <!--  -->
        <div class="col-md-4">
            <div class="col-md-12">
                <p class="input-group-text" id="addon-wrapping">Contraseña: <input class="form-control" type="text" name="input-password" value="<?php echo $usuarioActual->getPassword(); ?>"  /></p>
            </div>
        </div>
        <!--  -->
        <div class="col-md-4">
            <div class="col-md-12">
                <p class="input-group-text" id="addon-wrapping">Correo Electronico: <input class="form-control" type="text" name="input-email" value="<?php echo $usuarioActual->getEmail(); ?>"  /></p>
            </div>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary" type="submit" name="<?php echo $eventoFormulario; ?>">Guardar informacion</button>
        </div>
    </form>
</div>