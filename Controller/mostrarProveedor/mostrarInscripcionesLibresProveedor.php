<?php
    function mostrarInscripcionesLibresProveedor($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarInscripcionesLibresProveedor($id_usuario);

        if (!isset($result)) {
            echo '<h2>No Hay Actividades Registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td>' . $f['codigo_actividad'] . '</td>
                        <td>' . $f['codigo_plan'] . '</td>
                        <td>' . $f['id_usuario'] . '</td>
                        <td>' . $f['fecha_inscripcion_libre'] . '</td>
                        <td>' . $f['fecha_inicio_actividad'] . '</td>
                        <td>' . $f['hora_inicio_actividad'] . '</td>
                        <td>' . $f['estado_inscripcion_libre'] . '</td>
                        <td>' . $f['comentarios_inscripcion_libre'] . '</td>
                        <!--<td><a href="modificarInscripcionesLibresProveedor.php?id_user=' . $f['codigo_actividad'] . '" class="btn btn-success"> Ver Detalle</a></td>-->
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarInscripcionesLibresProveedor($id_usuario){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarInscripcionesLibresProveedor($id_usuario);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarInscripcionesLibresProveedor.php" method="POST">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA ACTIVIDAD LIBRE</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero" name="codigo_actividad" required="required" readonly value="' . $f['codigo_actividad'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUM.REFERENCIA PLAN</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero" name="codigo_plan" required="required" readonly value="' . $f['codigo_plan'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION USUARIO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero" name="id_usuario" required="required" readonly value="' . $f['id_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NOMBRE ACTIVIDAD</label>
                            <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre_actividad_libre" value="' . $f['nombre_actividad_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA INSCRIPCION</label>
                            <input type="date" class="form-control" name="fecha_inscripcion_libre" value="' . $f['fecha_inscripcion_libre'] . '">
                        </div>
                        <div class="form-group  col-lg-4 col-md-6">
                            <label>HORA INSCRIPCION</label>
                            <input type="time" class="form-control" placeholder="Ingrese la hora" name="hora_inscripcion_libre" value="' . $f['hora_inscripcion_libre'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA DE INICIO ACTIVIDAD</label>
                            <input type="date" class="form-control" name="fecha_inicio_actividad" value="' . $f['fecha_inicio_actividad'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO INSCRIPCION</label>
                            <select name="estado_inscripcion_libre" id="" class="form-control">
                                <option value="' . $f['estado_inscripcion_libre'] . '"> ' . $f['estado_inscripcion_libre'] . '</option>
                                <option value="Activa">Activa</option>
                                <option value="Inactiva">Inactiva</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>COMENTARIOS</label>
                            <input type="textarea" class="form-control" placeholder="Ingrese una Observacion" name="comentarios_inscripcion_libre" value="' . $f['comentarios_inscripcion_libre'] . '">
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Datos</button>
                    </div>
                </form>
            ';
        }

    }

?>