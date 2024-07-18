<?php
include_once "../../model/Tareas/TareasModel.php";
class TareasController
{

    public function search()
    {
        $obj = new TareasModel();
        $buscar = $_POST["buscar"];

        $sql = "SELECT t.*,u.nombre, u.apellido FROM tareas t, usuario u WHERE t.usu_id = u.id AND t.descripcion LIKE '%" . $buscar . "%'";

        $tareas = $obj->consultar($sql);

        foreach ($tareas as $tarea) {
            echo "<tr>";
            echo "<td>" . $tarea["id"] . "</td>";
            echo "<td>" . $tarea["descripcion"] . "</td>";
            echo "<td>" . $tarea["nombre"] . " " . ["apellido"] . "</td>";

            echo "<td>";
            echo "<a href= '" . getUrl("Tarea", "Tarea", "getUpdate", array("tar_id" => $tarea["id"])) . "'>";
            echo "<button class='btn btn-primary'>Editar</button>";
            echo "</a>";
            echo "</td>";
            echo "</tr>";
        }
    }





    public function getInsert()
    {

        $obj = new TareasModel();

        $sql = "SELECT * FROM usuario";

        $usuarios = $obj->consultar($sql);

        include_once "../view/tareas/insert.php";
    }
    public function postInsert()
    {
        $obj = new TareasModel();

        $descripcion = $_POST['descripcion'];
        $usuId = $_POST['usuId'];

        $sql = "INSERT INTO tareas VALUES(null, '$descripcion', $usuId, 0)";

        $ejecutar = $obj->insertar($sql);
        if ($ejecutar) {
            redirect(getUrl("Tareas", "Tareas", "consult"));
        } else {
            echo "La insercion fallo con exito";
        }
    }

    public function consult()
    {
        $obj = new TareasModel();
        $sql = "SELECT t.*, u.nombre, u.apellido FROM tareas t, usuario u WHERE t.usu_id = u.id AND t.estado != 1";
        $tareas = $obj->consultar($sql);
        include_once "../view/tareas/consult.php";
    }

    public function getUpdate()
    {
        $obj = new TareasModel();
        $id = $_GET['id'];
        $sql = "SELECT * FROM tareas WHERE id = $id";
        $tareas = $obj->consultar($sql);

        $sqlUsuario = "SELECT * FROM usuario";

        $usuarios = $obj->consultar($sqlUsuario);

        include_once "../view/tareas/update.php";
    }

    public function postUpdate()
    {
        $obj = new TareasModel();

        $idTarea = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $usuId = $_POST['usuId'];

        $sql = "UPDATE tareas SET descripcion='$descripcion', usu_id=$usuId WHERE id =$idTarea";

        $ejecutar = $obj->editar($sql);
        if ($ejecutar) {
            redirect(getUrl("Tareas", "Tareas", "consult"));
        } else {
            echo "La edicion fallo con exito";
        }
    }

    public function delete()
    {
        $obj = new TareasModel();
        $id = $_POST['id'];
        $sql = "UPDATE tareas SET estado=1 WHERE id =$id";
        $ejecutar = $obj->editar($sql);
        if ($ejecutar) {
            echo 1;
        } else {
            echo 2;
        }
    }

}