<?php
    require_once('../../Controller/mostrarPerfilUsuario.php'); // Ruta correcta a mostrarPerfilUsuario.php
?>
    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="home.php">
                        <img src="../../Views/Extras/logos/logo-trnasparente.png" alt="Logo">
                    </a>
                </div>
                <div class="perfil-foto-container">
                    <div class="perfil-foto">
                        <?php 
                            if(isset($id_usuario)){
                                mostrarPerfilUsuario($id_usuario);
                            }
                        ?>
                    </div>
                </div>
                <ul>
                    <li>
                        <a href="home.php">
                            <i class="icofont-home"></i> INICIO
                        </a>
                    </li>
                    <li class="label">USUARIOS</li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-user"></i> PERFIL DE USUARIO
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verPerfilAdministrador.php"><i class="icofont-eye-alt"></i> VER PERFIL</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-users"></i> USUARIOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearUsuario.php"><i class="bi bi-person-plus-fill" id="miIcono"></i> REGISTRAR USUARIOS</a>
                            </li>
                            <li>
                                <a href="verUsuarios.php"><i class="icofont-eye-alt"></i> VER USUARIOS</a>
                            </li>
                        </ul>
                        <li>
                            <a class="sidebar-sub-toggle"> 
                                <i class="icofont-muscle align-icon"></i> ENTRENADORES
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="verTablaEntrenadores.php"><i class="icofont-table"></i> TABLA ENTRENADORES</a>
                                </li>
                                <li>
                                    <a href="verEntrenadores.php"><i class="icofont-eye-alt"></i> VER ENTRENADORES</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"> 
                                <i class="icofont-user"></i> CLIENTES
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="verTablaClientes.php"><i class="icofont-table"></i> TABLA CLIENTES</a>
                                </li>
                                <li>
                                    <a href="verClientes.php"><i class="icofont-eye-alt"></i> VER CLIENTES</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"> 
                                <i class="icofont-live-messenger"></i> PROVEEDORES
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="verTablaProveedores.php"><i class="icofont-table"></i> TABLA PROVEEDORES</a>
                                </li>
                                <li>
                                    <a href="verProveedores.php"><i class="icofont-eye-alt"></i> VER PROVEEDORES</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="sidebar-sub-toggle"> 
                                <i class="ti-money"></i> PAGOS ENTRENADORES
                                <span class="sidebar-collapse-icon ti-angle-down"></span>
                            </a>
                            <ul>
                                <li>
                                    <a href="crearPagosEntrenadores.php"><i class="icofont-ui-add"></i> REGISTRAR PAGOS</a>
                                </li>
                                <li>
                                    <a href="verPagosEntrenadores.php"><i class="icofont-eye-alt"></i> VER PAGOS</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                    <li class="label">ACTIVIDADES</li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-gym-alt-2"></i>ACTIVIDADES GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearActividades.php"><i class="icofont-ui-add"></i>REGISTRAR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verActividades.php"><i class="icofont-eye-alt"></i> TABLA ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verActividadesAdmin.php"><i class="icofont-eye-alt"></i> VER ACTIVIDADES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-prescription"></i>INSCRIPCIONES LIBRES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearInscripcionesLibres.php"><i class="icofont-ui-add"></i>INSCRIBIR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verInscripcionesLibres.php"><i class="icofont-eye-alt"></i> VER INSCRIPCIONES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-prescription"></i>INSCRIPCIONES PERSONALIZADAS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearInscripcionesPerso.php"><i class="icofont-ui-add"></i>INSCRIBIR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verInscripcionesPerso.php"><i class="icofont-eye-alt"></i> VER INSCRIPCIONES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-chart-histogram"></i> ESTADISTICAS ACTIVIDADES LIBRES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearEstadisticasLibres.php"><i class="icofont-ui-add"></i>REGISTRAR ESTADISTICAS</a>
                            </li>
                            <li>
                                <a href="verEstadisticasLibres.php"><i class="icofont-eye-alt"></i> VER ESTADISTICAS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-chart-histogram"></i> ESTADISTICAS ACTIVIDADES PERSONALIZADAS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearEstadisticasPersonalizadas.php"><i class="icofont-ui-add"></i>REGISTRAR ESTADISTICAS</a>
                            </li>
                            <li>
                                <a href="verEstadisticasPersonalizadas.php"><i class="icofont-eye-alt"></i> VER ESTADISTICAS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="icofont-tags"></i> PLANES GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearPlanes.php"><i class="icofont-ui-add"></i> REGISTRAR PLANES</a>
                            </li>
                            <li>
                                <a href="verPlanes.php"><i class="icofont-eye-alt"></i> TABLA PLANES</a>
                            </li>
                            <li>
                                <a href="verPlanesDetalle.php"><i class="icofont-eye-alt"></i> VER PLANES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-money"></i> VENDER PLANES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearPagos.php"><i class="icofont-ui-add"></i> REGISTRAR VENTAS PLAN</a>
                            </li>
                            <li>
                                <a href="verPagos.php"><i class="icofont-eye-alt"></i> VER VENTAS PLANES</a>
                            </li>
                        </ul>
                    </li>                        
                    <li class="label">PRODUCTOS GYM</li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-dumbbell"></i>PRODUCTOS GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearProductos.php"><i class="icofont-ui-add"></i> REGISTRAR PRODUCTOS</a>
                            </li>
                            <li>
                                <a href="verProductos.php"><i class="icofont-eye-alt"></i> TABLA PRODUCTOS</a>
                            </li>
                            <li>
                                <a href="verProductosAdmin.php"><i class="icofont-eye-alt"></i> VER PRODUCTOS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-money"></i> COMPRAR PRODUCTOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearOrdenCompras.php"><i class="icofont-ui-add"></i> REGISTRAR PAGOS PROVEEDORES</a>
                            </li>
                            <li>
                                <a href="verOrdenCompras.php"><i class="icofont-eye-alt"></i> VER PAGOS PROVEEDORES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-money"></i> VENDER PRODUCTOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearVentasClientes.php"><i class="icofont-ui-add"></i> REGISTRAR VENTAS PRODUCTOS</a>
                            </li>
                            <li>
                                <a href="verVentasClientes.php"><i class="icofont-eye-alt"></i> VER VENTAS PRODUCTOS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-delivery-time"></i> PEDIDOS CLIENTES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verTablaPedidosClientes.php"><i class="icofont-eye-alt"></i> VER PEDIDOS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-delivery-time"></i> PEDIDOS PROVEEDOR
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verTablaPedidosProveedores.php"><i class="icofont-eye-alt"></i> VER PEDIDOS PROVEEDORES</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul>                    
                    <li>
                        <a href="#" onclick="mostrarVentanaEmergente(); return false;">
                            <i class="icofont-exit"></i> CERRAR SESION
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Ventana emergente modal de confirmación -->
    <div class="modal fade" id="confirmarCerrarSesionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
                    <button type="button" class="btn-close custom-close-button" data-bs-dismiss="modal" aria-label="Close" onclick="cerrarVentanaModal()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas cerrar tu sesión?</p>
                </div>
                <div class="modal-footer">
                    <!-- Agrega un botón que cierre la sesión cuando se hace clic -->
                    <a href="../Extras/iniciarSesion.php" class="btn btn-danger">Sí, cerrar sesión</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="cerrarVentanaModal()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Función para mostrar la ventana emergente modal
        function mostrarVentanaEmergente() {
            $('#confirmarCerrarSesionModal').modal('show');
        }
    </script>
    <!-- Agrega esta función JavaScript para cerrar la ventana modal cuando se hace clic en "Cancelar" -->
    <script>
        function cerrarVentanaModal() {
            $('#confirmarCerrarSesionModal').modal('hide');
        }
    </script>
    <script>
        // Agrega un evento click al botón "Cancelar"
        document.getElementById("cancelarBtn").addEventListener("click", function(event) {
            event.preventDefault(); // Evita que el evento de cierre se propague
            // Puedes agregar aquí cualquier otra lógica que desees realizar al hacer clic en "Cancelar"
        });
    </script>
    <script>
        // Función para mostrar la ventana emergente modal
        function mostrarVentanaEmergente() {
            $('#confirmarCerrarSesionModal').modal('show');
        }
    </script>
    <!-- Incluye jQuery (asegúrate de que sea la última versión) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



