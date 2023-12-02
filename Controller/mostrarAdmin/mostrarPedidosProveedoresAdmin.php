<?php
    // funcion para ver el detalle del pedido
    function cargarPedidosProvee(){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPedidosProveedoresAdmin($id_user);

        foreach ($result as $f) {
            echo '
                <div class="card-entrenador">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="../../Views/Extras/Logos/logo-trnasparente.png" class="card-img-top imagen-logo" alt="Logo Gym">
                        </div>
                        <div class="col-lg-6">
                            <div class="card-body">
                                <h5 class="card-title mt-3"><i class="icofont-shopify"></i> Num.Referencia Producto: ' . $f['codigo_producto'] . '</h5>
                                <h5 class="card-title mt-3">Identificacion Proveedor: ' . $f['id_proveedor'] . '</h5>
                                <p class="card-text mt-3"> Fecha Entrega: ' . $f['fecha_entrega_pedido_proveedor'] . '</p>
                                <p class="card-text mt-3"> Precio Subtotal: ' . $f['precio_final_compra_producto'] . '</p>
                                <h2 class="cta-title"> Total: ' . $f['precio_final_compra_producto'] . '</h2>
                            </div>
                        </div>
                    </div>
                </div>
            ';
        }
    }
    // funcion para el detalle del pedido
    function cargarPedidosPro(){
        if (isset($_GET['id_user'])) {
            $id_user = $_GET['id_user'];
        
            $objConsultas = new Consultas();
            $result = $objConsultas->buscarPedidosProveedorAdministrador($id_user);
        
            if ($result === null) {
                echo '<p>No se encontraron pedidos para el usuario con ID ' . $id_user . '</p>';
            } else {
                foreach ($result as $pedido) {
                    echo '
                        <div class="card-entrenador">
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="' . $pedido['foto_producto'] . '" class="card-img-top imagen-actividad" alt="Foto de Producto">
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <p class="card-text mt-3"> Nombre Producto: ' . $pedido['nombre_producto'] . '</p>
                                        <p class="card-text mt-3"> Descripcion Producto: ' . $pedido['descripcion_producto'] . '</p>
                                        <p class="card-text mt-3"> Categoria Producto: ' . $pedido['categoria_producto'] . '</p>
                                        <p class="card-text mt-3"> Marca Producto: ' . $pedido['marca_producto'] . '</p>
                                        <p class="card-text mt-3"> Cantidad: ' . $pedido['cantidad_productos_compra'] . '</p>
                                        <p class="card-text mt-3"> Precio: ' . $pedido['precio_final_compra_producto'] . '</p>
                                        <p class="card-text mt-3"> Estado: ' . $pedido['estado_pedido_compra_producto'] . '</p>
                                        <div class="row columna">
                                            <div class="estado-pedido">
                                                <div class="paso-comprado">
                                                    <div class="icono">
                                                        <i class="icofont-verification-check"></i>
                                                    </div>
                                                <div class="texto">Comprado</div>
                                            </div>
                                            <div class="flecha"></div>
                                            <div class="paso-enviado">
                                                <div class="icono">
                                                    <i class="icofont-fast-delivery"></i>
                                                </div>
                                                <div class="texto">Enviado</div>
                                            </div>
                                            <div class="flecha"></div>
                                            <div class="paso-entregado">
                                                <div class="icono">
                                                    <i class="icofont-home"></i>
                                                </div>
                                                <div class="texto">Entregado</div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1>Direccion de Entrega <br> ' . $pedido['direccion_gimnasio'] . '</h1>
                        </div>
                        
                    ';
                }
            }
        } else {
            echo '<p>No se proporcionó un ID de usuario válido en la URL.</p>';
        }
    }

?>