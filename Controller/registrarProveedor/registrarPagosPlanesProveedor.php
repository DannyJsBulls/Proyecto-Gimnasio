<?php 
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");

    $id_usuario = $_POST['id_usuario'];
    $fecha_venta_plan = $_POST['fecha_venta_plan'];
    $hora_venta_plan = $_POST['hora_venta_plan'];
    $fecha_fin_plan = $_POST['fecha_fin_plan'];
    $metodo_pago_plan = $_POST['metodo_pago_plan'];
    $precio_final_venta_plan = $_POST['precio_final_venta_plan'];
    $estado_venta_plan = 'Comprado';

    $nombre_plan = $_POST['nombre_plan'];
    
    $objConsultas = new Consultas();

    $codigo_plan = $objConsultas->obtenerCodigoPlanPorNombrePago($nombre_plan);

    if ($codigo_plan !== false){
        $result = $objConsultas->registrarPagosPlanesProveedor(
            $codigo_plan, 
            $id_usuario, 
            $fecha_venta_plan, 
            $hora_venta_plan,
            $fecha_fin_plan,
            $metodo_pago_plan, 
            $precio_final_venta_plan, 
            $estado_venta_plan
        );
        if ($result) {
            echo "Pago registrado con exito.";
        }else{
            echo "Error al registrar el pago";
        }
    }else{
        echo "Error: No se encontro el plan";
    }
   
?>