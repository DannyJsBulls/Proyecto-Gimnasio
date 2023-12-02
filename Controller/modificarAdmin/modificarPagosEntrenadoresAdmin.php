<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_entrenador = $_POST['id_entrenador'];
    $fecha_pago_entrenador = $_POST['fecha_pago_entrenador'];
    $hora_pago_entrenador = $_POST['hora_pago_entrenador'];
    $metodo_pago_entrenador = $_POST['metodo_pago_entrenador'];
    $precio_final_pago_entrenador = $_POST['precio_final_pago_entrenador'];
    $estado_pago_entrenador = $_POST['estado_pago_entrenador'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarPagosEntrenadoresAdmin(
        $id_entrenador, 
        $fecha_pago_entrenador, 
        $hora_pago_entrenador, 
        $metodo_pago_entrenador, 
        $precio_final_pago_entrenador, 
        $estado_pago_entrenador
    );

?>