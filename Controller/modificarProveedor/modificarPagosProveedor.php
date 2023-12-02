<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_proveedor = $_POST['id_proveedor'];
    $fecha_entrega_pedido_proveedor = $_POST['fecha_entrega_pedido_proveedor'];
    $hora_entrega_pedido_proveedor = $_POST['hora_entrega_pedido_proveedor'];
    $estado_pedido_compra_producto = $_POST['estado_pedido_compra_producto'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarPagosProveedor(
        $id_proveedor,
        $fecha_entrega_pedido_proveedor, 
        $hora_entrega_pedido_proveedor,
        $estado_pedido_compra_producto
    );

?>