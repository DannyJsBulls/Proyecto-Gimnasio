<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $codigo_actividad = $_POST['codigo_actividad']; 
    $codigo_plan = $_POST['codigo_plan'];
    $id_usuario = $_POST['id_usuario'];
    $fecha_inscripcion_libre = $_POST['fecha_inscripcion_libre'];
    $fecha_inicio_actividad = $_POST['fecha_inicio_actividad'];
    $hora_inicio_actividad = $_POST['hora_inicio_actividad']; 
    $estado_inscripcion_libre = $_POST['estado_inscripcion_libre'];
    $comentarios_inscripcion_libre = $_POST['comentarios_inscripcion_libre'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarInscripcionesLibresAdmin(
        $codigo_actividad, 
        $codigo_plan, 
        $id_usuario, 
        $fecha_inscripcion_libre,
        $fecha_inicio_actividad,
        $hora_inicio_actividad, 
        $estado_inscripcion_libre, 
        $comentarios_inscripcion_libre
    );

?>