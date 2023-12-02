<?php
    function mostrarProductosEntrenador(){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarProductosEntrenador();

        if (empty($result)) {
            echo '<h2>No Hay Productos Registrados en el Sistema</h2>';
        }else {
            echo '<div class="row">';
            foreach ($result as $f) {
                echo '
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="card-actividades">
                            <div class="card-actividad-bg">
                                <img class="card-img" src="' . $f['foto_producto'] . '" alt="Foto Producto">
                                <h1 class="card-text-title">' . $f['nombre_producto'] . '</h1>
                                <h3 class="card-text-title"> Numero de Referencia ' . $f['codigo_producto'] . '</h3>
                                <article class="body-activity">
                                    <p class="card-text-actividades"> Cantidad Disponible: ' . $f['cantidad_productos_disponibles'] . '</p>
                                    <p class="card-text-actividades"> Categoria de Producto: ' . $f['categoria_producto'] . '</p>
                                    <p class="card-text-actividades"> Precio: ' . $f['precio_inicial_producto'] . '</p>
                                <article>
                                <div class="row">
                                    <a href="verDetalleProductosEntrenador.php?id_user=' . $f['codigo_producto'] . '" class="btn btn-primary boton">Ver Informacion</a>
                                    <a href="../Entrenadores/crearComprasEntrenador.php" class="btn btn-danger plan">Comprar Producto</a>
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
    function cargarProductosEntrenador(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarProductosEntrenador($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="' . $f['foto_producto'] . '" class="card-img-top imagen-actividad" alt="Foto de Producto">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3">' . $f['nombre_producto'] . '</h5>
                                <p class="card-text mt-3"> CALIFICACIONES</p>
                                <div class="stars activity">
                                    <span>8.9</span>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star color-primary"></i>
                                    <i class="ti-star"></i>
                                </div>
                                <p class="card-text mt-3 title-admin"> INFORMACION DEL PRODUCTO</p>
                                <p class="card-text mt-3"> Descripcion Producto: ' . $f['descripcion_producto'] . '</p>
                                <p class="card-text mt-3"> Cantidad Producto Disponibles: ' . $f['cantidad_productos_disponibles'] . '</p>
                                <p class="card-text mt-3"> Fecha de Vencimiento: ' . $f['fecha_vencimiento_producto'] . '</p>
                                <p class="card-text mt-3"> Categoria Producto: ' . $f['categoria_producto'] . '</p>
                                <p class="card-text mt-3"> Marca Producto: ' . $f['marca_producto'] . '</p>
                                <p class="card-text mt-3"> Estado Producto: ' . $f['estado_producto'] . '</p>
                                <p class="card-text mt-3"> Precio Inicial Producto: ' . $f['precio_inicial_producto'] . '</p>
                                <p class="card-text mt-3"> Porcentaje de Ganancia: ' . $f['porcentaje_ganancia_producto'] . '</p>
                                <p class="card-text mt-3"> Precio Final Producto: ' . $f['precio_final_producto'] . '</p>
                                <p class="card-text mt-3 font-weight-bold">¡Obtén tu producto ahora!</p>
                                <div class="row columna">
                                    <a href="../Entrenadores/crearComprasEntrenador.php" class="btn btn-primary training plan w-100"> COMPRAR PRODUCTO</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }

    }
?>