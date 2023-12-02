<?php
    function mostrarEntrenadorAdmin(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarEntrenadorAdmin();

        if (!isset($result)) {
            echo '<h2>No Hay Entrenadores Registrados en el Sistema</h2>';
        }else {
            echo '<div class="row">';
            foreach ($result as $f) {
                echo '
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="training"">
                            <div class="body">
                                <img src="' . $f['foto_usuario'] . '" class="card-img-top imagen-entrenador" alt="...">
                                <h5 class="card-title-entrenador">Entrenador Profesional</h5>
                                <article class="body-training">
                                    <p class="card-text-entrenador mt-3"> Identificacion: ' . $f['id_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Nombre: ' . $f['nombres_usuario'] . ' ' . $f['apellidos_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Email: ' . $f['email_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Telefono: ' . $f['telefono_usuario'] . '</p>
                                <article>
                                <div class="row">
                                    <a href="verDetalleEntrenadorAdmin.php?id_user=' . $f['id_usuario'] . '" class="btn btn-primary boton">Ver Perfil</a>
                                    <a href="../Administrador/crearInscripcionesPerso.php" class="btn btn-danger plan">Asignar Actividad</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo '</div>';
        }
    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarEntrenadorAdmin(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarEntrenadorAdmin($id_user);

        foreach ($result as $f) {
            echo '
                    <div class="card-entrenador">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="' . $f['foto_usuario'] . '" class="card-img-top imagen-ancho-completo" alt="Foto de usuario">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <p class="training">Me complace presentar a nuestro equipo de entrenadores en el gimnasio, listos para ser asignados a las actividades. Desde entrenamientos personalizados hasta clases grupales emocionantes, estamos preparados para ayudar a nuestros miembros a alcanzar sus objetivos de fitness.<br><br>Por favor, indique las tareas y actividades a las que debemos asignar a cada entrenador para comenzar a optimizar nuestro rendimiento.</p>
                                    <h5 class="card-title mt-3 entrenador-title">ENTRENADOR PROFESIONAL</h5>
                                    <h5 class="card-title mt-3">' . $f['nombres_usuario'] . '</h5>
                                    <h5 class="card-title mt-3">' . $f['apellidos_usuario'] . '</h5>
                                    <p class="card-text mt-3 admin-rol">' . $f['rol_usuario'] . '</p>
                                    <p class="card-text mt-3"> CALIFICACIONES</p>
                                    <div class="stars">
                                        <span>8.9</span>
                                        <i class="ti-star color-primary"></i>
                                        <i class="ti-star color-primary"></i>
                                        <i class="ti-star color-primary"></i>
                                        <i class="ti-star color-primary"></i>
                                        <i class="ti-star"></i>
                                    </div>
                                    <div class="message">
                                        <button class="btn btn-primary btn-addon" type="button"><i class="ti-email"></i>Enviar Mensaje</button>
                                    </div>
                                    <p class="card-text mt-3 title-admin"> INFORMACION DE CONTACTO</p>
                                    <p class="card-text mt-3"> Identificacion: ' . $f['id_usuario'] . '</p>
                                    <p class="card-text mt-3"> Tipo Documento: ' . $f['tipo_documento_usuario'] . '</p>
                                    <p class="card-text mt-3"> Email: ' . $f['email_usuario'] . '</p>
                                    <p class="card-text mt-3"> Telefono: ' . $f['telefono_usuario'] . '</p>
                                    <p class="card-text mt-3"> Estado: ' . $f['estado_usuario'] . '</p>
                                    <h2 class="cta-title">Estimado administrador,</h2>
                                    <p class="cta-description">Asigne actividades personalizadas ahora. Ofrecemos oportunidades únicas y emocionantes. Asegure lugares disponibles hoy.</p>
                                    <a href="../Administrador/crearInscripcionesPerso.php" class="btn btn-primary admin"> ASIGNAR ACTIVIDADES</a>
                                </div>
                            </div>
                        </div>
                    </div>
            ';
        }

    }

?>