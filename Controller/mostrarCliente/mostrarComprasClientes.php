<?php
    function mostrarComprasClientes($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarComprasClientes($id_usuario);

        if (!isset($result)) {
            echo '<h2>No Hay Pagos y Compras de Proveedores Registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td><i class="icofont-shopify"></i></td>
                        <td>' . $f['codigo_producto'] . '</td>
                        <td>' . $f['id_usuario'] . '</td>
                        <td>' . $f['direccion_residencia'] . '</td>
                        <td>' . $f['forma_entrega_pedido_cliente'] . '</td>
                        <td>' . $f['fecha_entrega_pedido_cliente'] . '</td>
                        <td>' . $f['hora_entrega_pedido_cliente'] . '</td>
                        <td>' . $f['metodo_pago_pedido_cliente'] . '</td>
                        <td>' . $f['precio_final_venta_producto'] . '</td>
                        <td>' . $f['estado_pedido_venta_producto'] . '</td>
                        <td><a href="verDetallePedidosComClientes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-warning"> Ver Pedido</a></td>
                        <td><a href="verDetalleCompraClientes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para ver la factura de pago
    function cargarComprasClientes($id_usuario){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarComprasClientes($id_usuario);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../../Views/Extras/Logos/logo-trnasparente.png" class="card-img-top imagen-logo" alt="Logo Gym">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><i class="icofont-shopify"></i> Num.Referencia Del Producto: ' . $f['codigo_producto'] . '</h5>
                                <h5 class="card-title mt-3">Identificacion Usuario: ' . $f['id_usuario'] . '</h5>
                                <p class="card-text mt-3 title-admin pago-training"> INFORMACION DEL PAGO</p>
                                <p class="card-text mt-3"> Direccion Residencia: ' . $f['direccion_residencia'] . '</p>
                                <p class="card-text mt-3"> Forma de Entrega: ' . $f['forma_entrega_pedido_cliente'] . '</p>
                                <p class="card-text mt-3"> Fecha de Entrega: ' . $f['fecha_entrega_pedido_cliente'] . '</p>
                                <p class="card-text mt-3"> Hora de Entrega: ' . $f['hora_entrega_pedido_cliente'] . '</p>
                                <p class="card-text mt-3"> Metodo de Pago: ' . $f['metodo_pago_pedido_cliente'] . '</p>
                                <p class="card-text mt-3"> Precio de la Compra: ' . $f['precio_final_venta_producto'] . '</p>
                                <p class="card-text mt-3"> Estado Pedido Compra: ' . $f['estado_pedido_venta_producto'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

    }

?>