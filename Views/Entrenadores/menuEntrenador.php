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
                                <a href="verPerfilEntrenador.php"><i class="icofont-eye-alt"></i> VER PERFIL</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-users"></i> CLIENTES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verClienteEntrenador.php"><i class="icofont-eye-alt"></i> VER CLIENTES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-money"></i> MIS PAGOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="verMisPagosEntrenadores.php"><i class="icofont-eye-alt"></i> VER MIS PAGOS</a>
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
                                <a href="verActividadesEntrenador.php"><i class="icofont-eye-alt"></i> VER ACTIVIDADES</a>
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
                                <a href="verInscripcionesPersoEntrenador.php"><i class="icofont-eye-alt"></i> VER INSCRIPCIONES ASIGNADAS</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="icofont-chart-histogram"></i> ESTADISTICAS ACTIVIDADES PERSONALIZADAS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearEstadisticasPersoEntrenador.php"><i class="icofont-ui-add"></i> REGISTRAR ESTADISTICAS</a>
                            </li>
                            <li>
                                <a href="verEstadisticasPersoEntrenador.php"><i class="icofont-eye-alt"></i> VER ESTADISTICAS</a>
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
                                <a href="verProductosEntrenador.php"><i class="icofont-eye-alt"></i> VER PRODUCTOS</a>
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
                                <a href="crearComprasEntrenador.php"><i class="icofont-ui-add"></i> REALIZAR COMPRA</a>
                            </li>
                            <li>
                                <a href="verComprasEntrenadores.php"><i class="icofont-eye-alt"></i> VER MIS COMPRAS</a>
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
                                <a href="verTablaPedidosEntrenador.php"><i class="icofont-eye-alt"></i> VER PEDIDOS</a>
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