<div class="mt-5">
    <h4 class="display-4">Editar tareas</h4>
</div>
<?php foreach($tareas as $tarea): ?>
<form method="post" action="<?php echo getUrl("Tareas", "Tareas", "postUpdate"); ?>">
    <div class="row mt-5">
        <div class="form-group col-md-4">
            <label for="">Descripcion</label>
            <input type="text" name="descripcion" value="<?php echo $tarea['descripcion'] ?>" class="form-control" placeholder="Ingrese la descripcion" required>
            <input type="hidden" name="id" class="form-control" value="<?php echo $tarea['id'] ?>" placeholder="Ingrese la descripcion" required>
        </div>
        <div class="form-group col-md-4">
            <label for="usuId">Responsable</label>
            <select class="form-control" name="usuId">
                <option value="0">Seleccione...</option>
                <?php foreach($usuarios as $usuario):
                    $selected = ($usuario["id"] == $tarea['usu_id']) ? "selected" : "";
                    ?>
                    <option value="<?=$usuario["id"]; ?>" <?=$selected?>><?= $usuario["nombre"]." ".$usuario["apellido"]?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="mt-5">
        <input type="submit" value="Actualizar" class="btn btn-success">
    </div>
</form>
<?php endforeach; ?>