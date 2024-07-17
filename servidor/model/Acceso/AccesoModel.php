<?php
include_once "../model/MasterModel.php";

class AccesoModel extends MasterModel
{
    public function login($email, $password)
    {

        $sql = "SELECT * FROM usuario WHERE usu_email = '$email' AND usu_contrasenia =  '$password'";


        $respuesta = $this->consultar($sql);

        return $respuesta;
    }
}


