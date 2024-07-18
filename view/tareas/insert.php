<div class="mt-5">
    <h4 class="display-4">Registrar tareas</h4>
</div>
<form method="post" action="<?php echo getUrl("Tareas", "Tareas", "postInsert"); ?>">
    <div class="row mt-5">
        <div class="form-group col-md-4">
            <label for="">Descripcion</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion" required>
        </div>
        <div class="form-group col-md-4">
            <label for="usuId">Responsable</label>
            <select class="form-control" name="usuId">
                <option value="0">Seleccione...</option>
                <?php foreach($usuarios as $usuario):?>
                    <option value="<?=$usuario["id"]; ?>"><?= $usuario["nombre"]." ".$usuario["apellido"]?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="mt-5">
        <input type="submit" value="Registrar" class="btn btn-success">
    </div>
</form>