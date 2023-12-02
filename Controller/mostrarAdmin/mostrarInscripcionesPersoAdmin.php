<?php
    function mostrarInscripcionesPerso(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarInscripcionesPersoAdmin();

        if (!isset($result)) {
            echo '<h2>No Hay Inscripciones de Actividades Registradas en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <tr>
                        <td>' . $f['codigo_actividad'] . '</td>
                        <td>' . $f['codigo_plan'] . '</td>
                        <td>' . $f['id_cliente'] . '</td>
                        <td>' . $f['id_entrenador'] . '</td>
                        <td>' . $f['fecha_inscripcion_personalizada'] . '</td>
                        <td>' . $f['fecha_inicio_actividad'] . '</td>
                        <td>' . $f['hora_inicio_actividad'] . '</td>
                        <td>' . $f['estado_inscripcion_personalizada'] . '</td>
                        <td>' . $f['comentarios_inscripcion_personalizada'] . '</td>
                        <td><a href="modificarInscripcionesPerso.php?id_user=' . $f['codigo_actividad'] . '" class="btn btn-success"> Ver/Editar</a></td>
                        <td><a href="../../Controller/eliminarAdmin/eliminarInscripcionesPersoAdmin.php?id_user=' . $f['codigo_actividad'] . '" class="btn btn-danger"> Eliminar <i class="icofont-ui-delete"></i></a></td>
                    </tr>
                ';
            }
        }

    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarInscripcionesPerso(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarInscripcionesPerso($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarAdmin/modificarInscripcionesPersoAdmin.php" method="POST">
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
                            <label>IDENTIFICACION CLIENTE</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero" name="id_cliente" required="required" readonly value="' . $f['id_cliente'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>IDENTIFICACION ENTRENADOR</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero" name="id_entrenador" required="required" readonly value="' . $f['id_entrenador'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA INSCRIPCION</label>
                            <input type="date" class="form-control" name="fecha_inscripcion_personalizada" value="' . $f['fecha_inscripcion_personalizada'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FECHA PROGRAMADA PARA LA ACTIVIDAD</label>
                            <input type="date" class="form-control" name="fecha_inicio_actividad" value="' . $f['fecha_inicio_actividad'] . '">
                        </div>
                        <div class="form-group  col-lg-4 col-md-6">
                            <label>HORA PROGRAMADA PARA LA ACTIVIDAD</label>
                            <input type="time" class="form-control" placeholder="Ingrese la hora" name="hora_inicio_actividad" value="' . $f['hora_inicio_actividad'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>ESTADO INSCRIPCION</label>
                            <select name="estado_inscripcion_personalizada" id="" class="form-control">
                                <option value="' . $f['estado_inscripcion_personalizada'] . '"> ' . $f['estado_inscripcion_personalizada'] . '</option>
                                <option value="Programada">Programada</option>
                                <option value="Asistio">Asistio</option>
                                <option value="No Asistio">No Asistio</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>COMENTARIOS</label>
                            <input type="textarea" class="form-control" placeholder="Ingrese una Observacion" name="comentarios_inscripcion_personalizada" value="' . $f['comentarios_inscripcion_personalizada'] . '">
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Datos</button>
                    </div>
                </form>
            ';
        }

    }

?>