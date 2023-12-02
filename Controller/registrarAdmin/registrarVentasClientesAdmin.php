<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_usuario = $_POST['id_usuario'];
    $direccion_residencia = $_POST['direccion_residencia'];
    $forma_entrega_pedido_cliente = $_POST['forma_entrega_pedido_cliente'];
    $fecha_entrega_pedido_cliente = $_POST['fecha_entrega_pedido_cliente'];
    $hora_entrega_pedido_cliente = $_POST['hora_entrega_pedido_cliente'];
    $metodo_pago_pedido_cliente = $_POST['metodo_pago_pedido_cliente'];
    $precio_final_venta_producto = $_POST['precio_final_venta_producto'];
    $estado_pedido_venta_producto = $_POST['estado_pedido_venta_producto'];

    $nombre_producto = $_POST['nombre_producto'];
    
    $objConsultas = new Consultas();

    $codigo_producto = $objConsultas->obtenerCodigoProductoPorNombre($nombre_producto);

    if($codigo_producto !== false){
        $result = $objConsultas->registrarVentasClientesAdmin(
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
        if($result){
            echo "Venta registrada con exito.";
        }else{
            echo "Error al registrar la venta";
        }
    }else{
        echo "Error: No se encontro el producto";
    }
?>