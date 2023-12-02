<?php 
    // Creamos la clase que debe convertirse en objeto
    class validarSesion {
        // Creamos la funcion
        public function iniciarSesion($email_usuario, $clave){
            // Verificar si los campos requeridos están completos
            if (empty($email_usuario) || empty($clave)) {
                echo '<script> alert("Por favor complete todos los campos requeridos") </script>';
                echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";
                return; // Detener la ejecución de la función
            }
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // Consultamos todos los datos del usuario atraves del email
            $consultar = "SELECT * FROM usuarios WHERE email_usuario = :email_usuario";
            $result=$conexion->prepare($consultar);

            $result->bindParam(":email_usuario", $email_usuario);

            $result->execute();
            // Validamos email
            // CAPTURAMOS EL EMAIL EN UN ARREGLO PARA QUE CAPTURE SI YA HA SIDO REGISTRADO
            if($f = $result->fetch()){
                // Validar clave
                if($clave == $f['clavemd']){

                    // validamos el estado de la cuenta
                    if($f['estado_usuario'] == "Activo"){
                        // ACA SE INICIA sESION, PARA CREAR VARIABLES DE SESION QUE SE USAN MAS ADELANTE
                        session_start();
                        $_SESSION['id'] = $f['id_usuario'];
                        $_SESSION['email_usuario'] = $f['email_usuario'];
                        $_SESSION['nombres_usuario'] = $f['nombres_usuario'];
                        $_SESSION['apellidos_usuario'] = $f['apellidos_usuario'];
                        $_SESSION['rol_usuario'] = $f['rol_usuario'];
                         // Guardar el ID del cliente en la variable de sesión "id_cliente"
                        $_SESSION['id_usuario'] = $f['id_usuario'];
                        // autentificado: Se utiliza para un archivo de seguridad, valida si no hay sesion no deja ingresar, y si se inicia valida la autentificacion y el rol
                        $_SESSION['autentificado'] = "SI";
                        // Validamos Roles para redireccionar
                        if($f['rol_usuario'] == "Administrador"){
                            echo '<script> alert("Bienvenido usuario Administrador") </script>';
                            echo "<script> location.href='../views/Administrador/home.php' </script>";
                        }
                        // Switch cuando vamos a comparar diferentes valores pero con una misma variable
                        switch ($f ['rol_usuario']) {
                            case 'Administrador':
                                echo '<script> alert("Bienvenido Usuario Administrador") </script>';
                                echo "<script> location.href='../Views/Administrador/home.php' </script>";
                                break;
                            
                            case 'Entrenador':
                                echo '<script> alert("Bienvenido Usuario Entrenador") </script>';
                                echo "<script> location.href='../Views/Entrenadores/home.php' </script>";
                                break;

                            case 'Cliente':
                                echo '<script> alert("Bienvenido Usuario Cliente") </script>';
                                echo "<script> location.href='../Views/Clientes/home.php' </script>";
                                break;
                            case 'Proveedor':
                                echo '<script> alert("Bienvenido Usuario Proveedor") </script>';
                                echo "<script> location.href='../Views/Proveedores/home.php' </script>";
                                break;
                        } 
                    }
                    else{
                        echo '<script> alert("Tu cuenta esta bloqueda o inactiva - contacta al Administrador") </script>';
                        echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";
                    }
                }
                else{
                    echo '<script> alert("La clave ingresada no coincide en la base de datos") </script>';
                    echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";
                }
            }
            else{
                echo '<script> alert("El email ingreado no existe en la base de datos") </script>';
                echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";
            }
            
        }
        public function cerrarSesion(){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            session_start();
            
            // Sesion destroy destruye las variables que creamos en la funcion de validar sesion
            
            session_destroy();

            echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";

        }
    }
?>