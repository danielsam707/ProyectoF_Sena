<div class="mt-5">
    <h4 class="display-4">Consultar tareas</h4>
</div>
<div class="mt-5">
    <div class="col-md-3">
        <input type="text" name="filtro" id="filtro" class="form-control" placeholder="buscar..." data-url="<?php echo getUrl("Tareas","Tareas","search", false, "ajax");?>">
        
    </div>



    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tareas as $tarea): ?>
                <tr>
                    <td class="idTarea" data-id="<?=$tarea['id'];?>"><?=$tarea['id'];?></td>
                    <td><?=$tarea['descripcion'];?></td>
                    <td><?=$tarea['nombre']." ".$tarea['apellido']?></td>
                    <td>
                        <a href="<?php echo getUrl("Tareas","Tareas","getUpdate",array("id"=>$tarea['id'])); ?>">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a>
                            <button class="btn btn-danger eliminar" data-url="<?php echo getUrl("Tareas","Tareas","delete", false); ?> ">Eliminar</button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="alert alert-success messageSuccess" style="display:none" role="alert">
        El registro se elimino con exito
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).off('click', '.eliminar')
        $(document).on('click', '.eliminar', function(){
            const aviso = confirm("Esta seguro que desea eliminar el registro")
            if(aviso){
                const id = $('.idTarea').data('id')
                const url = $('.eliminar').data('url')
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: { id: id },
                    success: function(response){
                        console.log(response)
                        if(response != ""){
                            $('.messageSuccess').css('display', 'block');
                            setTimeout(() => {
                                location.reload();
                            }, 3000);
                        }
                    }
                })
            }else{
                alert("Se ha cancelado la eliminación")
            }
        })
    })
</script>