<?php
    function mostrarVentasClientes(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarVentasClientesAdmin();

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
                        <td><a href="modificarVentasClientes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-success"> Ver/Actualizar</a></td>
                        <td><a href="verDetallePedidosClientes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-warning"> Ver Pedido</a></td>
                        <td><a href="verDetalleVentasClientes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                        <td><a href="../../Controller/eliminarAdmin/eliminarVentasClientesAdmin.php?id_user=' . $f['id_usuario'] . '" class="btn btn-danger"> Eliminar <i class="icofont-ui-delete"></i></a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarVentasClientes(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarVentasClientes($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarAdmin/modificarVentasClientesAdmin.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA PRODUCTO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un n.referencia de producto" name="codigo_producto" required="required" readonly value="' . $f['codigo_producto'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION USUARIO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un id de proveedor" name="id_usuario" required="required" readonly value="' . $f['id_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>DIRECCION RESIDENCIA</label>
                            <input type="text" class="form-control" placeholder="Ingrese una direccion" name="direccion_residencia" value="' . $f['direccion_residencia'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FORMA DE ENTREGA</label>
                            <select name="forma_entrega_pedido_cliente" id="" class="form-control">
                                <option value="' . $f['forma_entrega_pedido_cliente'] . '"> ' . $f['forma_entrega_pedido_cliente'] . ' </option>
                                <option value="Enviar direccion gimnasio">Enviar direccion gimnasio</option>
                                <option value="Retirar en punto de entrega">Retirar en punto de entrega</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA ENTREGA PEDIDO</label>
                            <input type="date" class="form-control" name="fecha_entrega_pedido_cliente" value="' . $f['fecha_entrega_pedido_cliente'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>HORA ENTREGA PEDIDO</label>
                            <input type="time" class="form-control" name="hora_entrega_pedido_cliente" value="' . $f['hora_entrega_pedido_cliente'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>METODO PAGO</label>
                            <select name="metodo_pago_pedido_cliente" required="required" readonly id="" class="form-control">
                                <option value="' . $f['metodo_pago_pedido_cliente'] . '"> ' . $f['metodo_pago_pedido_cliente'] . ' </option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                                <option value="Transferencia desde un banco con PSE">Transferencia desde un banco con PSE</option>
                                <option value="Pago  en efectivo con Efecty">Pago  en efectivo con Efecty</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>PRECIO VENTA</label>
                            <input type="number" class="form-control" placeholder="Ingrese un precio" name="precio_final_venta_producto" value="' . $f['precio_final_venta_producto'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO VENTA PEDIDO</label>
                            <select name="estado_pedido_venta_producto" id="" class="form-control">
                                <option value="' . $f['estado_pedido_venta_producto'] . '"> ' . $f['estado_pedido_venta_producto'] . ' </option>
                                <option value="Comprado">Comprado</option>
                                <option value="Enviado">Enviado</option>
                                <option value="Entregado">Entregado</option>
                                <option value="Devuelto">Devuelto</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Venta</button>
                    </div>
                </form>
            ';
        }

    }

    function cargarVentasProductosAdmin(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarVentasProductosAdmin($id_user);

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