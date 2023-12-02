<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $codigo_producto = $_POST['codigo_producto'];
    $id_usuario = $_POST['id_usuario'];
    $direccion_residencia = $_POST['direccion_residencia'];
    $forma_entrega_pedido_cliente = $_POST['forma_entrega_pedido_cliente'];
    $fecha_entrega_pedido_cliente = $_POST['fecha_entrega_pedido_cliente'];
    $hora_entrega_pedido_cliente = $_POST['hora_entrega_pedido_cliente'];
    $metodo_pago_pedido_cliente = $_POST['metodo_pago_pedido_cliente'];
    $precio_final_venta_producto = $_POST['precio_final_venta_producto'];
    $estado_pedido_venta_producto = $_POST['estado_pedido_venta_producto'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarVentasClientesAdmin(
        $codigo_producto,
        $id_usuario,  
        $direccion_residencia,
        $forma_entrega_pedido_cliente,
        $fecha_entrega_pedido_cliente, 
        $hora_entrega_pedido_cliente,
        $metodo_pago_pedido_cliente, 
        $precio_final_venta_producto,
        $estado_pedido_venta_producto
    );

?>