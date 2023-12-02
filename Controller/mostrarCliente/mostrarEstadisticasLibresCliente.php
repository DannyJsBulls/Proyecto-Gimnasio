<?php
    function mostrarEstadisticasLibresCliente($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarEstadisticasLibresCliente($id_usuario);

        if (!isset($result)) {
            echo '<h2>No Tienes Estadisticas de actividades libres registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td>' . $f['id_usuario'] . '</td>
                        <td>' . $f['codigo_actividad'] . '</td>
                        <td>' . $f['fecha_actividad_estadistica_libre'] . '</td>
                        <td>' . $f['duracion_actividad_estadistica_libre'] . '</td>
                        <td>' . $f['repeticiones_actividad_estadistica_libre'] . '</td>
                        <td>' . $f['peso_levantado_estadistica_libre'] . '</td>
                        <td>' . $f['distancia_recorrida_estadistica_libre'] . '</td>
                        <td>' . $f['velocidad_promedio_estadistica_libre'] . '</td>
                        <td>' . $f['calorias_quemadas_estadistica_libre'] . '</td>
                        <td>' . $f['nivel_esfuerzo_estadistica_libre'] . '</td>
                        <td>' . $f['tipo_ejercicio_estadistica_libre'] . '</td>
                        <td>' . $f['zona_frecuencia_cardiaca_estadistica_libre'] . '</td>
                        <td>' . $f['maximo_esfuerzo_estadistica_libre'] . '</td>
                        <td>' . $f['dificultad_actividad_estadistica_libre'] . '</td>
                        <td>' . $f['descanso_entre_series_estadistica_libre'] . '</td>
                        <!--<td><a href="modificarEstadisticasLibres.php?id_user=' . $f['id_usuario'] . '" class="btn btn-success"> Ver Detalle</a></td>-->
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarEstadisticasLibresCliente($id_usuario){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarEstadisticasLibresCliente($id_usuario);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarEstadisticasLibresCliente.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION USUARIO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero de id" name="id_usuario" required="required" readonly value="' . $f['id_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA ACTIVIDAD</label>
                            <input type="number" class="form-control" placeholder="Ingrese un codigo de actividad" name="codigo_actividad" required="required" readonly value="' . $f['codigo_actividad'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA ACTIVIDAD</label>
                            <input type="date" class="form-control" placeholder="Ingrese la fecha de la actividad" name="fecha_actividad_estadistica_libre" value="' . $f['fecha_actividad_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>DURACION ACTIVIDAD</label>
                            <input type="text" class="form-control" placeholder="Ingrese la duracion de la actividad" name="duracion_actividad_estadistica_libre" value="' . $f['duracion_actividad_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>REPETICIONES ACTIVIDAD</label>
                            <input type="number" class="form-control" placeholder="Ingrese cuantas repeticiones se establecieron" name="repeticiones_actividad_estadistica_libre" value="' . $f['repeticiones_actividad_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>PESO LEVANTADO</label>
                            <input type="number" class="form-control" placeholder="Ingrese el peso levantado" name="peso_levantado_estadistica_libre" value="' . $f['peso_levantado_estadistica_libre'] . '" step="0.1">
                        </div>
                        <div class="form-group  col-lg-4 col-md-6">
                            <label>DISTANCIA RECORRIDA</label>
                            <input type="number" class="form-control" placeholder="Ingrese la distancia recorrida" name="distancia_recorrida_estadistica_libre" value="' . $f['distancia_recorrida_estadistica_libre'] . '" step="0.1">
                        </div>
                        <div class="form-group  col-lg-4 col-md-6">
                            <label>VELOCIDAD PROMEDIO</label>
                            <input type="number" class="form-control" placeholder="Ingrese la velocidad promedio" name="velocidad_promedio_estadistica_libre" value="' . $f['velocidad_promedio_estadistica_libre'] . '" step="0.1">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>CALORIAS QUEMADAS</label>
                            <input type="number" class="form-control" placeholder="Ingrese las calorias quemadas" name="calorias_quemadas_estadistica_libre" value="' . $f['calorias_quemadas_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NIVEL ESFUERZO</label>
                            <input type="number" class="form-control" placeholder="Ingrese el nivel de esfuerzo" name="nivel_esfuerzo_estadistica_libre" value="' . $f['nivel_esfuerzo_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>TIPO DE EJERCICIO</label>
                            <input type="text" class="form-control" placeholder="Ingrese el tipo de jercicio" name="tipo_ejercicio_estadistica_libre" value="' . $f['tipo_ejercicio_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ZONA FRECUENCIA CARDIACA</label>
                            <input type="text" class="form-control" placeholder="Ingrese la zona de la frecuencia cardiaca" name="zona_frecuencia_cardiaca_estadistica_libre" value="' . $f['zona_frecuencia_cardiaca_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>MAXIMO ESFUERZO</label>
                            <select name="maximo_esfuerzo_estadistica_libre" id="" class="form-control">
                                <option value="' . $f['maximo_esfuerzo_estadistica_libre'] . '"> ' . $f['maximo_esfuerzo_estadistica_libre'] . ' </option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>DIFICULTAD ACTIVIDAD</label>
                            <input type="number" class="form-control" placeholder="Ingrese la dificultad de la actividad" name="dificultad_actividad_estadistica_libre" value="' . $f['dificultad_actividad_estadistica_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>DESCANSO ENTRE SERIES</label>
                            <input type="text" class="form-control" placeholder="Ingrese el descanso entre series" name="descanso_entre_series_estadistica_libre" value="' . $f['descanso_entre_series_estadistica_libre'] . '">
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Datos</button>
                    </div>
                </form>
            ';
        }

    }

?>