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
                                <a href="verPerfilCliente.php"><i class="icofont-eye-alt"></i> VER PERFIL</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-muscle"></i> ENTRENADORES GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verEntrenadorCliente.php"><i class="icofont-eye-alt"></i> VER ENTRENADORES</a>
                            </li>
                        </ul>
                    </li>
                    <li class="label">ACTIVIDADES</li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-gym-alt-2"></i>ACTIVIDADES GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verActividadesCliente.php"><i class="icofont-eye-alt"></i> VER ACTIVIDADES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-prescription"></i> INSCRIPCIONES LIBRES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearInscripcionesLibresCliente.php"><i class="icofont-ui-add"></i>INSCRIBIR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verInscripcionesLibresCliente.php"><i class="icofont-eye-alt"></i> VER INSCRIPCIONES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-prescription"></i> INSCRIPCIONES PERSONALIZADAS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearInscripcionesPersoCliente.php"><i class="icofont-ui-add"></i>INSCRIBIR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verInscripcionesPersoCliente.php"><i class="icofont-eye-alt"></i> VER INSCRIPCIONES</a>
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
                                <a href="crearEstadisticasLibresCliente.php"><i class="icofont-ui-add"></i>REGISTRAR ESTADISTICAS</a>
                            </li>
                            <li>
                                <a href="verEstadisticasLibresCliente.php"><i class="icofont-eye-alt"></i> VER ESTADISTICAS</a>
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
                                <a href="verEstadisticasPersonalizadasCliente.php"><i class="icofont-eye-alt"></i> VER ESTADISTICAS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="icofont-tags"></i>PLANES GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="VerPlanesCliente.php"><i class="icofont-eye-alt"></i> VER PLANES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-money"></i> COMPRAR PLANES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearPagosPlanesCliente.php"><i class="icofont-ui-add"></i> REALIZAR COMPRA</a>
                            </li>
                            <li>
                                <a href="verPagosPlanesCliente.php"><i class="icofont-eye-alt"></i> VER MIS COMPRAS</a>
                            </li>
                        </ul>
                    </li>                    
                    <li class="label">PRODUCTOS GYM</li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-dumbbells"></i>PRODUCTOS GYM
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verProductosCliente.php"><i class="icofont-eye-alt"></i> VER PRODUCTOS</a>
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
                                <a href="crearComprasClientes.php"><i class="icofont-ui-add"></i> REALIZAR COMPRA</a>
                            </li>
                            <li>
                                <a href="verComprasClientes.php"><i class="icofont-eye-alt"></i> VER MIS COMPRAS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-delivery-time"></i> PEDIDOS REALIZADOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verTablaPedidos.php"><i class="icofont-eye-alt"></i> VER PEDIDOS</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul>    
                    <li>
                        <a href="../../Controller/cerrarSesion.php">
                        <i class="icofont-exit"></i> CERRAR SESION</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>