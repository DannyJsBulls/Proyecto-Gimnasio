<?php 
    class Consultas {
        // Mostrar informacion de cada usuario
        public function mostrarPerfilUsuario($id_usuario){
            $f = array(); // Inicializar el arreglo
        
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Preparar la consulta para obtener los pagos relacionados con los planes del cliente
            $consulta = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            
            $result = $conexion->prepare($consulta);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();
        
            // Mientras existan registros, guardarlos en el arreglo $f
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
        
            return $f;
        }
        // Registro de Usuario externo
        public function registrarUserExterno($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $clavemd, $rol_usuario, $estado_usuario){
            // Verificar si los campos requeridos están completos
            if (empty($id_usuario) || empty($email_usuario) || empty($tipo_documento_usuario) || empty($nombres_usuario) || empty($apellidos_usuario) || empty($fecha_nacimiento_usuario) || empty($telefono_usuario) || empty($clavemd)) {
                echo '<script> alert("Por favor complete todos los campos requeridos") </script>';
                echo "<script> location.href='../Views/Extras/registrarSesion.php' </script>";
                return; // Detener la ejecución del método
            }
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario OR email_usuario = :email_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":email_usuario", $email_usuario);

            $result->execute();

            $f = $result->fetch();

            if($f) {
                echo '<script> alert("! Los datos ingresados ya se encuentran registrados en el sistema") </script>';
                echo "<script> location.href='../Views/Extras/registrarSesion.php' </script>";
            }else{

            }

            $insertar = "INSERT INTO usuarios (id_usuario, tipo_documento_usuario, nombres_usuario, apellidos_usuario, fecha_nacimiento_usuario, email_usuario, telefono_usuario, clavemd, rol_usuario, estado_usuario)
            VALUES (:id_usuario, :tipo_documento_usuario, :nombres_usuario, :apellidos_usuario, :fecha_nacimiento_usuario, :email_usuario, :telefono_usuario, :clavemd, :rol_usuario, :estado_usuario)";
            
            $result = $conexion->prepare($insertar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":rol_usuario", $rol_usuario);
            $result->bindParam(":estado_usuario", $estado_usuario);

            $result->execute();

            echo '<script> alert("Registro Exitoso") </script>';
            echo "<script> location.href='../Views/Extras/iniciarSesion.php' </script>";
        }
        // Ver perfil de administrador
        public function mostrarPerfilAdministrador($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPerfilAdministrador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo usuarios rol administrador
        public function registrarUserAdmin($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $estado_usuario, $rol_usuario, $clavemd, $foto_usuario){
            
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario OR email_usuario = :email_usuario";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":email_usuario", $email_usuario);

            $result->execute();

            $f = $result->fetch();

            if($f){
                echo '<script> alert("Los datos ingresados ya se encuentran registrados en el sistema!") </script>';
                echo "<script> location.href='../../Views/Administrador/crearUsuario.php' </script>";
            }else{
                $insertar = "INSERT INTO usuarios (id_usuario, tipo_documento_usuario, nombres_usuario, apellidos_usuario, fecha_nacimiento_usuario, email_usuario, telefono_usuario, estado_usuario, rol_usuario, clavemd, foto_usuario)
                VALUES (:id_usuario, :tipo_documento_usuario, :nombres_usuario, :apellidos_usuario, :fecha_nacimiento_usuario, :email_usuario, :telefono_usuario, :estado_usuario, :rol_usuario, :clavemd, :foto_usuario)";

                $result = $conexion->prepare($insertar);

                $result->bindParam(":id_usuario", $id_usuario);
                $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
                $result->bindParam(":nombres_usuario", $nombres_usuario);
                $result->bindParam(":apellidos_usuario", $apellidos_usuario);
                $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
                $result->bindParam(":email_usuario", $email_usuario);
                $result->bindParam(":telefono_usuario", $telefono_usuario);
                $result->bindParam(":estado_usuario", $estado_usuario);
                $result->bindParam(":rol_usuario", $rol_usuario);
                $result->bindParam(":clavemd", $clavemd);
                $result->bindParam(":foto_usuario", $foto_usuario);

                $result->execute();

                echo '<script> alert("REGISTRO DE USUARIO EXITOSO") </script>';
                echo "<script> location.href='../../Views/Administrador/verUsuarios.php' </script>";
            }
        }
        public function mostrarUserAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarUser($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarUserAdmin($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $estado_usuario, $rol_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE usuarios SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, fecha_nacimiento_usuario=:fecha_nacimiento_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, estado_usuario=:estado_usuario, rol_usuario=:rol_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":estado_usuario", $estado_usuario);
            $result->bindParam(":rol_usuario", $rol_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado la informacion del usuario") </script>';
            echo "<script> location.href='../../Views/Administrador/verUsuarios.php' </script>";
        }
        public function eliminarUserAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            echo '<script> alert("Usuario Eliminado") </script>';
            echo "<script> location.href='../../Views/Administrador/crearUsuario.php' </script>";
        
            $result->execute();
        }
        // Modulo Entrenadores ROL ADMINISTRADOR
        // Funcion para mostrar la vista de la tabla entrenadores ROL ADMINISTRADOR
        public function mostrarInfoEntrenadorAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM entrenadores";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function mostrarEntrenadorAdmin(){
            $entrenadores = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Entrenador' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($entrenador = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $entrenadores[] = $entrenador;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $entrenadores;
        }
        // Funcion para ver el perfil del entrenador rol administrador
        public function buscarEntrenadorAdmin($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para modificar los datos del entrenador en el formulario de actualizacion
        public function buscarEntrenador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM entrenadores WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarEntrenadorAdmin($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $estado_usuario, $rol_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE entrenadores SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, fecha_nacimiento_usuario=:fecha_nacimiento_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, estado_usuario=:estado_usuario, rol_usuario=:rol_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":estado_usuario", $estado_usuario);
            $result->bindParam(":rol_usuario", $rol_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado la informacion del Entrenador") </script>';
            echo "<script> location.href='../../Views/Administrador/verTablaEntrenadores.php' </script>";
        }
        public function eliminarEntrenadorAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM entrenadores WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            echo '<script> alert("Entrenador Eliminado") </script>';
            echo "<script> location.href='../../Views/Administrador/crearUsuario.php' </script>";
        
            $result->execute();
        }
        // Modulo Clientes Rol Administrador
        // Funcion para mostrar la vista de la tabla entrenadores ROL ADMINISTRADOR
        public function mostrarInfoClientesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM clientes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function mostrarClienteAdmin(){
            $entrenadores = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Cliente' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($entrenador = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $entrenadores[] = $entrenador;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $entrenadores;
        }
        // Funcion para ver el perfil del cliente rol administrador
        public function buscarClienteAdmin($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para modificar los datos del cliente en el formulario de actualizacion
        public function buscarCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarClienteAdmin($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $estado_usuario, $rol_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE clientes SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, fecha_nacimiento_usuario=:fecha_nacimiento_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, estado_usuario=:estado_usuario, rol_usuario=:rol_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":estado_usuario", $estado_usuario);
            $result->bindParam(":rol_usuario", $rol_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado la informacion del Cliente") </script>';
            echo "<script> location.href='../../Views/Administrador/verTablaClientes.php' </script>";
        }
        public function eliminarClienteAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            echo '<script> alert("Cliente Eliminado") </script>';
            echo "<script> location.href='../../Views/Administrador/crearUsuario.php' </script>";
        
            $result->execute();
        }
        // Modulo Proveedores ROL ADMINISTRADOR
        // Funcion para mostrar la vista de la tabla proveedores ROL ADMINISTRADOR
        public function mostrarInfoProveedoresAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM proveedores";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function mostrarProveedorAdmin(){
            $entrenadores = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Proveedor' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($entrenador = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $entrenadores[] = $entrenador;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $entrenadores;
        }
        // Funcion para ver el perfil del proveedor rol administrador
        public function buscarProveedorAdmin($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para modificar los datos del cliente en el formulario de actualizacion
        public function buscarProveedor($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM proveedores WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarProveedorAdmin($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $fecha_nacimiento_usuario, $email_usuario, $telefono_usuario, $estado_usuario, $rol_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE proveedores SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, fecha_nacimiento_usuario=:fecha_nacimiento_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, estado_usuario=:estado_usuario, rol_usuario=:rol_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":fecha_nacimiento_usuario", $fecha_nacimiento_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":estado_usuario", $estado_usuario);
            $result->bindParam(":rol_usuario", $rol_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado la informacion del Proveedor") </script>';
            echo "<script> location.href='../../Views/Administrador/verTablaProveedores.php' </script>";
        }
        public function eliminarProveedorAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM proveedores WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            echo '<script> alert("Proveedor Eliminado") </script>';
            echo "<script> location.href='../../Views/Administrador/crearUsuario.php' </script>";
        
            $result->execute();
        }
        // Modulo Planes ROL ADMINISTRADOR
        public function registrarPlanesAdmin($codigo_plan, $nombre_plan, $descripcion_plan, $precio_plan, $porcentaje_ganancia_plan, $precio_final_plan, $duracion_plan, $acceso_servicios_plan, $restricciones_plan, $estado_plan, $descuentos_plan, $categoria_plan){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar = "SELECT * FROM planes WHERE codigo_plan = :codigo_plan";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":codigo_plan", $codigo_plan);

            $result->execute();

            $f = $result->fetch();

            if($f){
                echo '<script> alert("Los datos ingresados ya registraron un plan!") </script>';
                echo "<script> location.href='../../Views/Administrador/crearPlanes.php' </script>";
            }else{
                $insertar = "INSERT INTO planes (codigo_plan, nombre_plan, descripcion_plan, precio_plan, porcentaje_ganancia_plan, precio_final_plan, duracion_plan, acceso_servicios_plan, restricciones_plan, estado_plan, descuentos_plan, categoria_plan)
                VALUES (:codigo_plan, :nombre_plan, :descripcion_plan, :precio_plan, :porcentaje_ganancia_plan, :precio_final_plan, :duracion_plan, :acceso_servicios_plan, :restricciones_plan, :estado_plan, :descuentos_plan, :categoria_plan)";

                $result = $conexion->prepare($insertar);

                $result->bindParam(":codigo_plan", $codigo_plan);
                $result->bindParam(":nombre_plan", $nombre_plan);
                $result->bindParam(":descripcion_plan", $descripcion_plan);
                $result->bindParam(":precio_plan", $precio_plan);
                $result->bindParam(":porcentaje_ganancia_plan", $porcentaje_ganancia_plan);
                $result->bindParam(":precio_final_plan", $precio_final_plan);
                $result->bindParam(":duracion_plan", $duracion_plan);
                $result->bindParam(":acceso_servicios_plan", $acceso_servicios_plan);
                $result->bindParam(":restricciones_plan", $restricciones_plan);
                $result->bindParam(":estado_plan", $estado_plan);
                $result->bindParam(":descuentos_plan", $descuentos_plan);
                $result->bindParam(":categoria_plan", $categoria_plan);

                $result->execute();

                echo '<script> alert("REGISTRO DE PLAN EXITOSO") </script>';
                echo "<script> location.href='../../Views/Administrador/verPlanes.php' </script>";
            }         
        }
        // Esta funcion muestra la tabla de los planes disponibles en el sistema
        public function mostrarPlanesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion muestra los planes disponibles en el sistema
        public function mostrarPlanesAdministrador(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion muestra el detalle del plan
        public function buscarPlanesAdministrador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes WHERE codigo_plan = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion muestra el detalle del plan para modificar o eliminar
        public function buscarPlanes($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes WHERE codigo_plan = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarPlanesAdmin($codigo_plan, $nombre_plan, $descripcion_plan, $precio_plan, $porcentaje_ganancia_plan, $precio_final_plan, $duracion_plan, $acceso_servicios_plan, $restricciones_plan, $estado_plan, $descuentos_plan, $categoria_plan) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $actualizar = "UPDATE planes SET
                codigo_plan=:codigo_plan,
                nombre_plan=:nombre_plan,
                descripcion_plan=:descripcion_plan,
                precio_plan=:precio_plan,
                porcentaje_ganancia_plan=:porcentaje_ganancia_plan,
                precio_final_plan=:precio_final_plan,
                duracion_plan=:duracion_plan,
                acceso_servicios_plan=:acceso_servicios_plan,
                restricciones_plan=:restricciones_plan,
                estado_plan=:estado_plan,
                descuentos_plan=:descuentos_plan,
                categoria_plan=:categoria_plan
                WHERE codigo_plan=:codigo_plan";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":nombre_plan", $nombre_plan);
            $result->bindParam(":descripcion_plan", $descripcion_plan);
            $result->bindParam(":precio_plan", $precio_plan);
            $result->bindParam(":porcentaje_ganancia_plan", $porcentaje_ganancia_plan);
            $result->bindParam(":precio_final_plan", $precio_final_plan);
            $result->bindParam(":duracion_plan", $duracion_plan);
            $result->bindParam(":acceso_servicios_plan", $acceso_servicios_plan);
            $result->bindParam(":restricciones_plan", $restricciones_plan);
            $result->bindParam(":estado_plan", $estado_plan);
            $result->bindParam(":descuentos_plan", $descuentos_plan);
            $result->bindParam(":categoria_plan", $categoria_plan);
        
            $result->execute();
        
            echo '<script> alert("Ha modificado la información del plan") </script>';
            echo "<script> location.href='../../Views/Administrador/verPlanes.php' </script>";
        }
        public function eliminarPlanesAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM planes WHERE codigo_plan = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Plan Eliminado con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearPlanes.php' </script>";
        }
        // Modulo Ventas o Pagos para los planes ROL ADMINISTRADOR
        public function obtenerCodigoPlanPorNombrePago($nombrePlan) {
            // Conecta a la base de datos (ajusta los valores según tu configuración)
            $conexion = new mysqli("localhost", "root", "", "gimnasio_bd");
    
            // Verifica la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
    
            // Consulta SQL para obtener el código de actividad a partir del nombre
            $query = "SELECT codigo_plan FROM planes WHERE  nombre_plan = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $nombrePlan);
            $stmt->execute();
            $stmt->bind_result($codigoPlan);
    
            if ($stmt->fetch()) {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return $codigoPlan;
            } else {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return false; // Devuelve falso si no se encontró la actividad
            }
        }
        public function registrarPagosPlanesAdmin($codigo_plan, $id_usuario, $fecha_venta_plan, $hora_venta_plan, $fecha_fin_plan, $metodo_pago_plan, $precio_final_venta_plan, $estado_venta_plan){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO ventas_planes (codigo_plan, id_usuario, fecha_venta_plan, hora_venta_plan, fecha_fin_plan, metodo_pago_plan, precio_final_venta_plan, estado_venta_plan)
            VALUES (:codigo_plan, :id_usuario, :fecha_venta_plan, :hora_venta_plan, :fecha_fin_plan, :metodo_pago_plan, :precio_final_venta_plan, :estado_venta_plan)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_venta_plan", $fecha_venta_plan);
            $result->bindParam(":hora_venta_plan", $hora_venta_plan);
            $result->bindParam(":fecha_fin_plan", $fecha_fin_plan);
            $result->bindParam(":metodo_pago_plan", $metodo_pago_plan);
            $result->bindParam(":precio_final_venta_plan", $precio_final_venta_plan);
            $result->bindParam(":estado_venta_plan", $estado_venta_plan);

            $result->execute();

            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verPagos.php' </script>";
        
        }
        public function mostrarPagosPlanesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_planes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPagosPlanes($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_planes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para mostrar la factura del pago de los planes 
        public function buscarPagosPlanesAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_planes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarPagosPlanesAdmin($codigo_plan, $id_usuario, $fecha_venta_plan, $hora_venta_plan, $fecha_fin_plan, $metodo_pago_plan, $precio_final_venta_plan, $estado_venta_plan){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $actualizar = "UPDATE ventas_planes SET
                codigo_plan = :codigo_plan,
                fecha_venta_plan = :fecha_venta_plan,
                hora_venta_plan = :hora_venta_plan,
                fecha_fin_plan = :fecha_fin_plan,
                metodo_pago_plan = :metodo_pago_plan,
                precio_final_venta_plan = :precio_final_venta_plan,
                estado_venta_plan = :estado_venta_plan
            WHERE id_usuario = :id_usuario";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":fecha_venta_plan", $fecha_venta_plan);
            $result->bindParam(":hora_venta_plan", $hora_venta_plan);
            $result->bindParam(":fecha_fin_plan", $fecha_fin_plan);
            $result->bindParam(":metodo_pago_plan", $metodo_pago_plan);
            $result->bindParam(":precio_final_venta_plan", $precio_final_venta_plan);
            $result->bindParam(":estado_venta_plan", $estado_venta_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            
            $result->execute();
        
            echo '<script> alert("Ha modificado la información del Pago del Plan") </script>';
            echo "<script> location.href='../../Views/Administrador/verPagos.php' </script>";
        }
        public function eliminarPagosPlanesAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM ventas_planes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Pago de Plan Eliminado con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/verPagos.php' </script>";
        }
        // Modulo actividades ROL ADMINISTRADOR
        public function registrarActividadesAdmin($codigo_actividad, $nombre_actividad, $descripcion_actividad, $tipo_actividad, $requisitos_actividad, $estado_actividad, $objetivos_actividad, $area_actividad, $foto_actividad){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :codigo_actividad";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":codigo_actividad", $codigo_actividad);

            $result->execute();

            $f = $result->fetch();

            if($f){
                echo '<script> alert("El codigo de la actividad ya se encuentra registrada en el sistema!") </script>';
                echo "<script> location.href='../../Views/Administrador/crearActividades.php' </script>";
            }else{
                $insertar = "INSERT INTO actividades (codigo_actividad, nombre_actividad, descripcion_actividad, tipo_actividad, requisitos_actividad, estado_actividad, objetivos_actividad, area_actividad, foto_actividad)
                VALUES (:codigo_actividad, :nombre_actividad, :descripcion_actividad, :tipo_actividad, :requisitos_actividad, :estado_actividad, :objetivos_actividad, :area_actividad, :foto_actividad)";
        
                $result = $conexion->prepare($insertar);
            
                $result->bindParam(":codigo_actividad", $codigo_actividad);
                $result->bindParam(":nombre_actividad", $nombre_actividad);
                $result->bindParam(":descripcion_actividad", $descripcion_actividad);
                $result->bindParam(":tipo_actividad", $tipo_actividad);
                $result->bindParam(":requisitos_actividad", $requisitos_actividad);
                $result->bindParam(":estado_actividad", $estado_actividad);
                $result->bindParam(":objetivos_actividad", $objetivos_actividad);
                $result->bindParam(":area_actividad", $area_actividad);
                $result->bindParam(":foto_actividad", $foto_actividad);
            
                $result->execute();
            
                echo '<script> alert("REGISTRO DE ACTIVIDAD EXITOSO") </script>';
                echo "<script> location.href='../../Views/Administrador/verActividades.php' </script>";
            }   
        }
        // Esta funcion muestra la tabla de actividades disponibles en el sistema
        public function mostrarActividadesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion muestra los detalles de las actividades en el gimansio, funcion para el administrador
        public function mostrarActividadesAdministrador(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion busca el detalle de la actividad seleccionada para el rol administrador
        public function buscarActividadesAdministrador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarActividades($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarActividadesAdmin($codigo_actividad, $nombre_actividad, $descripcion_actividad, $tipo_actividad, $requisitos_actividad, $estado_actividad, $objetivos_actividad, $area_actividad, $foto_actividad) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $actualizar = "UPDATE actividades SET 
                nombre_actividad = :nombre_actividad,
                descripcion_actividad = :descripcion_actividad,
                tipo_actividad = :tipo_actividad,
                requisitos_actividad = :requisitos_actividad,
                estado_actividad = :estado_actividad,
                objetivos_actividad = :objetivos_actividad,
                area_actividad = :area_actividad,
                foto_actividad = :foto_actividad
                WHERE codigo_actividad = :codigo_actividad";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":nombre_actividad", $nombre_actividad);
            $result->bindParam(":descripcion_actividad", $descripcion_actividad);
            $result->bindParam(":tipo_actividad", $tipo_actividad);
            $result->bindParam(":requisitos_actividad", $requisitos_actividad);
            $result->bindParam(":estado_actividad", $estado_actividad);
            $result->bindParam(":objetivos_actividad", $objetivos_actividad);
            $result->bindParam(":area_actividad", $area_actividad);
            $result->bindParam(":foto_actividad", $foto_actividad);
        
            $result->execute();
        
            echo '<script> alert("Ha modificado la informacion de la actividad") </script>';
            echo "<script> location.href='../../Views/Administrador/verActividades.php' </script>";
        }
        public function eliminarActividadesAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Actividad Eliminada") </script>';
            echo "<script> location.href='../../Views/Administrador/crearActividades.php' </script>";
        }
        // Modulo Inscripciones Libres ROL ADMINISTRADOR
        // Función para obtener el código de actividad por nombre
        public function obtenerCodigoActividadPorNombre($nombreActividad) {
            // Conecta a la base de datos (ajusta los valores según tu configuración)
            $conexion = new mysqli("localhost", "root", "", "gimnasio_bd");
    
            // Verifica la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
    
            // Consulta SQL para obtener el código de actividad a partir del nombre
            $query = "SELECT codigo_actividad FROM actividades WHERE nombre_actividad = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $nombreActividad);
            $stmt->execute();
            $stmt->bind_result($codigoActividad);
    
            if ($stmt->fetch()) {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return $codigoActividad;
            } else {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return false; // Devuelve falso si no se encontró la actividad
            }
        }
        // Funcion para obtner el codigo del plan por nombre
        public function obtenerCodigoPlanPorNombre($nombrePlan) {
            // Conecta a la base de datos (ajusta los valores según tu configuración)
            $conexion = new mysqli("localhost", "root", "", "gimnasio_bd");
    
            // Verifica la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
    
            // Consulta SQL para obtener el código de actividad a partir del nombre
            $query = "SELECT codigo_plan FROM planes WHERE nombre_plan = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $nombrePlan);
            $stmt->execute();
            $stmt->bind_result($codigoPlan);
    
            if ($stmt->fetch()) {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return $codigoPlan;
            } else {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return false; // Devuelve falso si no se encontró la actividad
            }
        }
        public function registrarInscripcionesLibresAdmin($codigo_actividad, $codigo_plan, $id_usuario, $fecha_inscripcion_libre, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_libre, $comentarios_inscripcion_libre) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $insertar = "INSERT INTO inscripciones_libres (codigo_actividad, codigo_plan, id_usuario, fecha_inscripcion_libre, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_libre, comentarios_inscripcion_libre)
            VALUES (:codigo_actividad, :codigo_plan, :id_usuario, :fecha_inscripcion_libre, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_libre, :comentarios_inscripcion_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_inscripcion_libre", $fecha_inscripcion_libre);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_libre", $estado_inscripcion_libre);
            $result->bindParam(":comentarios_inscripcion_libre", $comentarios_inscripcion_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO INSCRIPCIÓN LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verInscripcionesLibres.php' </script>"; 
        }
        public function mostrarInscripcionesLibresAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_libres";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarInscripcionesLibres($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_libres WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarInscripcionesLibresAdmin($codigo_actividad, $codigo_plan, $id_usuario, $fecha_inscripcion_libre, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_libre, $comentarios_inscripcion_libre){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            $actualizar = "UPDATE inscripciones_libres SET codigo_plan=:codigo_plan, id_usuario=:id_usuario, fecha_inscripcion_libre=:fecha_inscripcion_libre, fecha_inicio_actividad=:fecha_inicio_actividad, hora_inicio_actividad=:hora_inicio_actividad, estado_inscripcion_libre=:estado_inscripcion_libre, comentarios_inscripcion_libre=:comentarios_inscripcion_libre WHERE codigo_actividad=:codigo_actividad";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_inscripcion_libre", $fecha_inscripcion_libre);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_libre", $estado_inscripcion_libre);
            $result->bindParam(":comentarios_inscripcion_libre", $comentarios_inscripcion_libre);
        
            $result->execute();
        
            echo '<script> alert("MODIFICACIÓN INSCRIPCIÓN LIBRE EXITOSA") </script>';
            echo "<script> location.href='../../Views/Administrador/verInscripcionesLibres.php' </script>"; 
        }
        public function eliminarInscripcionesLibresAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM inscripciones_libres WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Inscripcion Libre Eliminada con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearInscripcionesLibres.php' </script>";
        }
        // Modulo Inscripciones Personalizadas ROL ADMINISTRADOR
        public function registrarInscripcionesPersoAdmin($codigo_actividad, $codigo_plan, $id_cliente, $id_entrenador, $fecha_inscripcion_personalizada, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_personalizada, $comentarios_inscripcion_personalizada) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
        
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Administrador/crearInscripcionesPerso.php' </script>";
                return;
            }

            // Verificar si el plan de usuario es válido
            $consultar_plan = "SELECT * FROM ventas_planes WHERE codigo_plan = :codigo_plan AND (codigo_plan = '2025' OR codigo_plan = '2026')";
            $result_plan = $conexion->prepare($consultar_plan);
            $result_plan->bindParam(":codigo_plan", $codigo_plan);
            $result_plan->execute();

            if (!$result_plan->fetch()) {
                echo '<script> alert("Tu plan ingresado, no permite inscripciones Personalizadas.") </script>';
                echo "<script> location.href='../../Views/Administrador/crearInscripcionesPerso.php' </script>";
                return;
            }
            // Realizar la inserción en la base de datos
            $insertar = "INSERT INTO inscripciones_personalizadas (codigo_actividad, codigo_plan, id_cliente, id_entrenador, fecha_inscripcion_personalizada, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_personalizada, comentarios_inscripcion_personalizada)
            VALUES (:codigo_actividad, :codigo_plan, :id_cliente, :id_entrenador, :fecha_inscripcion_personalizada, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_personalizada, :comentarios_inscripcion_personalizada)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":fecha_inscripcion_personalizada", $fecha_inscripcion_personalizada);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_personalizada", $estado_inscripcion_personalizada);
            $result->bindParam(":comentarios_inscripcion_personalizada", $comentarios_inscripcion_personalizada);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO INSCRIPCIÓN PERSONALIZADA EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verInscripcionesPerso.php' </script>"; 
        }
        public function mostrarInscripcionesPersoAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_personalizadas";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarInscripcionesPerso($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_personalizadas WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarInscripcionesPersoAdmin($codigo_actividad, $codigo_plan, $id_cliente, $id_entrenador, $fecha_inscripcion_personalizada, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_personalizada, $comentarios_inscripcion_personalizada){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            $actualizar = "UPDATE inscripciones_personalizadas SET codigo_plan=:codigo_plan, id_cliente=:id_cliente, id_entrenador=:id_entrenador, fecha_inscripcion_personalizada=:fecha_inscripcion_personalizada, fecha_inicio_actividad=:fecha_inicio_actividad, hora_inicio_actividad=:hora_inicio_actividad, estado_inscripcion_personalizada=:estado_inscripcion_personalizada, comentarios_inscripcion_personalizada=:comentarios_inscripcion_personalizada WHERE codigo_actividad=:codigo_actividad";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":fecha_inscripcion_personalizada", $fecha_inscripcion_personalizada);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_personalizada", $estado_inscripcion_personalizada);
            $result->bindParam(":comentarios_inscripcion_personalizada", $comentarios_inscripcion_personalizada);
        
            $result->execute();
        
            echo '<script> alert("MODIFICACIÓN INSCRIPCIÓN PERSONALIZADA EXITOSA") </script>';
            echo "<script> location.href='../../Views/Administrador/verInscripcionesPerso.php' </script>"; 
        }
        public function eliminarInscripcionesPersoAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM inscripciones_personalizadas WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Inscripcion Personalizada Eliminada con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearInscripcionesPerso.php' </script>";
        }
        // Modulo estadisticas actividades personalizadas ROL ADMINISTRADOR
        public function registrarEstadisticasPersonalizadasAdmin($id_cliente, $id_entrenador, $codigo_actividad, $fecha_actividad_estadistica_personalizada, $duracion_actividad_estadistica_personalizada, $repeticiones_actividad_estadistica_personalizada, $peso_levantado_estadistica_personalizada, $distancia_recorrida_estadistica_personalizada, $velocidad_promedio_estadistica_personalizada, $calorias_quemadas_estadistica_personalizada, $nivel_esfuerzo_estadistica_personalizada, $tipo_ejercicio_estadistica_personalizada, $zona_frecuencia_cardiaca_estadistica_perso, $maximo_esfuerzo_estadistica_personalizada, $dificultad_actividad_estadistica_personalizada, $descanso_entre_series_estadistica_perso){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
        
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Administrador/crearEstadisticasPersonalizadas.php' </script>";
                return;
            }

            $insertar = "INSERT INTO estadisticas_actividades_personalizadas (id_cliente, id_entrenador, codigo_actividad, fecha_actividad_estadistica_personalizada, duracion_actividad_estadistica_personalizada, repeticiones_actividad_estadistica_personalizada, peso_levantado_estadistica_personalizada, distancia_recorrida_estadistica_personalizada, velocidad_promedio_estadistica_personalizada, calorias_quemadas_estadistica_personalizada, nivel_esfuerzo_estadistica_personalizada, tipo_ejercicio_estadistica_personalizada, zona_frecuencia_cardiaca_estadistica_perso, maximo_esfuerzo_estadistica_personalizada, dificultad_actividad_estadistica_personalizada, descanso_entre_series_estadistica_perso)
            VALUES (:id_cliente, :id_entrenador, :codigo_actividad, :fecha_actividad_estadistica_personalizada, :duracion_actividad_estadistica_personalizada, :repeticiones_actividad_estadistica_personalizada, :peso_levantado_estadistica_personalizada, :distancia_recorrida_estadistica_personalizada, :velocidad_promedio_estadistica_personalizada, :calorias_quemadas_estadistica_personalizada, :nivel_esfuerzo_estadistica_personalizada, :tipo_ejercicio_estadistica_personalizada, :zona_frecuencia_cardiaca_estadistica_perso, :maximo_esfuerzo_estadistica_personalizada, :dificultad_actividad_estadistica_personalizada, :descanso_entre_series_estadistica_perso)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_personalizada", $fecha_actividad_estadistica_personalizada);
            $result->bindParam(":duracion_actividad_estadistica_personalizada", $duracion_actividad_estadistica_personalizada);
            $result->bindParam(":repeticiones_actividad_estadistica_personalizada", $repeticiones_actividad_estadistica_personalizada);
            $result->bindParam(":peso_levantado_estadistica_personalizada", $peso_levantado_estadistica_personalizada);
            $result->bindParam(":distancia_recorrida_estadistica_personalizada", $distancia_recorrida_estadistica_personalizada);
            $result->bindParam(":velocidad_promedio_estadistica_personalizada", $velocidad_promedio_estadistica_personalizada);
            $result->bindParam(":calorias_quemadas_estadistica_personalizada", $calorias_quemadas_estadistica_personalizada);
            $result->bindParam(":nivel_esfuerzo_estadistica_personalizada", $nivel_esfuerzo_estadistica_personalizada);
            $result->bindParam(":tipo_ejercicio_estadistica_personalizada", $tipo_ejercicio_estadistica_personalizada);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_perso", $zona_frecuencia_cardiaca_estadistica_perso);
            $result->bindParam(":maximo_esfuerzo_estadistica_personalizada", $maximo_esfuerzo_estadistica_personalizada);
            $result->bindParam(":dificultad_actividad_estadistica_personalizada", $dificultad_actividad_estadistica_personalizada);
            $result->bindParam(":descanso_entre_series_estadistica_perso", $descanso_entre_series_estadistica_perso);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO ESTADISTICA PERSONALIZADA CON EXITO") </script>';
            echo "<script> location.href='../../Views/Administrador/verEstadisticasPersonalizadas.php' </script>"; 
        }
        public function mostrarEstadisticasPersonalizadasAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_personalizadas";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarEstadisticasPersonalizadas($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_personalizadas WHERE id_cliente = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarEstadisticasPersonalizadasAdmin($id_cliente, $id_entrenador, $codigo_actividad, $fecha_actividad_estadistica_personalizada, $duracion_actividad_estadistica_personalizada, $repeticiones_actividad_estadistica_personalizada, $peso_levantado_estadistica_personalizada, $distancia_recorrida_estadistica_personalizada, $velocidad_promedio_estadistica_personalizada, $calorias_quemadas_estadistica_personalizada, $nivel_esfuerzo_estadistica_personalizada, $tipo_ejercicio_estadistica_personalizada, $zona_frecuencia_cardiaca_estadistica_perso, $maximo_esfuerzo_estadistica_personalizada, $dificultad_actividad_estadistica_personalizada, $descanso_entre_series_estadistica_perso){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $actualizar = "UPDATE estadisticas_actividades_personalizadas SET
                id_cliente=:id_cliente,
                id_entrenador=:id_entrenador,
                codigo_actividad=:codigo_actividad,
                fecha_actividad_estadistica_personalizada=:fecha_actividad_estadistica_personalizada,
                duracion_actividad_estadistica_personalizada=:duracion_actividad_estadistica_personalizada,
                repeticiones_actividad_estadistica_personalizada=:repeticiones_actividad_estadistica_personalizada,
                peso_levantado_estadistica_personalizada=:peso_levantado_estadistica_personalizada,
                distancia_recorrida_estadistica_personalizada=:distancia_recorrida_estadistica_personalizada,
                velocidad_promedio_estadistica_personalizada=:velocidad_promedio_estadistica_personalizada,
                calorias_quemadas_estadistica_personalizada=:calorias_quemadas_estadistica_personalizada,
                nivel_esfuerzo_estadistica_personalizada=:nivel_esfuerzo_estadistica_personalizada,
                tipo_ejercicio_estadistica_personalizada=:tipo_ejercicio_estadistica_personalizada,
                zona_frecuencia_cardiaca_estadistica_perso=:zona_frecuencia_cardiaca_estadistica_perso,
                maximo_esfuerzo_estadistica_personalizada=:maximo_esfuerzo_estadistica_personalizada,
                dificultad_actividad_estadistica_personalizada=:dificultad_actividad_estadistica_personalizada,
                descanso_entre_series_estadistica_perso=:descanso_entre_series_estadistica_perso
                WHERE id_cliente=:id_cliente";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_personalizada", $fecha_actividad_estadistica_personalizada);
            $result->bindParam(":duracion_actividad_estadistica_personalizada", $duracion_actividad_estadistica_personalizada);
            $result->bindParam(":repeticiones_actividad_estadistica_personalizada", $repeticiones_actividad_estadistica_personalizada);
            $result->bindParam(":peso_levantado_estadistica_personalizada", $peso_levantado_estadistica_personalizada);
            $result->bindParam(":distancia_recorrida_estadistica_personalizada", $distancia_recorrida_estadistica_personalizada);
            $result->bindParam(":velocidad_promedio_estadistica_personalizada", $velocidad_promedio_estadistica_personalizada);
            $result->bindParam(":calorias_quemadas_estadistica_personalizada", $calorias_quemadas_estadistica_personalizada);
            $result->bindParam(":nivel_esfuerzo_estadistica_personalizada", $nivel_esfuerzo_estadistica_personalizada);
            $result->bindParam(":tipo_ejercicio_estadistica_personalizada", $tipo_ejercicio_estadistica_personalizada);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_perso", $zona_frecuencia_cardiaca_estadistica_perso);
            $result->bindParam(":maximo_esfuerzo_estadistica_personalizada", $maximo_esfuerzo_estadistica_personalizada);
            $result->bindParam(":dificultad_actividad_estadistica_personalizada", $dificultad_actividad_estadistica_personalizada);
            $result->bindParam(":descanso_entre_series_estadistica_perso", $descanso_entre_series_estadistica_perso);
        
            $result->execute();
        
            echo '<script> alert("Ha modificado la información de las estadísticas de actividad personalizada") </script>';
            echo "<script> location.href='../../Views/Administrador/verEstadisticasPersonalizadas.php' </script>";
        }
        public function eliminarEstadisticasPersonalizadasAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM estadisticas_actividades_personalizadas WHERE id_cliente = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Estadisticas de Actividades Personalizadas Eliminada con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearEstadisticasPersonalizadas.php' </script>";
        }
        // Modulo Estadisticas Actividades Libres ROL ADMINISTRADOR
        public function registrarEstadisticasLibresAdmin($id_usuario, $codigo_actividad, $fecha_actividad_estadistica_libre, $duracion_actividad_estadistica_libre, $repeticiones_actividad_estadistica_libre, $peso_levantado_estadistica_libre, $distancia_recorrida_estadistica_libre, $velocidad_promedio_estadistica_libre, $calorias_quemadas_estadistica_libre, $nivel_esfuerzo_estadistica_libre, $tipo_ejercicio_estadistica_libre, $zona_frecuencia_cardiaca_estadistica_libre, $maximo_esfuerzo_estadistica_libre, $dificultad_actividad_estadistica_libre, $descanso_entre_series_estadistica_libre){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO estadisticas_actividades_libres (id_usuario, codigo_actividad, fecha_actividad_estadistica_libre, duracion_actividad_estadistica_libre, repeticiones_actividad_estadistica_libre, peso_levantado_estadistica_libre, distancia_recorrida_estadistica_libre, velocidad_promedio_estadistica_libre, calorias_quemadas_estadistica_libre, nivel_esfuerzo_estadistica_libre, tipo_ejercicio_estadistica_libre, zona_frecuencia_cardiaca_estadistica_libre, maximo_esfuerzo_estadistica_libre, dificultad_actividad_estadistica_libre, descanso_entre_series_estadistica_libre)
            VALUES (:id_usuario, :codigo_actividad, :fecha_actividad_estadistica_libre, :duracion_actividad_estadistica_libre, :repeticiones_actividad_estadistica_libre, :peso_levantado_estadistica_libre, :distancia_recorrida_estadistica_libre, :velocidad_promedio_estadistica_libre, :calorias_quemadas_estadistica_libre, :nivel_esfuerzo_estadistica_libre, :tipo_ejercicio_estadistica_libre, :zona_frecuencia_cardiaca_estadistica_libre, :maximo_esfuerzo_estadistica_libre, :dificultad_actividad_estadistica_libre, :descanso_entre_series_estadistica_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_libre", $fecha_actividad_estadistica_libre);
            $result->bindParam(":duracion_actividad_estadistica_libre", $duracion_actividad_estadistica_libre);
            $result->bindParam(":repeticiones_actividad_estadistica_libre", $repeticiones_actividad_estadistica_libre);
            $result->bindParam(":peso_levantado_estadistica_libre", $peso_levantado_estadistica_libre);
            $result->bindParam(":distancia_recorrida_estadistica_libre", $distancia_recorrida_estadistica_libre);
            $result->bindParam(":velocidad_promedio_estadistica_libre", $velocidad_promedio_estadistica_libre);
            $result->bindParam(":calorias_quemadas_estadistica_libre", $calorias_quemadas_estadistica_libre);
            $result->bindParam(":nivel_esfuerzo_estadistica_libre", $nivel_esfuerzo_estadistica_libre);
            $result->bindParam(":tipo_ejercicio_estadistica_libre", $tipo_ejercicio_estadistica_libre);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_libre", $zona_frecuencia_cardiaca_estadistica_libre);
            $result->bindParam(":maximo_esfuerzo_estadistica_libre", $maximo_esfuerzo_estadistica_libre);
            $result->bindParam(":dificultad_actividad_estadistica_libre", $dificultad_actividad_estadistica_libre);
            $result->bindParam(":descanso_entre_series_estadistica_libre", $descanso_entre_series_estadistica_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO ESTADISTICA LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verEstadisticasLibres.php' </script>"; 
        }
        public function mostrarEstadisticasLibresAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_libres";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarEstadisticasLibres($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_libres WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarEstadisticasLibresAdmin($id_usuario, $codigo_actividad, $fecha_actividad_estadistica_libre, $duracion_actividad_estadistica_libre, $repeticiones_actividad_estadistica_libre, $peso_levantado_estadistica_libre, $distancia_recorrida_estadistica_libre, $velocidad_promedio_estadistica_libre, $calorias_quemadas_estadistica_libre, $nivel_esfuerzo_estadistica_libre, $tipo_ejercicio_estadistica_libre, $zona_frecuencia_cardiaca_estadistica_libre, $maximo_esfuerzo_estadistica_libre, $dificultad_actividad_estadistica_libre, $descanso_entre_series_estadistica_libre){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $actualizar = "UPDATE estadisticas_actividades_libres SET
                id_usuario=:id_usuario,
                codigo_actividad=:codigo_actividad,
                fecha_actividad_estadistica_libre=:fecha_actividad_estadistica_libre,
                duracion_actividad_estadistica_libre=:duracion_actividad_estadistica_libre,
                repeticiones_actividad_estadistica_libre=:repeticiones_actividad_estadistica_libre,
                peso_levantado_estadistica_libre=:peso_levantado_estadistica_libre,
                distancia_recorrida_estadistica_libre=:distancia_recorrida_estadistica_libre,
                velocidad_promedio_estadistica_libre=:velocidad_promedio_estadistica_libre,
                calorias_quemadas_estadistica_libre=:calorias_quemadas_estadistica_libre,
                nivel_esfuerzo_estadistica_libre=:nivel_esfuerzo_estadistica_libre,
                tipo_ejercicio_estadistica_libre=:tipo_ejercicio_estadistica_libre,
                zona_frecuencia_cardiaca_estadistica_libre=:zona_frecuencia_cardiaca_estadistica_libre,
                maximo_esfuerzo_estadistica_libre=:maximo_esfuerzo_estadistica_libre,
                dificultad_actividad_estadistica_libre=:dificultad_actividad_estadistica_libre,
                descanso_entre_series_estadistica_libre=:descanso_entre_series_estadistica_libre
                WHERE id_usuario=:id_usuario";
        
            $result = $conexion->prepare($actualizar);
        
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_libre", $fecha_actividad_estadistica_libre);
            $result->bindParam(":duracion_actividad_estadistica_libre", $duracion_actividad_estadistica_libre);
            $result->bindParam(":repeticiones_actividad_estadistica_libre", $repeticiones_actividad_estadistica_libre);
            $result->bindParam(":peso_levantado_estadistica_libre", $peso_levantado_estadistica_libre);
            $result->bindParam(":distancia_recorrida_estadistica_libre", $distancia_recorrida_estadistica_libre);
            $result->bindParam(":velocidad_promedio_estadistica_libre", $velocidad_promedio_estadistica_libre);
            $result->bindParam(":calorias_quemadas_estadistica_libre", $calorias_quemadas_estadistica_libre);
            $result->bindParam(":nivel_esfuerzo_estadistica_libre", $nivel_esfuerzo_estadistica_libre);
            $result->bindParam(":tipo_ejercicio_estadistica_libre", $tipo_ejercicio_estadistica_libre);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_libre", $zona_frecuencia_cardiaca_estadistica_libre);
            $result->bindParam(":maximo_esfuerzo_estadistica_libre", $maximo_esfuerzo_estadistica_libre);
            $result->bindParam(":dificultad_actividad_estadistica_libre", $dificultad_actividad_estadistica_libre);
            $result->bindParam(":descanso_entre_series_estadistica_libre", $descanso_entre_series_estadistica_libre);
        
            $result->execute();
        
            echo '<script> alert("Ha modificado la información de las estadísticas de actividad libre") </script>';
            echo "<script> location.href='../../Views/Administrador/verEstadisticasLibres.php' </script>";
        }
        public function eliminarEstadisticasLibresAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM estadisticas_actividades_libres WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Estadisticas de Actividades Libres Eliminada con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearEstadisticasLibres.php' </script>";
        }
        // Modulo Productos del Gimnasio ROL ADMINISTRADOR
        public function registrarProductosAdmin($codigo_producto, $nombre_producto, $descripcion_producto, $cantidad_productos_disponibles, $fecha_vencimiento_producto, $categoria_producto, $marca_producto, $estado_producto, $precio_inicial_producto, $porcentaje_ganancia_producto, $precio_final_producto, $foto_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar = "SELECT * FROM productos WHERE codigo_producto = :codigo_producto";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":codigo_producto", $codigo_producto);

            $result->execute();

            $f = $result->fetch();

            if($f){
                echo '<script> alert("Los datos ingresados ya registraron un producto!") </script>';
                echo "<script> location.href='../../Views/Administrador/crearMedidas.php' </script>";
            }else{
                $insertar = "INSERT INTO productos (codigo_producto, nombre_producto, descripcion_producto, cantidad_productos_disponibles, fecha_vencimiento_producto, categoria_producto, marca_producto, estado_producto, precio_inicial_producto, porcentaje_ganancia_producto, precio_final_producto, foto_producto)
                VALUES (:codigo_producto, :nombre_producto, :descripcion_producto, :cantidad_productos_disponibles, :fecha_vencimiento_producto, :categoria_producto, :marca_producto, :estado_producto, :precio_inicial_producto, :porcentaje_ganancia_producto, :precio_final_producto, :foto_producto)";

                $result = $conexion->prepare($insertar);

                $result->bindParam(":codigo_producto", $codigo_producto);
                $result->bindParam(":nombre_producto", $nombre_producto);
                $result->bindParam(":descripcion_producto", $descripcion_producto);
                $result->bindParam(":cantidad_productos_disponibles", $cantidad_productos_disponibles);
                $result->bindParam(":fecha_vencimiento_producto", $fecha_vencimiento_producto);
                $result->bindParam(":categoria_producto", $categoria_producto);
                $result->bindParam(":marca_producto", $marca_producto);
                $result->bindParam(":estado_producto", $estado_producto);
                $result->bindParam(":precio_inicial_producto", $precio_inicial_producto);
                $result->bindParam(":porcentaje_ganancia_producto", $porcentaje_ganancia_producto);
                $result->bindParam(":precio_final_producto", $precio_final_producto);
                $result->bindParam(":foto_producto", $foto_producto);
                
                $result->execute();

                echo '<script> alert("REGISTRO DE PRODUCTO EXITOSO") </script>';
                echo "<script> location.href='../../Views/Administrador/verProductos.php' </script>";
            }
        }
        // Funcion para mostrar la tabla de productos ROL ADMINISTRADOR
        public function mostrarProductosAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion muestra los detalles de los productos en el gimansio, funcion para el administrador
        public function mostrarProductosAdministrador(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion busca el detalle de la actividad seleccionada para el rol administrador
        public function buscarProductosAdministrador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion es para modificar y actualizar los productos formulario de actualizacion ROL (ADMINISTRADOR)
        public function buscarProductos($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarProductosAdmin($codigo_producto, $nombre_producto, $descripcion_producto, $cantidad_productos_disponibles, $fecha_vencimiento_producto, $categoria_producto, $marca_producto, $estado_producto, $precio_inicial_producto, $porcentaje_ganancia_producto, $precio_final_producto, $foto_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE productos SET codigo_producto=:codigo_producto, nombre_producto=:nombre_producto, descripcion_producto=:descripcion_producto, cantidad_productos_disponibles=:cantidad_productos_disponibles, fecha_vencimiento_producto=:fecha_vencimiento_producto, categoria_producto=:categoria_producto, marca_producto=:marca_producto, estado_producto=:estado_producto, precio_inicial_producto=:precio_inicial_producto, porcentaje_ganancia_producto=:porcentaje_ganancia_producto, precio_final_producto=:precio_final_producto, foto_producto=:foto_producto WHERE codigo_producto=:codigo_producto";

            $result = $conexion->prepare($actualizar);

            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":nombre_producto", $nombre_producto);
            $result->bindParam(":descripcion_producto", $descripcion_producto);
            $result->bindParam(":cantidad_productos_disponibles", $cantidad_productos_disponibles);
            $result->bindParam(":fecha_vencimiento_producto", $fecha_vencimiento_producto);
            $result->bindParam(":categoria_producto", $categoria_producto);
            $result->bindParam(":marca_producto", $marca_producto);
            $result->bindParam(":estado_producto", $estado_producto);
            $result->bindParam(":precio_inicial_producto", $precio_inicial_producto);
            $result->bindParam(":porcentaje_ganancia_producto", $porcentaje_ganancia_producto);
            $result->bindParam(":precio_final_producto", $precio_final_producto);
            $result->bindParam(":foto_producto", $foto_producto);

            $result->execute();

            echo '<script> alert("Ha modificado la informacion del producto") </script>';
            echo "<script> location.href='../../Views/Administrador/verProductos.php' </script>";
        }
        public function eliminarProductosAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM productos WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Producto Eliminado con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearProductos.php' </script>";
        }
        // Modulo Compras Pedidos Proveedores ROL ADMINISTRADOR
        // Funcion para obtener el codigo del roducto en el registro por nombre
        public function obtenerCodigoProductoPorNombre($nombreProducto) {
            // Conecta a la base de datos (ajusta los valores según tu configuración)
            $conexion = new mysqli("localhost", "root", "", "gimnasio_bd");
    
            // Verifica la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }
    
            // Consulta SQL para obtener el código de actividad a partir del nombre
            $query = "SELECT codigo_producto FROM productos WHERE nombre_producto = ?";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("s", $nombreProducto);
            $stmt->execute();
            $stmt->bind_result($codigoProducto);
    
            if ($stmt->fetch()) {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return $codigoProducto;
            } else {
                // Cierre de la consulta y de la conexión
                $stmt->close();
                $conexion->close();
                return false; // Devuelve falso si no se encontró la actividad
            }
        }
        public function registrarComprasAdmin($codigo_producto, $id_proveedor, $direccion_gimnasio, $forma_entrega_pedido_proveedor, $fecha_entrega_pedido_proveedor, $hora_entrega_pedido_proveedor, $metodo_pago_pedido_proveedor, $cantidad_productos_compra, $precio_final_compra_producto, $estado_pedido_compra_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Verificar si el ID de proveedor es válido
            $consultar_proveedor = "SELECT * FROM usuarios WHERE id_usuario = :id_proveedor AND rol_usuario = 'Proveedor'";
            $result_proveedor = $conexion->prepare($consultar_proveedor);
            $result_proveedor->bindParam(":id_proveedor", $id_proveedor);
            $result_proveedor->execute();
        
            if (!$result_proveedor->fetch()) {
                echo '<script> alert("ID de proveedor inválido o no es un proveedor registrado.") </script>';
                echo "<script> location.href='../../Views/Administrador/crearOrdenCompras.php' </script>";
                return;
            }

            $insertar = "INSERT INTO compras_pedidos_proveedores (codigo_producto, id_proveedor, direccion_gimnasio, forma_entrega_pedido_proveedor, fecha_entrega_pedido_proveedor, hora_entrega_pedido_proveedor, metodo_pago_pedido_proveedor, cantidad_productos_compra, precio_final_compra_producto, estado_pedido_compra_producto) 
            VALUES (:codigo_producto, :id_proveedor, :direccion_gimnasio, :forma_entrega_pedido_proveedor, :fecha_entrega_pedido_proveedor, :hora_entrega_pedido_proveedor, :metodo_pago_pedido_proveedor, :cantidad_productos_compra, :precio_final_compra_producto, :estado_pedido_compra_producto)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":id_proveedor", $id_proveedor);
            $result->bindParam(":direccion_gimnasio", $direccion_gimnasio);
            $result->bindParam(":forma_entrega_pedido_proveedor", $forma_entrega_pedido_proveedor);
            $result->bindParam(":fecha_entrega_pedido_proveedor", $fecha_entrega_pedido_proveedor);
            $result->bindParam(":hora_entrega_pedido_proveedor", $hora_entrega_pedido_proveedor);
            $result->bindParam(":metodo_pago_pedido_proveedor", $metodo_pago_pedido_proveedor);
            $result->bindParam(":cantidad_productos_compra", $cantidad_productos_compra);
            $result->bindParam(":precio_final_compra_producto", $precio_final_compra_producto);
            $result->bindParam(":estado_pedido_compra_producto", $estado_pedido_compra_producto);

            $result->execute();
        
            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verOrdenCompras.php' </script>";
        }
        public function mostrarComprasAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores";
            $result = $conexion->prepare($consultar);
            $result->execute();
            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarCompras($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosProveedoresAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para traer los productos y compras de cada proveedor detalle de compras y pedidos
        public function buscarPedidosProveedorAdministrador($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, productos.nombre_producto, productos.descripcion_producto, productos.categoria_producto, productos.marca_producto, compras_pedidos_proveedores.cantidad_productos_compra, compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.estado_pedido_compra_producto, compras_pedidos_proveedores.direccion_gimnasio
            FROM productos
            INNER JOIN compras_pedidos_proveedores ON productos.codigo_producto = compras_pedidos_proveedores.codigo_producto
            WHERE compras_pedidos_proveedores.id_proveedor = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // funcion para ver el detalle del pago a proveedor
        public function buscarPagosProductosProveedores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarComprasAdmin($codigo_producto, $id_proveedor, $direccion_gimnasio, $forma_entrega_pedido_proveedor, $fecha_entrega_pedido_proveedor, $hora_entrega_pedido_proveedor, $metodo_pago_pedido_proveedor, $cantidad_productos_compra, $precio_final_compra_producto, $estado_pedido_compra_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE compras_pedidos_proveedores SET 
                codigo_producto=:codigo_producto, 
                id_proveedor=:id_proveedor, 
                direccion_gimnasio=:direccion_gimnasio, 
                forma_entrega_pedido_proveedor=:forma_entrega_pedido_proveedor, 
                fecha_entrega_pedido_proveedor=:fecha_entrega_pedido_proveedor, 
                hora_entrega_pedido_proveedor=:hora_entrega_pedido_proveedor, 
                metodo_pago_pedido_proveedor=:metodo_pago_pedido_proveedor, 
                cantidad_productos_compra=:cantidad_productos_compra, 
                precio_final_compra_producto=:precio_final_compra_producto, 
                estado_pedido_compra_producto=:estado_pedido_compra_producto 
                WHERE id_proveedor=:id_proveedor";

            $result = $conexion->prepare($actualizar);

            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":id_proveedor", $id_proveedor);
            $result->bindParam(":direccion_gimnasio", $direccion_gimnasio);
            $result->bindParam(":forma_entrega_pedido_proveedor", $forma_entrega_pedido_proveedor);
            $result->bindParam(":fecha_entrega_pedido_proveedor", $fecha_entrega_pedido_proveedor);
            $result->bindParam(":hora_entrega_pedido_proveedor", $hora_entrega_pedido_proveedor);
            $result->bindParam(":metodo_pago_pedido_proveedor", $metodo_pago_pedido_proveedor);
            $result->bindParam(":cantidad_productos_compra", $cantidad_productos_compra);
            $result->bindParam(":precio_final_compra_producto", $precio_final_compra_producto);
            $result->bindParam(":estado_pedido_compra_producto", $estado_pedido_compra_producto);
            
            $result->execute();

            echo '<script> alert("Ha modificado la informacion del pago") </script>';
            echo "<script> location.href='../../Views/Administrador/verOrdenCompras.php' </script>";
        }
        public function eliminarComprasAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM compras_pedidos_proveedores WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Pago Eliminado con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearOrdenCompras.php' </script>";
        }
        // Modulo Pedidos Proveedores
        // Funcion para mostrar la tabla de la vista creada de los pedidos a proveedores
        public function mostrarInfoPedidosProveedoresAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_proveedores";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para ver el dalle del pedido desde la ta tabla de la vista creada
        public function buscarPedidosAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosDetalleAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, productos.nombre_producto, productos.descripcion_producto, productos.categoria_producto, productos.marca_producto, compras_pedidos_proveedores.cantidad_productos_compra, compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.estado_pedido_compra_producto, compras_pedidos_proveedores.direccion_gimnasio
            FROM productos
            INNER JOIN compras_pedidos_proveedores ON productos.codigo_producto = compras_pedidos_proveedores.codigo_producto
            WHERE compras_pedidos_proveedores.id_proveedor = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Ventas de Productos a clientes ROL ADMINISTRADOR
        public function registrarVentasClientesAdmin($codigo_producto, $id_usuario, $direccion_residencia, $forma_entrega_pedido_cliente, $fecha_entrega_pedido_cliente, $hora_entrega_pedido_cliente, $metodo_pago_pedido_cliente, $precio_final_venta_producto, $estado_pedido_venta_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO ventas_pedidos_clientes (codigo_producto, id_usuario, direccion_residencia, forma_entrega_pedido_cliente, fecha_entrega_pedido_cliente, hora_entrega_pedido_cliente, metodo_pago_pedido_cliente, precio_final_venta_producto, estado_pedido_venta_producto)
            VALUES (:codigo_producto, :id_usuario, :direccion_residencia, :forma_entrega_pedido_cliente, :fecha_entrega_pedido_cliente, :hora_entrega_pedido_cliente, :metodo_pago_pedido_cliente, :precio_final_venta_producto, :estado_pedido_venta_producto)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":direccion_residencia", $direccion_residencia);
            $result->bindParam(":forma_entrega_pedido_cliente", $forma_entrega_pedido_cliente);
            $result->bindParam(":fecha_entrega_pedido_cliente", $fecha_entrega_pedido_cliente);
            $result->bindParam(":hora_entrega_pedido_cliente", $hora_entrega_pedido_cliente);
            $result->bindParam(":metodo_pago_pedido_cliente", $metodo_pago_pedido_cliente);
            $result->bindParam(":precio_final_venta_producto", $precio_final_venta_producto);
            $result->bindParam(":estado_pedido_venta_producto", $estado_pedido_venta_producto);

            $result->execute();
        
            echo '<script> alert("REGISTRO VENTA EXITOSO") </script>';
            echo "<script> location.href='../../Views/Administrador/verVentasClientes.php' </script>";

        }
        public function mostrarVentasClientesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes";
            $result = $conexion->prepare($consultar);
            $result->execute();
            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarVentasClientes($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarVentasClientesAdmin($codigo_producto, $id_usuario, $direccion_residencia, $forma_entrega_pedido_cliente, $fecha_entrega_pedido_cliente, $hora_entrega_pedido_cliente, $metodo_pago_pedido_cliente, $precio_final_venta_producto, $estado_pedido_venta_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE ventas_pedidos_clientes SET codigo_producto=:codigo_producto, direccion_residencia=:direccion_residencia, forma_entrega_pedido_cliente=:forma_entrega_pedido_cliente, fecha_entrega_pedido_cliente=:fecha_entrega_pedido_cliente, hora_entrega_pedido_cliente=:hora_entrega_pedido_cliente, metodo_pago_pedido_cliente=:metodo_pago_pedido_cliente, precio_final_venta_producto=:precio_final_venta_producto, estado_pedido_venta_producto=:estado_pedido_venta_producto WHERE id_usuario=:id_usuario";

            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":direccion_residencia", $direccion_residencia);
            $result->bindParam(":forma_entrega_pedido_cliente", $forma_entrega_pedido_cliente);
            $result->bindParam(":fecha_entrega_pedido_cliente", $fecha_entrega_pedido_cliente);
            $result->bindParam(":hora_entrega_pedido_cliente", $hora_entrega_pedido_cliente);
            $result->bindParam(":metodo_pago_pedido_cliente", $metodo_pago_pedido_cliente);
            $result->bindParam(":precio_final_venta_producto", $precio_final_venta_producto);
            $result->bindParam(":estado_pedido_venta_producto", $estado_pedido_venta_producto);
            
            $result->execute();

            echo '<script> alert("Ha modificado la informacion de la venta") </script>';
            echo "<script> location.href='../../Views/Administrador/verVentasClientes.php' </script>";
        }
        public function eliminarVentasClientesAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Venta Eliminada con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearVentasClientes.php' </script>";
        }
        // Esta funcion da el datalle del pedido de la venta 
        public function buscarPedidosClientesAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para traer los productos y compras de cada cliente detalle de compras y pedidos
        public function buscarPedidosClientesAdministrador($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // funcion para ver el detalle de la venta del cliente factura
        public function buscarVentasProductosAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pedidos Clientes
        // Funcion para mostrar la tabla de la vista creada de los pedidos de los clientes
        public function mostrarInfoPedidosClientesAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para ver el dalle del pedido desde la ta tabla de la vista creada
        public function buscarPedidosCliAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosDetalleCliAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pagos a Entrenadores rol ADMINISTRADOR
        public function registrarPagosEntrenadoresAdmin($id_entrenador, $fecha_pago_entrenador, $hora_pago_entrenador, $metodo_pago_entrenador, $precio_final_pago_entrenador, $estado_pago_entrenador){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
        
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Administrador/crearPagos.php' </script>";
                return;
            }

            $consultar = "SELECT * FROM pagos_entrenadores WHERE id_entrenador = :id_entrenador";
            $result = $conexion->prepare($consultar);

            $result->bindParam(":id_entrenador", $id_entrenador);

            $result->execute();

            $f = $result->fetch();

            if($f){
                echo '<script> alert("Los datos ingresados ya registraron un pago!") </script>';
                echo "<script> location.href='../../Views/Administrador/crearPagosEntrenadores.php' </script>";
            }else{
                $insertar = "INSERT INTO pagos_entrenadores (id_entrenador, fecha_pago_entrenador, hora_pago_entrenador, metodo_pago_entrenador, precio_final_pago_entrenador, estado_pago_entrenador)
                VALUES (:id_entrenador, :fecha_pago_entrenador, :hora_pago_entrenador, :metodo_pago_entrenador, :precio_final_pago_entrenador, :estado_pago_entrenador)";

                $result = $conexion->prepare($insertar);

                $result->bindParam(":id_entrenador", $id_entrenador);
                $result->bindParam(":fecha_pago_entrenador", $fecha_pago_entrenador);
                $result->bindParam(":hora_pago_entrenador", $hora_pago_entrenador);
                $result->bindParam(":metodo_pago_entrenador", $metodo_pago_entrenador);
                $result->bindParam(":precio_final_pago_entrenador", $precio_final_pago_entrenador);
                $result->bindParam(":estado_pago_entrenador", $estado_pago_entrenador);
                
                $result->execute();

                echo '<script> alert("REGISTRO DE PAGO A ENTRENADOR EXITOSO") </script>';
                echo "<script> location.href='../../Views/Administrador/verPagosEntrenadores.php' </script>";
            }
            
        }
        public function mostrarPagosEntrenadoresAdmin(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pagos_entrenadores";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPagosEntrenadores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pagos_entrenadores WHERE id_entrenador = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // funcion para ver el detalle o factura del pago a entrenador
        public function buscarPagosEntrenadoresAdmin($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pagos_entrenadores WHERE id_entrenador = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarPagosEntrenadoresAdmin($id_entrenador, $fecha_pago_entrenador, $hora_pago_entrenador, $metodo_pago_entrenador, $precio_final_pago_entrenador, $estado_pago_entrenador){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE pagos_entrenadores SET id_entrenador=:id_entrenador, fecha_pago_entrenador=:fecha_pago_entrenador, hora_pago_entrenador=:hora_pago_entrenador, metodo_pago_entrenador=:metodo_pago_entrenador, precio_final_pago_entrenador=:precio_final_pago_entrenador, estado_pago_entrenador=:estado_pago_entrenador WHERE id_entrenador=:id_entrenador";

            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":fecha_pago_entrenador", $fecha_pago_entrenador);
            $result->bindParam(":hora_pago_entrenador", $hora_pago_entrenador);
            $result->bindParam(":metodo_pago_entrenador", $metodo_pago_entrenador);
            $result->bindParam(":precio_final_pago_entrenador", $precio_final_pago_entrenador);
            $result->bindParam(":estado_pago_entrenador", $estado_pago_entrenador);
            
            $result->execute();

            echo '<script> alert("Ha modificado la informacion del Pago del Entrenador") </script>';
            echo "<script> location.href='../../Views/Administrador/verPagosEntrenadores.php' </script>";
        }
        public function eliminarPagosEntrenadoresAdmin($id_user){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $eliminar = "DELETE FROM pagos_entrenadores WHERE id_entrenador = :id_user";
            $result = $conexion->prepare($eliminar);
            $result->bindParam(":id_user", $id_user);

            $result->execute();
            echo '<script> alert("Pago de Entrenador Eliminado con Exito") </script>';
            echo "<script> location.href='../../Views/Administrador/crearPagosEntrenadores.php' </script>";
        }
        // -------------Desde aca empieza las funciones para la interfax del Cliente---------------------------
        // Modulo Perfil de usuario ROL CLIENTE
        public function mostrarPerfilCliente($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPerfilCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarUserCliente($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $email_usuario, $telefono_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE usuarios SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado Su informacion") </script>';
            echo "<script> location.href='../../Views/Clientes/verPerfilCliente.php' </script>";

        }
        // Modulo Entrenadores ROL CLIENTE
        public function mostrarEntrenadorCliente(){
            $entrenadores = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Entrenador' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($entrenador = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $entrenadores[] = $entrenador;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $entrenadores;
        }
        public function buscarEntrenadorCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Actividades ROL CLIENTE
        public function mostrarActividadesCliente(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarActividadesCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Planes ROL CLIENTE
        public function mostrarPlanesCliente(){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPlanesCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes WHERE codigo_plan = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Ventas de Planes ROL CLIENTE
        public function registrarPagosPlanesCliente($codigo_plan, $id_usuario, $fecha_venta_plan, $hora_venta_plan, $fecha_fin_plan, $metodo_pago_plan, $precio_final_venta_plan, $estado_venta_plan){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO ventas_planes (codigo_plan, id_usuario, fecha_venta_plan, hora_venta_plan, fecha_fin_plan, metodo_pago_plan, precio_final_venta_plan, estado_venta_plan)
            VALUES (:codigo_plan, :id_usuario, :fecha_venta_plan, :hora_venta_plan, :fecha_fin_plan, :metodo_pago_plan, :precio_final_venta_plan, :estado_venta_plan)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_venta_plan", $fecha_venta_plan);
            $result->bindParam(":hora_venta_plan", $hora_venta_plan);
            $result->bindParam(":fecha_fin_plan", $fecha_fin_plan);
            $result->bindParam(":metodo_pago_plan", $metodo_pago_plan);
            $result->bindParam(":precio_final_venta_plan", $precio_final_venta_plan);
            $result->bindParam(":estado_venta_plan", $estado_venta_plan);

            $result->execute();

            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Clientes/verPagosPlanesCliente.php' </script>";
        
        }
        public function mostrarPagosPlanesCliente($id_usuario) {
            $f = array(); // Inicializar el arreglo
        
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Preparar la consulta para obtener los pagos relacionados con los planes del cliente
            $consulta = "SELECT * FROM ventas_planes WHERE id_usuario = :id_usuario";
            
            $result = $conexion->prepare($consulta);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();
        
            // Mientras existan registros, guardarlos en el arreglo $f
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
        
            return $f;
        }
        public function buscarPagosPlanesCliente($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_planes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Inscripciones a actividades Libres ROL CLIENTE
        public function registrarInscripcionesLibresCliente($codigo_actividad, $codigo_plan, $id_usuario, $fecha_inscripcion_libre, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_libre, $comentarios_inscripcion_libre) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $insertar = "INSERT INTO inscripciones_libres (codigo_actividad, codigo_plan, id_usuario, fecha_inscripcion_libre, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_libre, comentarios_inscripcion_libre)
            VALUES (:codigo_actividad, :codigo_plan, :id_usuario, :fecha_inscripcion_libre, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_libre, :comentarios_inscripcion_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_inscripcion_libre", $fecha_inscripcion_libre);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_libre", $estado_inscripcion_libre);
            $result->bindParam(":comentarios_inscripcion_libre", $comentarios_inscripcion_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO INSCRIPCIÓN LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Clientes/verInscripcionesLibresCliente.php' </script>"; 
        }
        public function mostrarInscripcionesLibresCliente($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_libres WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Inscripciones a actividades Personalizadas ROL CLIENTE
        public function registrarInscripcionesPersoCliente($codigo_actividad, $codigo_plan, $id_cliente, $id_entrenador, $fecha_inscripcion_personalizada, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_personalizada, $comentarios_inscripcion_personalizada) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
        
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Clientes/crearInscripcionesPersoCliente.php' </script>";
                return;
            }

            // Verificar si el plan de usuario es válido
            $consultar_plan = "SELECT * FROM ventas_planes WHERE codigo_plan = :codigo_plan AND (codigo_plan = '2025' OR codigo_plan = '2026')";
            $result_plan = $conexion->prepare($consultar_plan);
            $result_plan->bindParam(":codigo_plan", $codigo_plan);
            $result_plan->execute();

            if (!$result_plan->fetch()) {
                echo '<script> alert("Tu plan ingresado, no permite inscripciones Personalizadas.") </script>';
                echo "<script> location.href='../../Views/Clientes/crearInscripcionesPersoCliente.php' </script>";
                return;
            }
            // Realizar la inserción en la base de datos
            $insertar = "INSERT INTO inscripciones_personalizadas (codigo_actividad, codigo_plan, id_cliente, id_entrenador, fecha_inscripcion_personalizada, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_personalizada, comentarios_inscripcion_personalizada)
            VALUES (:codigo_actividad, :codigo_plan, :id_cliente, :id_entrenador, :fecha_inscripcion_personalizada, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_personalizada, :comentarios_inscripcion_personalizada)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":fecha_inscripcion_personalizada", $fecha_inscripcion_personalizada);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_personalizada", $estado_inscripcion_personalizada);
            $result->bindParam(":comentarios_inscripcion_personalizada", $comentarios_inscripcion_personalizada);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO INSCRIPCIÓN PERSONALIZADA EXITOSO") </script>';
            echo "<script> location.href='../../Views/Clientes/verInscripcionesPersoCliente.php' </script>"; 
        }
        public function mostrarInscripcionesPersoCliente($id_cliente){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_personalizadas WHERE id_cliente = :id_cliente";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Estadisticas de actividades Libres ROL CLIENTE
        public function registrarEstadisticasLibresCliente($id_usuario, $codigo_actividad, $fecha_actividad_estadistica_libre, $duracion_actividad_estadistica_libre, $repeticiones_actividad_estadistica_libre, $peso_levantado_estadistica_libre, $distancia_recorrida_estadistica_libre, $velocidad_promedio_estadistica_libre, $calorias_quemadas_estadistica_libre, $nivel_esfuerzo_estadistica_libre, $tipo_ejercicio_estadistica_libre, $zona_frecuencia_cardiaca_estadistica_libre, $maximo_esfuerzo_estadistica_libre, $dificultad_actividad_estadistica_libre, $descanso_entre_series_estadistica_libre){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO estadisticas_actividades_libres (id_usuario, codigo_actividad, fecha_actividad_estadistica_libre, duracion_actividad_estadistica_libre, repeticiones_actividad_estadistica_libre, peso_levantado_estadistica_libre, distancia_recorrida_estadistica_libre, velocidad_promedio_estadistica_libre, calorias_quemadas_estadistica_libre, nivel_esfuerzo_estadistica_libre, tipo_ejercicio_estadistica_libre, zona_frecuencia_cardiaca_estadistica_libre, maximo_esfuerzo_estadistica_libre, dificultad_actividad_estadistica_libre, descanso_entre_series_estadistica_libre)
            VALUES (:id_usuario, :codigo_actividad, :fecha_actividad_estadistica_libre, :duracion_actividad_estadistica_libre, :repeticiones_actividad_estadistica_libre, :peso_levantado_estadistica_libre, :distancia_recorrida_estadistica_libre, :velocidad_promedio_estadistica_libre, :calorias_quemadas_estadistica_libre, :nivel_esfuerzo_estadistica_libre, :tipo_ejercicio_estadistica_libre, :zona_frecuencia_cardiaca_estadistica_libre, :maximo_esfuerzo_estadistica_libre, :dificultad_actividad_estadistica_libre, :descanso_entre_series_estadistica_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_libre", $fecha_actividad_estadistica_libre);
            $result->bindParam(":duracion_actividad_estadistica_libre", $duracion_actividad_estadistica_libre);
            $result->bindParam(":repeticiones_actividad_estadistica_libre", $repeticiones_actividad_estadistica_libre);
            $result->bindParam(":peso_levantado_estadistica_libre", $peso_levantado_estadistica_libre);
            $result->bindParam(":distancia_recorrida_estadistica_libre", $distancia_recorrida_estadistica_libre);
            $result->bindParam(":velocidad_promedio_estadistica_libre", $velocidad_promedio_estadistica_libre);
            $result->bindParam(":calorias_quemadas_estadistica_libre", $calorias_quemadas_estadistica_libre);
            $result->bindParam(":nivel_esfuerzo_estadistica_libre", $nivel_esfuerzo_estadistica_libre);
            $result->bindParam(":tipo_ejercicio_estadistica_libre", $tipo_ejercicio_estadistica_libre);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_libre", $zona_frecuencia_cardiaca_estadistica_libre);
            $result->bindParam(":maximo_esfuerzo_estadistica_libre", $maximo_esfuerzo_estadistica_libre);
            $result->bindParam(":dificultad_actividad_estadistica_libre", $dificultad_actividad_estadistica_libre);
            $result->bindParam(":descanso_entre_series_estadistica_libre", $descanso_entre_series_estadistica_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO ESTADISTICA LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Clientes/verEstadisticasLibresCliente.php' </script>"; 
        }
        public function mostrarEstadisticasLibresCliente($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_libres WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Estadisticas de actividades Personalizadas ROL CLIENTE
        public function mostrarEstadisticasPersonalizadasCliente($id_cliente){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_personalizadas WHERE id_cliente = :id_cliente";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Productos del gimnasio ROL CLIENTE
        public function mostrarProductosCliente(){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarProductosCliente($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Ventas Pedidos de Productos ROL CLIENTE
        public function registrarComprasClientes($codigo_producto, $id_usuario, $direccion_residencia, $forma_entrega_pedido_cliente, $fecha_entrega_pedido_cliente, $hora_entrega_pedido_cliente, $metodo_pago_pedido_cliente, $precio_final_venta_producto, $estado_pedido_venta_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $insertar = "INSERT INTO ventas_pedidos_clientes (codigo_producto, id_usuario, direccion_residencia, forma_entrega_pedido_cliente, fecha_entrega_pedido_cliente, hora_entrega_pedido_cliente, metodo_pago_pedido_cliente, precio_final_venta_producto, estado_pedido_venta_producto) 
            VALUES (:codigo_producto, :id_usuario, :direccion_residencia, :forma_entrega_pedido_cliente, :fecha_entrega_pedido_cliente, :hora_entrega_pedido_cliente, :metodo_pago_pedido_cliente, :precio_final_venta_producto, :estado_pedido_venta_producto)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":direccion_residencia", $direccion_residencia);
            $result->bindParam(":forma_entrega_pedido_cliente", $forma_entrega_pedido_cliente);
            $result->bindParam(":fecha_entrega_pedido_cliente", $fecha_entrega_pedido_cliente);
            $result->bindParam(":hora_entrega_pedido_cliente", $hora_entrega_pedido_cliente);
            $result->bindParam(":metodo_pago_pedido_cliente", $metodo_pago_pedido_cliente);
            $result->bindParam(":precio_final_venta_producto", $precio_final_venta_producto);
            $result->bindParam(":estado_pedido_venta_producto", $estado_pedido_venta_producto);

            $result->execute();
        
            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Clientes/verComprasClientes.php' </script>";
        }
        public function mostrarComprasClientes($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarComprasClientes($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion da el datalle del pedido de la venta 
        public function buscarPedidosProductosClientes($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para traer los productos y compras de cada cliente detalle de compras y pedidos
        public function buscarPedidosProductosCli($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pedidos VISTA ROL CLIENTE
        // Funcion para mostrar la tabla de la vista creada de los pedidos de los clientes
        public function mostrarInfoPedidosClientes($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para ver el dalle del pedido desde la ta tabla de la vista creada
        public function buscarPedidosCliente($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosDetalleCli($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // ---------------------------Desde aca empieza las funciones para la interfax del Entrenador-----------------------------
        public function mostrarPerfilEntrenador($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPerfilEntrenador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarUserEntrenador($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $email_usuario, $telefono_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE usuarios SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado Su informacion") </script>';
            echo "<script> location.href='../../Views/Entrenadores/verPerfilEntrenador.php' </script>";

        }
        // Modulo Clientes ROL ENTRENADOR
        public function mostrarClienteEntrenador(){
            $clientes = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Cliente' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($cliente = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $clientes[] = $cliente;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $clientes;
        }
        public function buscarClienteEntrenador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Actividades ROL ENTRENADOR
        public function mostrarActividadesEntrenador(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarActividadesEntrenador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo inscripciones a actividades Personalizadas ROL ENTRENADOR

        public function mostrarInscripcionesPersoEntrenador($id_entrenador){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_personalizadas WHERE id_entrenador = :id_entrenador";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_entrenador', $id_entrenador, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function registrarEstadisticasPersoEntrenador($id_cliente, $id_entrenador, $codigo_actividad, $fecha_actividad_estadistica_personalizada, $duracion_actividad_estadistica_personalizada, $repeticiones_actividad_estadistica_personalizada, $peso_levantado_estadistica_personalizada, $distancia_recorrida_estadistica_personalizada, $velocidad_promedio_estadistica_personalizada, $calorias_quemadas_estadistica_personalizada, $nivel_esfuerzo_estadistica_personalizada, $tipo_ejercicio_estadistica_personalizada, $zona_frecuencia_cardiaca_estadistica_perso, $maximo_esfuerzo_estadistica_personalizada, $dificultad_actividad_estadistica_personalizada, $descanso_entre_series_estadistica_perso){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
        
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Entrenadores/crearEstadisticasPersoEntrenador.php' </script>";
                return;
            }

            $insertar = "INSERT INTO estadisticas_actividades_personalizadas (id_cliente, id_entrenador, codigo_actividad, fecha_actividad_estadistica_personalizada, duracion_actividad_estadistica_personalizada, repeticiones_actividad_estadistica_personalizada, peso_levantado_estadistica_personalizada, distancia_recorrida_estadistica_personalizada, velocidad_promedio_estadistica_personalizada, calorias_quemadas_estadistica_personalizada, nivel_esfuerzo_estadistica_personalizada, tipo_ejercicio_estadistica_personalizada, zona_frecuencia_cardiaca_estadistica_perso, maximo_esfuerzo_estadistica_personalizada, dificultad_actividad_estadistica_personalizada, descanso_entre_series_estadistica_perso)
            VALUES (:id_cliente, :id_entrenador, :codigo_actividad, :fecha_actividad_estadistica_personalizada, :duracion_actividad_estadistica_personalizada, :repeticiones_actividad_estadistica_personalizada, :peso_levantado_estadistica_personalizada, :distancia_recorrida_estadistica_personalizada, :velocidad_promedio_estadistica_personalizada, :calorias_quemadas_estadistica_personalizada, :nivel_esfuerzo_estadistica_personalizada, :tipo_ejercicio_estadistica_personalizada, :zona_frecuencia_cardiaca_estadistica_perso, :maximo_esfuerzo_estadistica_personalizada, :dificultad_actividad_estadistica_personalizada, :descanso_entre_series_estadistica_perso)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_personalizada", $fecha_actividad_estadistica_personalizada);
            $result->bindParam(":duracion_actividad_estadistica_personalizada", $duracion_actividad_estadistica_personalizada);
            $result->bindParam(":repeticiones_actividad_estadistica_personalizada", $repeticiones_actividad_estadistica_personalizada);
            $result->bindParam(":peso_levantado_estadistica_personalizada", $peso_levantado_estadistica_personalizada);
            $result->bindParam(":distancia_recorrida_estadistica_personalizada", $distancia_recorrida_estadistica_personalizada);
            $result->bindParam(":velocidad_promedio_estadistica_personalizada", $velocidad_promedio_estadistica_personalizada);
            $result->bindParam(":calorias_quemadas_estadistica_personalizada", $calorias_quemadas_estadistica_personalizada);
            $result->bindParam(":nivel_esfuerzo_estadistica_personalizada", $nivel_esfuerzo_estadistica_personalizada);
            $result->bindParam(":tipo_ejercicio_estadistica_personalizada", $tipo_ejercicio_estadistica_personalizada);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_perso", $zona_frecuencia_cardiaca_estadistica_perso);
            $result->bindParam(":maximo_esfuerzo_estadistica_personalizada", $maximo_esfuerzo_estadistica_personalizada);
            $result->bindParam(":dificultad_actividad_estadistica_personalizada", $dificultad_actividad_estadistica_personalizada);
            $result->bindParam(":descanso_entre_series_estadistica_perso", $descanso_entre_series_estadistica_perso);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO ESTADISTICA PERSONALIZADA CON EXITO") </script>';
            echo "<script> location.href='../../Views/Entrenadores/verEstadisticasPersoEntrenador.php' </script>"; 
        }
        public function mostrarEstadisticasPersoEntrenador($id_entrenador){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_personalizadas WHERE id_entrenador = :id_entrenador";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_entrenador', $id_entrenador, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Productos ROL ENTRENADOR
        public function mostrarProductosEntrenador(){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarProductosEntrenador($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM productos WHERE codigo_producto = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Ventas de productos a entrenadores ROL ENTRENADOR
        public function registrarComprasEntrenador($codigo_producto, $id_usuario, $direccion_residencia, $forma_entrega_pedido_cliente, $fecha_entrega_pedido_cliente, $hora_entrega_pedido_cliente, $metodo_pago_pedido_cliente, $precio_final_venta_producto, $estado_pedido_venta_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $insertar = "INSERT INTO ventas_pedidos_clientes (codigo_producto, id_usuario, direccion_residencia, forma_entrega_pedido_cliente, fecha_entrega_pedido_cliente, hora_entrega_pedido_cliente, metodo_pago_pedido_cliente, precio_final_venta_producto, estado_pedido_venta_producto) 
            VALUES (:codigo_producto, :id_usuario, :direccion_residencia, :forma_entrega_pedido_cliente, :fecha_entrega_pedido_cliente, :hora_entrega_pedido_cliente, :metodo_pago_pedido_cliente, :precio_final_venta_producto, :estado_pedido_venta_producto)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_producto", $codigo_producto);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":direccion_residencia", $direccion_residencia);
            $result->bindParam(":forma_entrega_pedido_cliente", $forma_entrega_pedido_cliente);
            $result->bindParam(":fecha_entrega_pedido_cliente", $fecha_entrega_pedido_cliente);
            $result->bindParam(":hora_entrega_pedido_cliente", $hora_entrega_pedido_cliente);
            $result->bindParam(":metodo_pago_pedido_cliente", $metodo_pago_pedido_cliente);
            $result->bindParam(":precio_final_venta_producto", $precio_final_venta_producto);
            $result->bindParam(":estado_pedido_venta_producto", $estado_pedido_venta_producto);

            $result->execute();
        
            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Entrenadores/verComprasEntrenadores.php' </script>";
        }
        public function mostrarComprasEntrenadores($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Esta funcion da el datalle del pedido de la venta 
        public function buscarPedidosProductosEntrenadores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para traer los productos y compras de cada cliente detalle de compras y pedidos
        public function buscarPedidosProductosEntre($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarComprasEntrenadores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pedidos VISTA ROL ENTRENADOR
        // Funcion para mostrar la tabla de la vista creada de los pedidos de los clientes
        public function mostrarInfoPedidosEntrenadores($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para ver el dalle del pedido desde la ta tabla de la vista creada
        public function buscarPedidosEntrenador($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_clientes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosDetalleEntre($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, ventas_pedidos_clientes.codigo_producto, ventas_pedidos_clientes.id_usuario, ventas_pedidos_clientes.fecha_entrega_pedido_cliente,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.precio_final_venta_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                ventas_pedidos_clientes.precio_final_venta_producto, ventas_pedidos_clientes.estado_pedido_venta_producto, ventas_pedidos_clientes.direccion_residencia
            FROM productos
            INNER JOIN ventas_pedidos_clientes ON productos.codigo_producto = ventas_pedidos_clientes.codigo_producto
            WHERE ventas_pedidos_clientes.id_usuario = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pagos de Entrenadores ROL ENTRENADOR
        public function mostrarMisPagosEntrenador($id_entrenador){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pagos_entrenadores WHERE id_entrenador = :id_entrenador";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_entrenador', $id_entrenador, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // funcion para ver el detalle o factura del pago a entrenador
        public function buscarMisPagosEntrenadores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pagos_entrenadores WHERE id_entrenador = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // ---------------------------Funciones para la interfaz del PROVEEDOR---------------------------------------------------
        // Modulo Perfil de usuario ROL PROVEEDOR
        public function mostrarPerfilProveedor($id_usuario){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPerfilProveedor($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarUserProveedor($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $email_usuario, $telefono_usuario, $clavemd, $foto_usuario){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE usuarios SET id_usuario=:id_usuario, tipo_documento_usuario=:tipo_documento_usuario, nombres_usuario=:nombres_usuario, apellidos_usuario=:apellidos_usuario, email_usuario=:email_usuario, telefono_usuario=:telefono_usuario, clavemd=:clavemd, foto_usuario=:foto_usuario WHERE id_usuario=:id_usuario";
            $result = $conexion->prepare($actualizar);

            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":tipo_documento_usuario", $tipo_documento_usuario);
            $result->bindParam(":nombres_usuario", $nombres_usuario);
            $result->bindParam(":apellidos_usuario", $apellidos_usuario);
            $result->bindParam(":email_usuario", $email_usuario);
            $result->bindParam(":telefono_usuario", $telefono_usuario);
            $result->bindParam(":clavemd", $clavemd);
            $result->bindParam(":foto_usuario", $foto_usuario);

            $result->execute();
            echo '<script> alert("Ha modificado Su informacion") </script>';
            echo "<script> location.href='../../Views/Proveedores/verPerfilProveedor.php' </script>";

        }
        // Modulo Entrenadores ROL PROVEEDOR
        public function mostrarEntrenadorProveedor(){
            $entrenadores = array();

            try {
                $objConexion = new Conexion;
                $conexion = $objConexion->get_conexion();

                $consulta = "SELECT * FROM usuarios WHERE rol_usuario = 'Entrenador' AND estado_usuario = 'Activo'";
                $resultado = $conexion->query($consulta);

                while ($entrenador = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $entrenadores[] = $entrenador;
                }
            } catch (PDOException $e) {
                // Manejar cualquier error de base de datos aquí
                // Por ejemplo: echo "Error: " . $e->getMessage();
            }

            return $entrenadores;
        }
        public function buscarEntrenadorProveedor($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM usuarios WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Actividades ROL PROVEEDOR
        public function mostrarActividadesProveedor(){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarActividadesProveedor($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM actividades WHERE codigo_actividad = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Planes ROL PROVEEDOR
        public function mostrarPlanesProveedor(){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes";
            $result = $conexion->prepare($consultar);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPlanesProveedor($id_user){

            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM planes WHERE codigo_plan = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Ventas de planes ROL PROVEEDOR
        public function registrarPagosPlanesProveedor($codigo_plan, $id_usuario, $fecha_venta_plan, $hora_venta_plan, $fecha_fin_plan, $metodo_pago_plan, $precio_final_venta_plan, $estado_venta_plan){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO ventas_planes (codigo_plan, id_usuario, fecha_venta_plan, hora_venta_plan, fecha_fin_plan, metodo_pago_plan, precio_final_venta_plan, estado_venta_plan)
            VALUES (:codigo_plan, :id_usuario, :fecha_venta_plan, :hora_venta_plan, :fecha_fin_plan, :metodo_pago_plan, :precio_final_venta_plan, :estado_venta_plan)";

            $result = $conexion->prepare($insertar);

            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_venta_plan", $fecha_venta_plan);
            $result->bindParam(":hora_venta_plan", $hora_venta_plan);
            $result->bindParam(":fecha_fin_plan", $fecha_fin_plan);
            $result->bindParam(":metodo_pago_plan", $metodo_pago_plan);
            $result->bindParam(":precio_final_venta_plan", $precio_final_venta_plan);
            $result->bindParam(":estado_venta_plan", $estado_venta_plan);

            $result->execute();

            echo '<script> alert("REGISTRO DE PAGO EXITOSO") </script>';
            echo "<script> location.href='../../Views/Proveedores/verPagosPlanesProveedor.php' </script>";
        
        }
        public function mostrarPagosPlanesProveedor($id_usuario) {
            $f = array(); // Inicializar el arreglo
        
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Preparar la consulta para obtener los pagos relacionados con los planes del cliente
            $consulta = "SELECT * FROM ventas_planes WHERE id_usuario = :id_usuario";
            
            $result = $conexion->prepare($consulta);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();
        
            // Mientras existan registros, guardarlos en el arreglo $f
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
        
            return $f;
        }
        public function buscarPagosPlanesProveedor($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM ventas_planes WHERE id_usuario = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Inscripciones a actividades Libres ROL PROVEEDOR
        public function registrarInscripcionesLibresProveedor($codigo_actividad, $codigo_plan, $id_usuario, $fecha_inscripcion_libre, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_libre, $comentarios_inscripcion_libre) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            $insertar = "INSERT INTO inscripciones_libres (codigo_actividad, codigo_plan, id_usuario, fecha_inscripcion_libre, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_libre, comentarios_inscripcion_libre)
            VALUES (:codigo_actividad, :codigo_plan, :id_usuario, :fecha_inscripcion_libre, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_libre, :comentarios_inscripcion_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":fecha_inscripcion_libre", $fecha_inscripcion_libre);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_libre", $estado_inscripcion_libre);
            $result->bindParam(":comentarios_inscripcion_libre", $comentarios_inscripcion_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO INSCRIPCIÓN LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Proveedores/verInscripcionesLibresProveedor.php' </script>"; 
        }
        public function mostrarInscripcionesLibresProveedor($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_libres WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Inscripciones a actividades Personalizadas ROL Proveedor
        public function registrarInscripcionesPersoProveedor($codigo_actividad, $codigo_plan, $id_cliente, $id_entrenador, $fecha_inscripcion_personalizada, $fecha_inicio_actividad, $hora_inicio_actividad, $estado_inscripcion_personalizada, $comentarios_inscripcion_personalizada) {
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
        
            // Verificar si el ID de entrenador es válido
            $consultar_entrenador = "SELECT * FROM usuarios WHERE id_usuario = :id_entrenador AND rol_usuario = 'Entrenador'";
            $result_entrenador = $conexion->prepare($consultar_entrenador);
            $result_entrenador->bindParam(":id_entrenador", $id_entrenador);
            $result_entrenador->execute();
                
            if (!$result_entrenador->fetch()) {
                echo '<script> alert("ID de entrenador inválido o no es un entrenador registrado.") </script>';
                echo "<script> location.href='../../Views/Proveedores/crearInscripcionesPersoProveedor.php' </script>";
                return;
            }
        
            // Verificar si el plan de usuario es válido
            $consultar_plan = "SELECT * FROM ventas_planes WHERE codigo_plan = :codigo_plan AND (codigo_plan = '2025' OR codigo_plan = '2026')";
            $result_plan = $conexion->prepare($consultar_plan);
            $result_plan->bindParam(":codigo_plan", $codigo_plan);
            $result_plan->execute();
        
            if (!$result_plan->fetch()) {
                echo '<script> alert("Tu plan ingresado, no permite inscripciones Personalizadas.") </script>';
                echo "<script> location.href='../../Views/Proveedores/crearInscripcionesPersoProveedor.php' </script>";
                return;
            }
            // Realizar la inserción en la base de datos
            $insertar = "INSERT INTO inscripciones_personalizadas (codigo_actividad, codigo_plan, id_cliente, id_entrenador, fecha_inscripcion_personalizada, fecha_inicio_actividad, hora_inicio_actividad, estado_inscripcion_personalizada, comentarios_inscripcion_personalizada)
            VALUES (:codigo_actividad, :codigo_plan, :id_cliente, :id_entrenador, :fecha_inscripcion_personalizada, :fecha_inicio_actividad, :hora_inicio_actividad, :estado_inscripcion_personalizada, :comentarios_inscripcion_personalizada)";
                
            $result = $conexion->prepare($insertar);
                
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":codigo_plan", $codigo_plan);
            $result->bindParam(":id_cliente", $id_cliente);
            $result->bindParam(":id_entrenador", $id_entrenador);
            $result->bindParam(":fecha_inscripcion_personalizada", $fecha_inscripcion_personalizada);
            $result->bindParam(":fecha_inicio_actividad", $fecha_inicio_actividad);
            $result->bindParam(":hora_inicio_actividad", $hora_inicio_actividad);
            $result->bindParam(":estado_inscripcion_personalizada", $estado_inscripcion_personalizada);
            $result->bindParam(":comentarios_inscripcion_personalizada", $comentarios_inscripcion_personalizada);
                
            $result->execute();
                
            echo '<script> alert("REGISTRO INSCRIPCIÓN PERSONALIZADA EXITOSO") </script>';
            echo "<script> location.href='../../Views/Proveedores/verInscripcionesPersoProveedor.php' </script>"; 
        }
        public function mostrarInscripcionesPersoProveedor($id_cliente){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM inscripciones_personalizadas WHERE id_cliente = :id_cliente";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Estadisticas de actividades libres ROL PROVEEDOR
        public function registrarEstadisticasLibresProveedor($id_usuario, $codigo_actividad, $fecha_actividad_estadistica_libre, $duracion_actividad_estadistica_libre, $repeticiones_actividad_estadistica_libre, $peso_levantado_estadistica_libre, $distancia_recorrida_estadistica_libre, $velocidad_promedio_estadistica_libre, $calorias_quemadas_estadistica_libre, $nivel_esfuerzo_estadistica_libre, $tipo_ejercicio_estadistica_libre, $zona_frecuencia_cardiaca_estadistica_libre, $maximo_esfuerzo_estadistica_libre, $dificultad_actividad_estadistica_libre, $descanso_entre_series_estadistica_libre){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $insertar = "INSERT INTO estadisticas_actividades_libres (id_usuario, codigo_actividad, fecha_actividad_estadistica_libre, duracion_actividad_estadistica_libre, repeticiones_actividad_estadistica_libre, peso_levantado_estadistica_libre, distancia_recorrida_estadistica_libre, velocidad_promedio_estadistica_libre, calorias_quemadas_estadistica_libre, nivel_esfuerzo_estadistica_libre, tipo_ejercicio_estadistica_libre, zona_frecuencia_cardiaca_estadistica_libre, maximo_esfuerzo_estadistica_libre, dificultad_actividad_estadistica_libre, descanso_entre_series_estadistica_libre)
            VALUES (:id_usuario, :codigo_actividad, :fecha_actividad_estadistica_libre, :duracion_actividad_estadistica_libre, :repeticiones_actividad_estadistica_libre, :peso_levantado_estadistica_libre, :distancia_recorrida_estadistica_libre, :velocidad_promedio_estadistica_libre, :calorias_quemadas_estadistica_libre, :nivel_esfuerzo_estadistica_libre, :tipo_ejercicio_estadistica_libre, :zona_frecuencia_cardiaca_estadistica_libre, :maximo_esfuerzo_estadistica_libre, :dificultad_actividad_estadistica_libre, :descanso_entre_series_estadistica_libre)";
        
            $result = $conexion->prepare($insertar);
        
            $result->bindParam(":id_usuario", $id_usuario);
            $result->bindParam(":codigo_actividad", $codigo_actividad);
            $result->bindParam(":fecha_actividad_estadistica_libre", $fecha_actividad_estadistica_libre);
            $result->bindParam(":duracion_actividad_estadistica_libre", $duracion_actividad_estadistica_libre);
            $result->bindParam(":repeticiones_actividad_estadistica_libre", $repeticiones_actividad_estadistica_libre);
            $result->bindParam(":peso_levantado_estadistica_libre", $peso_levantado_estadistica_libre);
            $result->bindParam(":distancia_recorrida_estadistica_libre", $distancia_recorrida_estadistica_libre);
            $result->bindParam(":velocidad_promedio_estadistica_libre", $velocidad_promedio_estadistica_libre);
            $result->bindParam(":calorias_quemadas_estadistica_libre", $calorias_quemadas_estadistica_libre);
            $result->bindParam(":nivel_esfuerzo_estadistica_libre", $nivel_esfuerzo_estadistica_libre);
            $result->bindParam(":tipo_ejercicio_estadistica_libre", $tipo_ejercicio_estadistica_libre);
            $result->bindParam(":zona_frecuencia_cardiaca_estadistica_libre", $zona_frecuencia_cardiaca_estadistica_libre);
            $result->bindParam(":maximo_esfuerzo_estadistica_libre", $maximo_esfuerzo_estadistica_libre);
            $result->bindParam(":dificultad_actividad_estadistica_libre", $dificultad_actividad_estadistica_libre);
            $result->bindParam(":descanso_entre_series_estadistica_libre", $descanso_entre_series_estadistica_libre);
        
            $result->execute();
        
            echo '<script> alert("REGISTRO ESTADISTICA LIBRE EXITOSO") </script>';
            echo "<script> location.href='../../Views/Proveedores/verEstadisticasLibresProveedor.php' </script>"; 
        }
        public function mostrarEstadisticasLibresProveedor($id_usuario){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_libres WHERE id_usuario = :id_usuario";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Estadisticas de actividades personalizadas ROL PROVEEDOR
        public function mostrarEstadisticasPersonalizadasProveedor($id_cliente){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM estadisticas_actividades_personalizadas WHERE id_cliente = :id_cliente";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Compras de productos, Pagos hechos a proveedores
        public function mostrarPagosProveedores($id_proveedor){
            $f = array();
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_proveedor";

            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPagosProvee($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPagosProveedores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function modificarPagosProveedor($id_proveedor, $fecha_entrega_pedido_proveedor, $hora_entrega_pedido_proveedor, $estado_pedido_compra_producto){
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $actualizar = "UPDATE compras_pedidos_proveedores SET 

                id_proveedor=:id_proveedor,
                fecha_entrega_pedido_proveedor=:fecha_entrega_pedido_proveedor, 
                hora_entrega_pedido_proveedor=:hora_entrega_pedido_proveedor, 
                estado_pedido_compra_producto=:estado_pedido_compra_producto 
                WHERE id_proveedor=:id_proveedor";

            $result = $conexion->prepare($actualizar);

            $result->bindParam(":fecha_entrega_pedido_proveedor", $fecha_entrega_pedido_proveedor);
            $result->bindParam(":hora_entrega_pedido_proveedor", $hora_entrega_pedido_proveedor);
            $result->bindParam(":estado_pedido_compra_producto", $estado_pedido_compra_producto);
            $result->bindParam(":id_proveedor", $id_proveedor); // Agregando este enlace para :id_proveedor
            
            $result->execute();

            echo '<script> alert("Ha modificado la informacion del pago y el pedido") </script>';
            echo "<script> location.href='../../Views/Proveedores/verPagosProveedor.php' </script>";
        }
        // Esta funcion da el datalle del pedido de la compra
        public function buscarPedidosProductosProveedores($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM compras_pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para traer los productos y compras de cada proveedor detalle de compras y pedidos
        public function buscarPedidosProductosProvee($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
                    
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, compras_pedidos_proveedores.codigo_producto, compras_pedidos_proveedores.id_proveedor, compras_pedidos_proveedores.fecha_entrega_pedido_proveedor,
                        compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.precio_final_compra_producto, productos.nombre_producto,
                        productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                        compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.estado_pedido_compra_producto, compras_pedidos_proveedores.direccion_gimnasio
            FROM productos
            INNER JOIN compras_pedidos_proveedores ON productos.codigo_producto = compras_pedidos_proveedores.codigo_producto
            WHERE compras_pedidos_proveedores.id_proveedor = :id_user";
                        
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
                    
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Modulo Pedidos Proveedores
        // Funcion para mostrar la tabla de la vista creada de los pedidos de los clientes
        public function mostrarInfoPedidosProveedor($id_proveedor){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_proveedores WHERE id_proveedor = :id_proveedor";
            $result = $conexion->prepare($consultar);
            $result->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        // Funcion para ver el dalle del pedido desde la ta tabla de la vista creada
        public function buscarPedidosProveedor($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            // prepare
            $consultar = "SELECT * FROM pedidos_proveedores WHERE id_proveedor = :id_user";
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();

            // mientras existan registro loq que esta en result lo convertimos en un arreglo, para separar dato por dato
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
        public function buscarPedidosDetalleProvee($id_user){
            $f = null;
            // Creamos objeto conexion
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();
            
            // Consulta SQL con INNER JOIN para unir las tablas
            $consultar = "SELECT productos.foto_producto, compras_pedidos_proveedores.codigo_producto, compras_pedidos_proveedores.id_proveedor, compras_pedidos_proveedores.fecha_entrega_pedido_proveedor,
                compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.precio_final_compra_producto, productos.nombre_producto,
                productos.descripcion_producto, productos.categoria_producto, productos.marca_producto,
                compras_pedidos_proveedores.precio_final_compra_producto, compras_pedidos_proveedores.estado_pedido_compra_producto, compras_pedidos_proveedores.direccion_gimnasio
            FROM productos
            INNER JOIN compras_pedidos_proveedores ON productos.codigo_producto = compras_pedidos_proveedores.codigo_producto
            WHERE compras_pedidos_proveedores.id_proveedor = :id_user";
                
            $result = $conexion->prepare($consultar);
            $result->bindParam(":id_user", $id_user);
            $result->execute();
            
            // Mientras existan registros, los convertimos en un arreglo
            while ($resultado = $result->fetch()) {
                $f[] = $resultado;
            }
            return $f;
        }
    }
?>