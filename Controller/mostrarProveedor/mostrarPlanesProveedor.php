<?php
    function mostrarPlanesProveedor(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPlanesProveedor();

        if (!isset($result)) {
            echo '<h2>No Hay Planes Registrados en el Sistema</h2>';
        }else {
            echo '<div class="row">';
            foreach ($result as $f) {
                echo '
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card-planes">
                            <div class="card plan-bg">
                                <h1 class="card-text-titulo"> ' . $f['nombre_plan'] . '</h1>
                                <h3 class="card-text-titulo"> $ ' . $f['precio_plan'] . '</h3>
                                <p class="card-text-planes"> Nombre Del Plan: ' . $f['nombre_plan'] . '</p>
                                <p class="card-text-planes"> Descripcion del Plan: ' . $f['descripcion_plan'] . '</p>
                                <p class="card-text-planes"> Duracion Plan: ' . $f['duracion_plan'] . '</p>
                                <p class="card-text-planes"> Descuentos: ' . $f['descuentos_plan'] . '</p>
                                <p class="card-text-planes"> Categoria: ' . $f['categoria_plan'] . '</p>
                                <div class="row">
                                    <a href="verDetallePlanesProvee.php?id_user=' . $f['codigo_plan'] . '" class="btn btn-primary boton">Ver Plan</a>
                                    <a href="../Proveedores/crearPagosPlanesProveedor.php" class="btn btn-danger plan">Comprar Plan</a>
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
    function cargarPlanesProveedor(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPlanesProveedor($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../../Views/Extras/Logos/logo-trnasparente.png" class="card-img-top imagen-ancho-completo-logo" alt="Logo Gym">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><i class="icofont-tags planes"></i>' . $f['nombre_plan'] . '</h5>
                                <p class="card-text mt-3"> CALIFICACIONES</p>
                                <div class="stars activity">
                                    <span>8.9</span>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star"></i>
                                </div>
                                <p class="card-text mt-3 title-admin"> INFORMACION DEL PLAN</p>
                                <p class="card-text mt-3"> Descripcion: ' . $f['descripcion_plan'] . '</p>
                                <p class="card-text mt-3"> Precio: ' . $f['precio_plan'] . '</p>
                                <p class="card-text mt-3"> Duracion: ' . $f['duracion_plan'] . '</p>
                                <p class="card-text mt-3"> Acceso Servicios: ' . $f['acceso_servicios_plan'] . '</p>
                                <p class="card-text mt-3"> Restricciones del Plan: ' . $f['restricciones_plan'] . '</p>
                                <p class="card-text mt-3"> Estado: ' . $f['estado_plan'] . '</p>
                                <p class="card-text mt-3"> Descuentos del Plan: ' . $f['descuentos_plan'] . '</p>
                                <p class="card-text mt-3"> Categoria del Plan: ' . $f['categoria_plan'] . '</p>
                                <a href="../Proveedores/crearPagosPlanesProveedor.php" class="btn btn-primary training"> COMPRAR PLAN</a>
                            </div>
                        </div>
                    </div>
                </div>

            ';
        }

    }

?>