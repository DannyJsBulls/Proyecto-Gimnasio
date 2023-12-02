<?php
    function mostrarActividadesProveedor($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarActividadesProveedor($id_usuario);

        if (!isset($result)) {
            echo '<h2>No Hay Actividades Registradas en el Sistema</h2>';
        }else {
            echo '<div class="row">';
            foreach ($result as $f) {
                echo '
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card-actividades">
                            <div class="card-actividad-bg">
                                <img class="card-img" src="' . $f['foto_actividad'] . '" alt="Foto Actividad">
                                <h1 class="card-text-title">' . $f['nombre_actividad'] . '</h1>
                                <h3 class="card-text-title"> Numero de Referencia' . $f['codigo_actividad'] . '</h3>
                                <article class="body-activity">
                                    <p class="card-text-actividades"> Descripcion: ' . $f['descripcion_actividad'] . '</p>
                                    <p class="card-text-actividades"> Tipo de Actividad: ' . $f['tipo_actividad'] . '</p>
                                    <p class="card-text-actividades"> Area: ' . $f['area_actividad'] . '</p>
                                <article>
                                <div class="row">
                                    <a href="verDetalleActividadesProvee.php?id_user=' . $f['codigo_actividad'] . '" class="btn btn-primary boton central">Ver Informacion</a>
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
    function cargarActividadesProveedor(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarActividadesProveedor($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="' . $f['foto_actividad'] . '" class="card-img-top imagen-actividad" alt="Foto de usuario">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3">' . $f['nombre_actividad'] . '</h5>
                                <p class="card-text mt-3"> CALIFICACIONES</p>
                                <div class="stars activity">
                                    <span>8.9</span>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star"></i>
                                </div>
                                <p class="card-text mt-3 title-admin"> INFORMACION DE LA ACTIVIDAD</p>
                                <p class="card-text mt-3"> Descripcion Actividad: ' . $f['descripcion_actividad'] . '</p>
                                <p class="card-text mt-3"> Tipo de Actividad: ' . $f['tipo_actividad'] . '</p>
                                <p class="card-text mt-3"> Requisitos: ' . $f['requisitos_actividad'] . '</p>
                                <p class="card-text mt-3"> Estado: ' . $f['estado_actividad'] . '</p>
                                <p class="card-text mt-3"> Objetivo: ' . $f['objetivos_actividad'] . '</p>
                                <p class="card-text mt-3"> Area Actividad: ' . $f['area_actividad'] . '</p>
                                <h2 class="cta-title">¡No te pierdas esta oportunidad única!</h2>
                                <p class="cta-description">Inscribe tu actividad ahora mismo y descubre un mundo de posibilidades. Obtén acceso a experiencias emocionantes, aprendizaje de calidad y momentos inolvidables. ¡Aprovecha esta oferta especial y asegura tu lugar hoy mismo!</p>
                                <div class="row columna">
                                    <div class="col-lg-6">
                                        <a href="../Proveedores/crearInscripcionesPersoProveedor.php" class="btn btn-primary training plan"> ACTIVIDAD PERSONALIZADA</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <a href="../Proveedores/crearInscripcionesLibresProveedor.php" class="btn btn-primary training plan"> ACTIVIDAD LIBRE</a>
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