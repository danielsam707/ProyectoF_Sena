<?php
include_once "../model/Registro/RegistroModel.php";

class RegistroController {

    public function RegistrarC() {
        
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeatPassword = $_POST["repeatPassword"];
        
        // Validaciones
        if (empty($nombre) ||  empty($apellido) || empty($email) || empty($password) || empty($repeatPassword)) {
            $_SESSION['errorEmpty'] = "Todos los campos son requeridos.";
            redirect(getUrl("Registro", "Registro", "RegistrarC")); 
            return;
        }
        
        if ($password !== $repeatPassword) {
            $_SESSION['error'] = "Las contraseñas no coinciden.";
            redirect(getUrl("Registro", "Registro", "RegistrarC"));
            return;
        }
        // dd($_POST);
        // Instancia del modelo y llamada al método de registro
        $modelo = new RegistroModel();
        $resultado = $modelo->RegistrarC($nombre, $apellido,$email, $password);
        
        if ($resultado) {
            $_SESSION['success'] = "Registro exitoso. Puedes iniciar sesión.";
            redirect(getUrl("Acceso", "Acceso", "login")); // Redirige al login después del registro
        } else {
            $_SESSION['error'] = "Error al registrar el usuario. Inténtalo de nuevo.";
            redirect(getUrl("Registro", "Registro", "RegistrarC")); 
        }
        
    }
}
?>