<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_usuario = $_POST['id_usuario'];
    $codigo_actividad = $_POST['codigo_actividad'];
    $fecha_actividad_estadistica_libre = $_POST['fecha_actividad_estadistica_libre'];
    $duracion_actividad_estadistica_libre = $_POST['duracion_actividad_estadistica_libre'];
    $repeticiones_actividad_estadistica_libre = $_POST['repeticiones_actividad_estadistica_libre'];
    $peso_levantado_estadistica_libre = $_POST['peso_levantado_estadistica_libre'];
    $distancia_recorrida_estadistica_libre = $_POST['distancia_recorrida_estadistica_libre'];
    $velocidad_promedio_estadistica_libre = $_POST['velocidad_promedio_estadistica_libre'];
    $calorias_quemadas_estadistica_libre = $_POST['calorias_quemadas_estadistica_libre'];
    $nivel_esfuerzo_estadistica_libre = $_POST['nivel_esfuerzo_estadistica_libre'];
    $tipo_ejercicio_estadistica_libre = $_POST['tipo_ejercicio_estadistica_libre'];
    $zona_frecuencia_cardiaca_estadistica_libre = $_POST['zona_frecuencia_cardiaca_estadistica_libre'];
    $maximo_esfuerzo_estadistica_libre = $_POST['maximo_esfuerzo_estadistica_libre'];
    $dificultad_actividad_estadistica_libre = $_POST['dificultad_actividad_estadistica_libre'];
    $descanso_entre_series_estadistica_libre = $_POST['descanso_entre_series_estadistica_libre'];

    $nombre_actividad = $_POST['nombre_actividad'];

    $objConsultas = new Consultas();

    $codigo_actividad = $objConsultas->obtenerCodigoActividadPorNombre($nombre_actividad);

    if($codigo_actividad !== false){
        $result = $objConsultas->registrarEstadisticasLibresCliente(
            $id_usuario, 
            $codigo_actividad, 
            $fecha_actividad_estadistica_libre, 
            $duracion_actividad_estadistica_libre, 
            $repeticiones_actividad_estadistica_libre, 
            $peso_levantado_estadistica_libre, 
            $distancia_recorrida_estadistica_libre, 
            $velocidad_promedio_estadistica_libre, 
            $calorias_quemadas_estadistica_libre, 
            $nivel_esfuerzo_estadistica_libre, 
            $tipo_ejercicio_estadistica_libre, 
            $zona_frecuencia_cardiaca_estadistica_libre, 
            $maximo_esfuerzo_estadistica_libre, 
            $dificultad_actividad_estadistica_libre, 
            $descanso_entre_series_estadistica_libre
        );
        if ($result) {
            echo "Estadistica registrada con exito.";
        }else{
            echo "error al registrar la estadistica";
        }
    }else{
        echo "error: No se encontro la actividad";
    }
    
?>