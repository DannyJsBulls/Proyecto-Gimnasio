<?php
    function mostrarClienteAdmin(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarClienteAdmin();

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
                                <h5 class="card-title-entrenador">Cliente Fitness</h5>
                                <article class="body-training">
                                    <p class="card-text-entrenador mt-3"> Identificacion: ' . $f['id_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Nombre: ' . $f['nombres_usuario'] . ' ' . $f['apellidos_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Email: ' . $f['email_usuario'] . '</p>
                                    <p class="card-text-entrenador mt-3"> Telefono: ' . $f['telefono_usuario'] . '</p>
                                <article>
                                <div class="row">
                                    <a href="verDetalleClienteAdmin.php?id_user=' . $f['id_usuario'] . '" class="btn btn-primary boton boton central">Ver Perfil</a>
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
    function cargarClienteAdmin(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarClienteAdmin($id_user);

        foreach ($result as $f) {
            echo '
                    <div class="card-entrenador">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="' . $f['foto_usuario'] . '" class="card-img-top imagen-ancho-completo" alt="Foto de usuario">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <p class="training">Nos complace presentar a nuestros clientes fitness del gimnasio, listos para ser asignados a actividades libres o personalizadas con entrenador. Desde entrenamientos individuales hasta clases en grupo, estamos preparados para ayudarles a alcanzar sus objetivos de fitness.</p>
                                    <h5 class="card-title mt-3 entrenador-title">CLIENTE FITNESS</h5>
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
                                    <p class="cta-description">Asigne actividades personalizadas y libres ahora. Ofrecemos oportunidades únicas y emocionantes. Asegure lugares disponibles hoy.</p>
                                    <div class="row columna">
                                        <div class="col-lg-6">
                                            <a href="../Administrador/crearInscripcionesPerso.php" class="btn btn-primary training plan"> ACTIVIDAD PERSONALIZADA</a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="../Administrador/crearInscripcionesLibres.php" class="btn btn-primary training plan"> ACTIVIDAD LIBRE</a>
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