<?php
    function mostrarMisPagosEntrenadores($id_entrenador){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarMisPagosEntrenador($id_entrenador);

        if (!isset($result)) {
            echo '<h2>No Hay Pagos Registrados en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td><i class="icofont-pay"></i></td>
                        <td>' . $f['id_entrenador'] . '</td>
                        <td>' . $f['fecha_pago_entrenador'] . '</td>
                        <td>' . $f['hora_pago_entrenador'] . '</td>
                        <td>' . $f['metodo_pago_entrenador'] . '</td>
                        <td>' . $f['precio_final_pago_entrenador'] . '</td>
                        <td>' . $f['estado_pago_entrenador'] . '</td>
                        <td><a href="verMiDetallePagoEntrenador.php?id_user=' . $f['id_entrenador'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                    </tr>
                ';
            }
        }

    }
    function cargarMisPagosEntrenadores(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarMisPagosEntrenadores($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../../Views/Extras/Logos/logo-trnasparente.png" class="card-img-top imagen-logo" alt="Logo Gym">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><i class="icofont-pay"></i> Identificacion Entrenador: ' . $f['id_entrenador'] . '</h5>
                                <p class="card-text mt-3 title-admin pago-training"> INFORMACION DEL PAGO</p>
                                <p class="card-text mt-3"> Fecha del Pago: ' . $f['fecha_pago_entrenador'] . '</p>
                                <p class="card-text mt-3"> Hora del Pago: ' . $f['hora_pago_entrenador'] . '</p>
                                <p class="card-text mt-3"> Metodo de Pago: ' . $f['metodo_pago_entrenador'] . '</p>
                                <p class="card-text mt-3"> Precio del Pago: ' . $f['precio_final_pago_entrenador'] . '</p>
                                <p class="card-text mt-3"> Estado del Pago : ' . $f['estado_pago_entrenador'] . '</p>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

    }

?>