<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_cliente = $_POST['id_cliente'];
    $id_entrenador = $_POST['id_entrenador'];
    $fecha_actividad_estadistica_personalizada = $_POST['fecha_actividad_estadistica_personalizada'];
    $duracion_actividad_estadistica_personalizada = $_POST['duracion_actividad_estadistica_personalizada'];
    $repeticiones_actividad_estadistica_personalizada = $_POST['repeticiones_actividad_estadistica_personalizada'];
    $peso_levantado_estadistica_personalizada = $_POST['peso_levantado_estadistica_personalizada'];
    $distancia_recorrida_estadistica_personalizada = $_POST['distancia_recorrida_estadistica_personalizada'];
    $velocidad_promedio_estadistica_personalizada = $_POST['velocidad_promedio_estadistica_personalizada'];
    $calorias_quemadas_estadistica_personalizada = $_POST['calorias_quemadas_estadistica_personalizada'];
    $nivel_esfuerzo_estadistica_personalizada = $_POST['nivel_esfuerzo_estadistica_personalizada'];
    $tipo_ejercicio_estadistica_personalizada = $_POST['tipo_ejercicio_estadistica_personalizada'];
    $zona_frecuencia_cardiaca_estadistica_perso = $_POST['zona_frecuencia_cardiaca_estadistica_perso'];
    $maximo_esfuerzo_estadistica_personalizada = $_POST['maximo_esfuerzo_estadistica_personalizada'];
    $dificultad_actividad_estadistica_personalizada = $_POST['dificultad_actividad_estadistica_personalizada'];
    $descanso_entre_series_estadistica_perso = $_POST['descanso_entre_series_estadistica_perso'];

    $nombre_actividad = $_POST['nombre_actividad'];

    $objConsultas = new Consultas();

    $codigo_actividad = $objConsultas->obtenerCodigoActividadPorNombre($nombre_actividad);

    if($codigo_actividad !== false){
        $result = $objConsultas->registrarEstadisticasPersonalizadasAdmin(
            $id_cliente,
            $id_entrenador, 
            $codigo_actividad, 
            $fecha_actividad_estadistica_personalizada, 
            $duracion_actividad_estadistica_personalizada, 
            $repeticiones_actividad_estadistica_personalizada, 
            $peso_levantado_estadistica_personalizada, 
            $distancia_recorrida_estadistica_personalizada, 
            $velocidad_promedio_estadistica_personalizada, 
            $calorias_quemadas_estadistica_personalizada, 
            $nivel_esfuerzo_estadistica_personalizada, 
            $tipo_ejercicio_estadistica_personalizada, 
            $zona_frecuencia_cardiaca_estadistica_perso, 
            $maximo_esfuerzo_estadistica_personalizada, 
            $dificultad_actividad_estadistica_personalizada, 
            $descanso_entre_series_estadistica_perso
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