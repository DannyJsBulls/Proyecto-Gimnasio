<?php 
    require_once("../Model/conexion.php");
    require_once("../Model/validarSesion.php");

    // capturamos en variables los valores enviados desde el formualrio
    // atraves del method post y los name de los campos
    $email = $_POST['email'];
    $clave = md5($_POST['Password']);
    // Creamos el objeto a partir de la clase validar sesion
    $objValidar = new ValidarSesion();
    $result = $objValidar->iniciarSesion($email, $clave);
?>