<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_cliente = $_POST['id_cliente'];
    $id_entrenador = $_POST['id_entrenador'];
    $fecha_inscripcion_personalizada = $_POST['fecha_inscripcion_personalizada']; 
    $fecha_inicio_actividad = $_POST['fecha_inicio_actividad'];
    $hora_inicio_actividad = $_POST['hora_inicio_actividad']; 
    $estado_inscripcion_personalizada = 'Programada';
    $comentarios_inscripcion_personalizada = $_POST['comentarios_inscripcion_personalizada'];

    $nombre_plan = $_POST['nombre_plan'];
    $nombre_actividad = $_POST['nombre_actividad'];

    $objConsultas = new Consultas();

    $codigo_actividad = $objConsultas->obtenerCodigoActividadPorNombre($nombre_actividad);
    $codigo_plan = $objConsultas->obtenerCodigoPlanPorNombre($nombre_plan);

    if ($codigo_actividad !== false){
        $result = $objConsultas->registrarInscripcionesPersoProveedor(
            $codigo_actividad, 
            $codigo_plan, 
            $id_cliente,
            $id_entrenador,
            $fecha_inscripcion_personalizada, 
            $fecha_inicio_actividad,
            $hora_inicio_actividad, 
            $estado_inscripcion_personalizada, 
            $comentarios_inscripcion_personalizada
        );
        if ($result) {
            echo "Inscripcion registrada con exito.";
        }else{
            echo "Error al registrar la inscripcion.";
        }
    }else{
        echo "Error: No se encontro la actividad";
    }
    
?>