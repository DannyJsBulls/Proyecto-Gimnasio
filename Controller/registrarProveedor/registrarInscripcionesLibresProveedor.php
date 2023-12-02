<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_usuario = $_POST['id_usuario'];
    $fecha_inscripcion_libre = $_POST['fecha_inscripcion_libre'];
    $fecha_inicio_actividad = $_POST['fecha_inicio_actividad'];
    $hora_inicio_actividad = $_POST['hora_inicio_actividad']; 
    $estado_inscripcion_libre = 'Programada';
    $comentarios_inscripcion_libre = $_POST['comentarios_inscripcion_libre'];
    // Este campo no esta en la tabla pero se necesita para poder registrar mediante el codigo del plan 
    $nombre_plan = $_POST['nombre_plan'];
    $nombre_actividad = $_POST['nombre_actividad'];

    $objConsultas = new Consultas();

    $codigo_actividad = $objConsultas->obtenerCodigoActividadPorNombre($nombre_actividad);
    $codigo_plan = $objConsultas->obtenerCodigoPlanPorNombre($nombre_plan);

    if ($codigo_actividad !== false) {
        $result = $objConsultas->registrarInscripcionesLibresProveedor(
            $codigo_actividad, 
            $codigo_plan, 
            $id_usuario, 
            $fecha_inscripcion_libre,
            $fecha_inicio_actividad,
            $hora_inicio_actividad, 
            $estado_inscripcion_libre, 
            $comentarios_inscripcion_libre
        );
        if ($result) {
            echo "Inscripcion registrada con exito.";
        }else{
            echo "error al registrar la inscripcion";
        }
    }else{
        echo "error: No se encontro la actividad";
    }
?>