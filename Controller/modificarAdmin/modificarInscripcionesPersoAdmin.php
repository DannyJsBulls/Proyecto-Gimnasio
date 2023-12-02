<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $codigo_actividad = $_POST['codigo_actividad']; 
    $codigo_plan = $_POST['codigo_plan'];
    $id_cliente = $_POST['id_cliente'];
    $id_entrenador = $_POST['id_entrenador'];
    $fecha_inscripcion_personalizada = $_POST['fecha_inscripcion_personalizada'];
    $fecha_inicio_actividad = $_POST['fecha_inicio_actividad'];  
    $hora_inicio_actividad = $_POST['hora_inicio_actividad']; 
    $estado_inscripcion_personalizada = $_POST['estado_inscripcion_personalizada'];
    $comentarios_inscripcion_personalizada = $_POST['comentarios_inscripcion_personalizada'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarInscripcionesPersoAdmin(
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

?>