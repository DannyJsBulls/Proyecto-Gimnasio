<?php
    function mostrarPagosPlanes(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPagosPlanesAdmin();

        if (!isset($result)) {
            echo '<h2>No Hay Pagos de planes Registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td><i class="icofont-shopify"></i></td>
                        <td>' . $f['codigo_plan'] . '</td>
                        <td>' . $f['id_usuario'] . '</td>
                        <td>' . $f['fecha_venta_plan'] . '</td>
                        <td>' . $f['hora_venta_plan'] . '</td>
                        <td>' . $f['fecha_fin_plan'] . '</td>
                        <td>' . $f['metodo_pago_plan'] . '</td>
                        <td>' . $f['precio_final_venta_plan'] . '</td>
                        <td>' . $f['estado_venta_plan'] . '</td>
                        <td><a href="modificarPagos.php?id_user=' . $f['id_usuario'] . '" class="btn btn-success"> Ver/Actualizar</a></td>
                        <td><a href="verDetallePagoPlanes.php?id_user=' . $f['id_usuario'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                        <td><a href="../../Controller/eliminarAdmin/eliminarPagosPlanesAdmin.php?id_user=' . $f['id_usuario'] . '" class="btn btn-danger"> Eliminar <i class="icofont-ui-delete"></i></a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarPagosPlanes(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosPlanes($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarAdmin/modificarPagosPlanesAdmin.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA PLAN</label>
                            <input type="number" class="form-control" placeholder="Ingrese un codigo" name="codigo_plan" required="required" readonly value="' . $f['codigo_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION USUARIO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un codigo" name="id_usuario" required="required" readonly value="' . $f['id_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA VENTA</label>
                            <input type="date" class="form-control" name="fecha_venta_plan" value="' . $f['fecha_venta_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>HORA VENTA</label>
                            <input type="time" class="form-control" name="hora_venta_plan" value="' . $f['hora_venta_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA VENCIMIENTO</label>
                            <input type="date" class="form-control" name="fecha_fin_plan" value="' . $f['fecha_fin_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>METODO PAGO</label>
                            <select name="metodo_pago_plan" id="" class="form-control">
                                <option value="' . $f['metodo_pago_plan'] . '"> ' . $f['metodo_pago_plan'] . ' </option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                                <option value="Transferencia desde un banco con PSE">Transferencia desde un banco con PSE</option>
                                <option value="Pago  en efectivo con Efecty">Pago  en efectivo con Efecty</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>PRECIO PAGO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un precio" name="precio_final_venta_plan" value="' . $f['precio_final_venta_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO VENTA</label>
                            <select name="estado_venta_plan" id="" class="form-control">
                                <option value="' . $f['estado_venta_plan'] . '"> ' . $f['estado_venta_plan'] . ' </option>
                                <option value="Comprado">Comprado</option>
                                <option value="Vencido">Vencido</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Datos</button>
                    </div>
                </form>
            ';
        }

    }
    function cargarPagosPlanesAdmin(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosPlanesAdmin($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../../Views/Extras/Logos/logo-trnasparente.png" class="card-img-top imagen-logo" alt="Logo Gym">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><i class="icofont-shopify"></i> Num.Referencia Plan: ' . $f['codigo_plan'] . '</h5>
                                <h5 class="card-title mt-3">Identificacion Usuario: ' . $f['id_usuario'] . '</h5>
                                <p class="card-text mt-3 title-admin pago-training"> INFORMACION DEL PAGO</p>
                                <p class="card-text mt-3"> Fecha Venta: ' . $f['fecha_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Hora Venta: ' . $f['hora_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Fecha Vencimiento: ' . $f['fecha_fin_plan'] . '</p>
                                <p class="card-text mt-3"> Metodo Pago: ' . $f['metodo_pago_plan'] . '</p>
                                <p class="card-text mt-3"> Precio De La Compra: ' . $f['precio_final_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Estado De La Venta: ' . $f['estado_venta_plan'] . '</p>
                                <h2 class="cta-title">Estimado administrador,</h2>
                                <p class="cta-description">Un usuario ha adquirido un plan personalizado. Por favor, ayúdelo a registrar las actividades correspondientes.</p>
                                <div class="row columna">
                                    <div class="col-lg-6">
                                        <a href="../../Administrador/crearInscripcionesPerso.php" class="btn btn-primary training plan"> ACTIVIDAD PERSONALIZADA</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="../../Administrador/crearInscripcionesLibres.php" class="btn btn-primary training plan"> ACTIVIDAD LIBRE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

    }

?>