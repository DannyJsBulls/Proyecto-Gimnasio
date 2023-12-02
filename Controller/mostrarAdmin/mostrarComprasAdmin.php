<?php
    function mostrarCompras(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarComprasAdmin();

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
                        <td>' . $f['cantidad_productos_compra'] . '</td>
                        <td>' . $f['precio_final_compra_producto'] . '</td>
                        <td>' . $f['estado_pedido_compra_producto'] . '</td>
                        <td><a href="modificarCompras.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-success"> Ver/Actualizar</a></td>
                        <td><a href="verDetallePedidosProveedores.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-warning"> Ver Pedido</a></td>
                        <td><a href="verDetalleComprasProveedor.php?id_user=' . $f['id_proveedor'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                        <td><a href="../../Controller/eliminarAdmin/eliminarComprasAdmin.php?id_user=' . $f['codigo_producto'] . '" class="btn btn-danger"> Eliminar <i class="icofont-ui-delete"></i></a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarCompras(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarCompras($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarAdmin/modificarComprasAdmin.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA PRODUCTO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un n.referencia de producto" name="codigo_producto" required="required" readonly value="' . $f['codigo_producto'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION PROVEEDOR</label>
                            <input type="number" class="form-control" placeholder="Ingrese un id de proveedor" name="id_proveedor" required="required" readonly value="' . $f['id_proveedor'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>DIRECCION GIMNASIO</label>
                            <input type="text" class="form-control" placeholder="Ingrese una direccion" name="direccion_gimnasio" value="' . $f['direccion_gimnasio'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FORMA DE ENTREGA</label>
                            <select name="forma_entrega_pedido_proveedor" id="" class="form-control">
                                <option value="' . $f['forma_entrega_pedido_proveedor'] . '"> ' . $f['forma_entrega_pedido_proveedor'] . ' </option>
                                <option value="Enviar direccion gimnasio">Enviar direccion gimnasio</option>
                                <option value="Retirar en punto de entrega">Retirar en punto de entrega</option>
                            </select>
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
                            <label>METODO PAGO</label>
                            <select name="metodo_pago_pedido_proveedor" required="required" readonly id="" class="form-control">
                                <option value="' . $f['metodo_pago_pedido_proveedor'] . '"> ' . $f['metodo_pago_pedido_proveedor'] . ' </option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                                <option value="Transferencia desde un banco con PSE">Transferencia desde un banco con PSE</option>
                                <option value="Pago  en efectivo con Efecty">Pago  en efectivo con Efecty</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>CANTIDAD PRODUCTOS</label>
                            <input type="number" class="form-control" placeholder="Ingrese una cantidad" name="cantidad_productos_compra" value="' . $f['cantidad_productos_compra'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>PRECIO COMPRA</label>
                            <input type="number" class="form-control" placeholder="Ingrese un precio" name="precio_final_compra_producto" value="' . $f['precio_final_compra_producto'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO COMPRA PEDIDO</label>
                            <select name="estado_pedido_compra_producto" id="" class="form-control">
                                <option value="' . $f['estado_pedido_compra_producto'] . '"> ' . $f['estado_pedido_compra_producto'] . ' </option>
                                <option value="Comprado">Comprado</option>
                                <option value="Enviado">Enviado</option>
                                <option value="Entregado">Entregado</option>
                                <option value="Devuelto">Devuelto</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Compra</button>
                    </div>
                </form>
            ';
        }

    }

    function cargarPagosProductosProveedores(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosProductosProveedores($id_user);

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
                                <h5 class="card-title mt-3">Identificacion Proveedor: ' . $f['id_proveedor'] . '</h5>
                                <p class="card-text mt-3 title-admin pago-training"> INFORMACION DEL PAGO</p>
                                <p class="card-text mt-3"> Direccion Gimansio: ' . $f['direccion_gimnasio'] . '</p>
                                <p class="card-text mt-3"> Forma de Entrega: ' . $f['forma_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Fecha de Entrega: ' . $f['fecha_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Hora de Entrega: ' . $f['hora_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Metodo de Pago: ' . $f['metodo_pago_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Cantidad de Productos: ' . $f['cantidad_productos_compra'] . '</p>
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