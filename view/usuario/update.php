<div class="mt-5">
    <h4 class="display-4">Editar usuario</h4>
</div>
<?php foreach($usuarios as $usuario): ?>
<form method="post" action="<?php echo getUrl("Usuario", "Usuario", "postUpdate"); ?>">
    <div class="row mt-5">
        <div class="form-group col-md-4">
            <label for="">Nombre</label>
            <input type="text" name="usu_nombre" class="form-control" value="<?php echo $usuario['nombre']?>" placeholder="Ingrese el nombre" required>
            <input type="hidden" name="id" value="<?php echo $usuario['id']?>">
        </div>
        <div class="form-group col-md-4">
            <label for="">Apellido</label>
            <input type="text" name="usu_apellido" class="form-control" value="<?php echo $usuario['apellido']?>" placeholder="Ingrese el apellido" required>
        </div>
        <div class="form-group col-md-4">
            <label for="">Correo</label>
            <input type="email" name="usu_email" class="form-control" value="<?php echo $usuario['email']?>" placeholder="Ingrese el email" required>
        </div>
    </div>
    <div class="mt-5">
        <input type="submit" value="Editar" class="btn btn-success">
    </div>
</form>
<?php endforeach; ?>