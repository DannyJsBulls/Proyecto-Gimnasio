<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $codigo_plan = $_POST['codigo_plan'];
    $id_usuario = $_POST['id_usuario'];
    $fecha_venta_plan = $_POST['fecha_venta_plan'];
    $hora_venta_plan = $_POST['hora_venta_plan'];
    $fecha_fin_plan = $_POST['fecha_fin_plan'];
    $metodo_pago_plan = $_POST['metodo_pago_plan'];
    $precio_final_venta_plan = $_POST['precio_final_venta_plan'];
    $estado_venta_plan = $_POST['estado_venta_plan'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarPagosPlanesAdmin(
        $codigo_plan, 
        $id_usuario, 
        $fecha_venta_plan, 
        $hora_venta_plan,
        $fecha_fin_plan,
        $metodo_pago_plan, 
        $precio_final_venta_plan, 
        $estado_venta_plan
    );

?>