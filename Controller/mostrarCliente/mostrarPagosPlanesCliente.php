<?php
    function mostrarPagosPlanesCliente($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPagosPlanesCliente($id_usuario);

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
                        <td><a href="verDetallePago.php?id_user=' . $f['codigo_plan'] . '" class="btn btn-info"> Recibo de Pago</a></td>
                    </tr>
                ';
            }
        }
    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarPagosPlanesCliente($id_usuario){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosPlanesCliente($id_usuario);

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
                                <p class="card-text mt-3"> Fecha de Pago: ' . $f['fecha_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Hora de Pago: ' . $f['hora_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Fecha Finalizacion del Plan: ' . $f['fecha_fin_plan'] . '</p>
                                <p class="card-text mt-3"> Metodo de Pago: ' . $f['metodo_pago_plan'] . '</p>
                                <p class="card-text mt-3"> Precio del Pago: ' . $f['precio_final_venta_plan'] . '</p>
                                <p class="card-text mt-3"> Estado del Pago: ' . $f['estado_venta_plan'] . '</p>
                                <h2 class="cta-title">¡Disfruta de tu plan personalizado al máximo!</h2>
                                <p class="cta-description">Inscribe tu actividad ahora mismo y descubre un mundo de posibilidades.</p>
                                <div class="row columna">
                                    <div class="col-lg-6">
                                        <a href="../Clientes/crearInscripcionesPersoCliente.php" class="btn btn-primary training plan"> ACTIVIDAD PERSONALIZADA</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="../Clientes/crearInscripcionesLibresCliente.php" class="btn btn-primary training plan"> ACTIVIDAD LIBRE</a>
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