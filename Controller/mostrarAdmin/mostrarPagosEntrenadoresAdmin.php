<?php
    function mostrarPagosEntrenadores(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPagosEntrenadoresAdmin();

        if (!isset($result)) {
            echo '<h2>No Hay Pagos de entrenadores Registrados en el Sistema</h2>';
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
                        <td><a href="modificarPagosEntrenadores.php?id_user=' . $f['id_entrenador'] . '" class="btn btn-success"> Ver/Actualizar</a></td>
                        <td><a href="verDetallePagoEntrenador.php?id_user=' . $f['id_entrenador'] . '" class="btn btn-info"> Recibo De Pago</a></td>
                        <td><a href="../../Controller/eliminarAdmin/eliminarPagosEntrenadoresAdmin.php?id_user=' . $f['id_entrenador'] . '" class="btn btn-danger"> Eliminar <i class="icofont-ui-delete"></i></a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarPagosEntrenadores(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosEntrenadores($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarAdmin/modificarPagosEntrenadoresAdmin.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION ENTRENADOR</label>
                            <input type="number" class="form-control" placeholder="Ingrese un codigo" name="id_entrenador" required="required" readonly value="' . $f['id_entrenador'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA PAGO</label>
                            <input type="date" class="form-control" name="fecha_pago_entrenador" value="' . $f['fecha_pago_entrenador'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>HORA PAGO</label>
                            <input type="time" class="form-control" name="hora_pago_entrenador" value="' . $f['hora_pago_entrenador'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>METODO PAGO</label>
                            <select name="metodo_pago_entrenador" id="" class="form-control">
                                <option value="' . $f['metodo_pago_entrenador'] . '"> ' . $f['metodo_pago_entrenador'] . ' </option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                                <option value="Tarjeta de Debito">Tarjeta de Debito</option>
                                <option value="Transferencia desde un banco con PSE">Transferencia desde un banco con PSE</option>
                                <option value="Pago  en efectivo con Efecty">Pago  en efectivo con Efecty</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>PRECIO PAGO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un precio" name="precio_final_pago_entrenador" step="0.1" value="' . $f['precio_final_pago_entrenador'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO PAGO</label>
                            <select name="estado_pago_entrenador" id="" class="form-control">
                                <option value="' . $f['estado_pago_entrenador'] . '"> ' . $f['estado_pago_entrenador'] . ' </option>
                                <option value="Aprobado">Aprobado</option>
                                <option value="Completado">Completado</option>
                                <option value="Cancelado">Cancelado</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Pago</button>
                    </div>
                </form>
            ';
        }
    }
    function cargarPagosEntrenadoresAdmin(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPagosEntrenadoresAdmin($id_user);

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