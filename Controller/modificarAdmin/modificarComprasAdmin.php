<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $codigo_producto = $_POST['codigo_producto'];
    $id_proveedor = $_POST['id_proveedor'];
    $direccion_gimnasio = $_POST['direccion_gimnasio'];
    $forma_entrega_pedido_proveedor = $_POST['forma_entrega_pedido_proveedor'];
    $fecha_entrega_pedido_proveedor = $_POST['fecha_entrega_pedido_proveedor'];
    $hora_entrega_pedido_proveedor = $_POST['hora_entrega_pedido_proveedor'];
    $metodo_pago_pedido_proveedor = $_POST['metodo_pago_pedido_proveedor'];
    $cantidad_productos_compra = $_POST['cantidad_productos_compra'];
    $precio_final_compra_producto = $_POST['precio_final_compra_producto'];
    $estado_pedido_compra_producto = $_POST['estado_pedido_compra_producto'];
    
    $objConsultas = new Consultas();
    $result = $objConsultas->modificarComprasAdmin(
        $codigo_producto,
        $id_proveedor,  
        $direccion_gimnasio,
        $forma_entrega_pedido_proveedor,
        $fecha_entrega_pedido_proveedor, 
        $hora_entrega_pedido_proveedor,
        $metodo_pago_pedido_proveedor, 
        $cantidad_productos_compra,
        $precio_final_compra_producto,
        $estado_pedido_compra_producto
    );

?>