<div class="mt-5">
    <h4 class="display-4">Registrar usuario</h4>
</div>
<form method="post" action="<?php echo getUrl("Usuario", "Usuario", "postInsert"); ?>">
    <div class="row mt-5">
        <div class="form-group col-md-4">
            <label for="">Nombre</label>
            <input type="text" name="usu_nombre" class="form-control" placeholder="Ingrese el nombre" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Apellido</label>
            <input type="text" name="usu_apellido" class="form-control" placeholder="Ingrese el apellido" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Correo</label>
            <input type="email" name="usu_email" class="form-control" placeholder="Ingrese el email" required>
        </div>
    </div>
    <div class="mt-5">
        <input type="submit" value="Registrar" class="btn btn-success">
    </div>
</form>