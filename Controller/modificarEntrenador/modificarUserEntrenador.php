<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_usuario = $_POST['id_usuario'];
    $tipo_documento_usuario = $_POST['tipo_documento_usuario'];
    $nombres_usuario = $_POST['nombres_usuario'];
    $apellidos_usuario = $_POST['apellidos_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $telefono_usuario = $_POST['telefono_usuario'];
    // Valores por defecto
    $clave = $_POST['clavemd'];  


    $clavemd = md5($clave);
    
    // Logica para carga imagenes a un formulario

    // DFINIMOS EL PESO LIMITE Y FORMATOS DE IMAGENES PERMITIDOS
    define('LIMITE', 2000);
    define('ARREGLO', serialize(array('image/jpg', 'image/png', 'image/jpeg', 'image/gif')));
    $PERMITIDOS = unserialize(ARREGLO);


    // AHORA VALIDAMOS QUE EL ARCHIVO SI HAYA SIDO CARGADO Y NO TENGA ERRORES

    if ($_FILES['foto_usuario']['error']) {

        echo '<script> alert("¡Error al cargar imagen, intente nuevamente!") </script>';
        echo "<script> location.href='../../Views/Entrenadores/verPerfilEntrenador.php' </script>";

    } else {

        // CONFIRMAMOS FORMATO DE IMAGEN Y PESO

        if (in_array($_FILES['foto_usuario']['type'], $PERMITIDOS) && $_FILES['foto_usuario']['size'] <= LIMITE * 1024) {
            

            // CAPTURAMOS LOS VALORES A GUARDAR EN LA BASE DE DATOS

            $foto_usuario = "../../uploads/users/".$_FILES['foto_usuario']['name'];

            // MOVEMOS EL ARCHIVO A LA CARPETA SELECCIONADA

            $resultado = move_uploaded_file($_FILES['foto_usuario']['tmp_name'], $foto_usuario);

            // Encriptamos clave

            $clavemd = md5($clave);

            // CREAMOS UN OBJETO A PARTIR DE LA CLASE CONSULTAS
            // PARA PODER ENVIAR LOS ARGUMENTOS A UNA FUNCION ESPECIFICA (registrarUserAdmin)

            $objConsultas = new Consultas();
            $result = $objConsultas->modificarUserEntrenador($id_usuario, $tipo_documento_usuario, $nombres_usuario, $apellidos_usuario, $email_usuario, $telefono_usuario, $clavemd, $foto_usuario);

        } else {

            echo '<script> alert("¡Error al cargar imagen, revisar formato de peso!") </script>';
            echo "<script> location.href='../../Views/Entrenadores/verPerfilEntrenador.php' </script>";

        }

    }

?>