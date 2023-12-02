<?php
    function mostrarPagosProveedores($id_proveedor){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPagosProveedores($id_proveedor);

        if (!isset($result)) {
            echo '<h2>No Hay Pagos y Compras de Proveedores Registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td><i class="icofont-shopify"></i></td>
                        <td>' . $f['codigo_producto'] . '</td>
                        <td>' . $f['id_proveedor'] . '</td>
                        <td>' . $f['direccion_gimnasio'] . '</td>
                        <td>' . $f['forma_entrega_pedido_proveedor'] . '</td>
                        <td>' . $f['fecha_entrega_pedido_proveedor'] . '</td>
                        <td>' . $f['hora_entrega_pedido_proveedor'] . '</td>
                        <td>' . $f['metodo_pago_pedido_proveedor'] . '</td>
                        <td>' . $f['precio_final_compra_producto'] . '</td>
                        <td>' . $f['estado_pedido_compra_producto'] . '</td>
                        <td><a href="modificarPagoProvee.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-success"> Actualizar Estado</a></td>
                        <td><a href="verDetallePedidosComProveedores.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-warning"> Ver Pedido</a></td>
                        <td><a href="verDetallePagoProveedores.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                    </tr>
                ';
            }
        }

    }
        // Funcion para mostrar la info del usuario a modificar en un formulario
        function cargarPagosProvee(){
            $id_user = $_GET['id_user'];
    
            $objConsultas = new Consultas();
            $result = $objConsultas->buscarPagosProvee($id_user);
    
            foreach ($result as $f) {
                echo '
                    <form action="../../Controller/modificarProveedor/modificarPagosProveedor.php" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-4 col-md-6">
                                <label>IDENTIFICACION PROVEEDOR</label>
                                <input type="number" class="form-control" placeholder="Ingrese un id de proveedor" name="id_proveedor" required="required" readonly value="' . $f['id_proveedor'] . '">
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label>FECHA ENTREGA PEDIDO</label>
                                <input type="date" class="form-control" name="fecha_entrega_pedido_proveedor" value="' . $f['fecha_entrega_pedido_proveedor'] . '">
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label>HORA ENTREGA PEDIDO</label>
                                <input type="time" class="form-control" name="hora_entrega_pedido_proveedor" value="' . $f['hora_entrega_pedido_proveedor'] . '">
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label>ESTADO COMPRA PEDIDO</label>
                                <select name="estado_pedido_compra_producto" id="" class="form-control">
                                    <option value="' . $f['estado_pedido_compra_producto'] . '"> ' . $f['estado_pedido_compra_producto'] . ' </option>
                                    <option value="Comprado">Comprado</option>
                                    <option value="Enviado">Enviado</option>
                                    <option value="Cancelado">Cancelado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Modificar Pedido</button>
                        </div>
                    </form>
                ';
            }
        }
    // Funcion para ver la factura de pago
    function cargarPagosProveedores($id_proveedor){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosProveedores($id_proveedor);

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
                                <h5 class="card-title mt-3">Numero Id Usuario: ' . $f['id_proveedor'] . '</h5>
                                <p class="card-text mt-3 title-admin pago-training"> INFORMACION DEL PAGO</p>
                                <p class="card-text mt-3"> Direccion gimnasio: ' . $f['direccion_gimnasio'] . '</p>
                                <p class="card-text mt-3"> Forma de Entrega: ' . $f['forma_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Fecha de Entrega: ' . $f['fecha_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Hora de Entrega: ' . $f['hora_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Metodo de Pago: ' . $f['metodo_pago_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Precio de la Compra: ' . $f['precio_final_compra_producto'] . '</p>
                                <p class="card-text mt-3"> Estado Pedido Compra: ' . $f['estado_pedido_compra_producto'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

    }

?>