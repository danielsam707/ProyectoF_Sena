<?php   
include_once "../../model/Usuario/UsuarioModel.php";
class UsuarioController{
    public function getInsert(){
        include_once "../view/usuario/insert.php";
    }
    public function postInsert(){
        $obj = new UsuarioModel();

        $usuNombre = $_POST['usu_nombre'];
        $usuApellido = $_POST['usu_apellido'];
        $usuEmail = $_POST['usu_email'];

        $sql = "INSERT INTO usuario VALUES(null, '$usuNombre', '$usuApellido', '$usuEmail')";

        $ejecutar = $obj->insertar($sql);
        if($ejecutar){
            redirect(getUrl("Usuario", "Usuario", "consult"));
        }else{
            echo "La insercion fallo con exito";
        }
    }

    public function consult(){
        $obj = new UsuarioModel();
        $sql = "SELECT * FROM usuario WHERE estado !=1";
        $usuarios  = $obj->consultar($sql);

        include_once "../view/usuario/consult.php";
    }

    public function getUpdate(){
        $obj = new UsuarioModel();
        $id = $_GET['id'];

        $sql = "SELECT * FROM usuario WHERE id = $id";

        $usuarios = $obj->consultar($sql);

        include_once "../view/usuario/update.php";
    }

    public function postUpdate(){
        $obj = new UsuarioModel();

        $id= $_POST['id'];
        $nombre = $_POST['usu_nombre'];
        $apellido = $_POST['usu_apellido'];
        $email = $_POST['usu_email'];

        $sql = "UPDATE usuario SET nombre='$nombre', apellido='$apellido', email='$email' WHERE id =$id";

        $ejecutar = $obj->editar($sql);
        if($ejecutar){
            redirect(getUrl("Usuario", "Usuario", "consult"));
        }else{
            echo "La edicion fallo con exito";
        }
    }

    public function delete(){
        $obj = new UsuarioModel();
        $id = $_POST['id'];
        $sql  = "UPDATE usuario SET estado=1 WHERE id =$id";
        $ejecutar = $obj->editar($sql);
        if($ejecutar){
            echo 1;
        }else{
            echo 2;
        }
    }

}