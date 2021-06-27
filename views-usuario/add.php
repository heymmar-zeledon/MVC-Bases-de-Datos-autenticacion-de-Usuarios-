<?php
    include_once("menuUsuario.php");
    include_once("views-usuario/bootstrap.php");
?>

<div class="container p-2 border bg-light">
    <form method="POST" class="row g-3 needs-validation" novalidate>
        <input type="hidden" name="module" value="usuario" />
        <input type="hidden" name="action" value="<?php echo $eventoFormulario; ?>" />

        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="validationCustom01" name="input-username"placeholder="Nombre de usuario.." required
            <?php if($eventoFormulario == "actualizar") echo "readonly"; ?>/>
            <div class="valid-feedback">
              Looks good!
            </div>
        </div>
        <!--  -->
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Contraseña:</label>
            <input type="text" class="form-control" id="validationCustom02" name="input-password" placeholder="*******" required>
            <div class="valid-feedback">
              Looks good!
            </div>
        </div>
        <!--  -->
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Correo Electronico:</label>
            <div class="input-group has-validation">
              <span class="input-group-text" id="inputGroupPrepend">Email</span>
              <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="input-email" placeholder="some@example.com" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit" id="usuario" name="<?php echo $eventoFormulario; ?>">Guardar informacion</button>
            </div>
        </div>
    </form>
</div>