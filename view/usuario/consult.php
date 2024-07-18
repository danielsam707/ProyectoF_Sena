<div class="mt-5">
    <h4 class="display-4">Consultar usuarios</h4>
</div>
<div class="mt-5">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <td class="idUsuario" data-id="<?=$usuario['id'] ?>"><?=$usuario['id'] ?> </td>
                    <td><?=$usuario['nombre'] ?> </td>
                    <td><?=$usuario['apellido'] ?> </td>
                    <td><?=$usuario['email'] ?> </td>
                    <td>
                        <a href="<?php echo getUrl("Usuario","Usuario","getUpdate",array("id"=>$usuario['id'])); ?>">
                            <button class="btn btn-primary">Editar</button>
                        </a>
                        <a>
                            <button class="btn btn-danger eliminar" data-url="<?php echo getUrl("Usuario","Usuario","delete") ?>">Eliminar</button>
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
                const id = $('.idUsuario').data('id')
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