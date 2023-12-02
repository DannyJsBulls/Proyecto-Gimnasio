<?php
    require_once("../../Model/conexion.php");
    require_once("../../Model/consultas.php");
    require_once("../../Controller/mostrarPerfilUsuario.php");
    require_once("../../Model/seguridadAdmin.php");
    
    // Asegurémonos de que el cliente haya iniciado sesión y obtener su ID de cliente
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        // mostrarActividadesCliente($id_cliente);
    } else {
        echo '<h2>No se pudo obtener el ID del cliente en sesión.</h2>';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GYM Admin Dashboard</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    
    <link rel="stylesheet" href="../Website-Externo/plugins/icofont/icofont.min.css">

    <!-- Toastr -->
    <link href="../dashboard/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="../dashboard/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="../dashboard/css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="../dashboard/css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="../dashboard/css/lib/barRating/barRating.css" rel="stylesheet">
    <!-- Nestable -->
    <link href="../dashboard/css/lib/nestable/nestable.css" rel="stylesheet">
    <!-- JsGrid -->
    <link href="../dashboard/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    <!-- Datatable -->
    <link href="../dashboard/css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
    <!-- Calender 2 -->
    <link href="../dashboard/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="../dashboard/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="../dashboard/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../dashboard/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="../dashboard/css/lib/select2/select2.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link href="../dashboard/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Calender -->
    <link href="../dashboard/css/lib/calendar/fullcalendar.css" rel="stylesheet" />

    <!-- Common -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="../dashboard/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/themify-icons.css" rel="stylesheet">
    <link href="../dashboard/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../dashboard/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../dashboard/css/lib/helper.css" rel="stylesheet">
    <link href="../dashboard/css/style.css" rel="stylesheet">
    <link href="../dashboard/css/stylePropio.css" rel="stylesheet">

    <!-- <link rel="icon" href="../Extras/Logos/logo-trnasparente.png" size="32x32"> -->
    <link rel="shortcut icon" href="../Extras/Logos/positivo.png" type="image/x-icon">
</head>

<body>

<!-- EL SIBERG ES EL PANEL QUE SE ENCUENTRA EN LA ISQUIERDA DE MENU  -->
    <?php 
        include("menuProveedor.php");
    ?>
    <!-- <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="home.php">
                        <span><img src="../../Views/Extras/logos/positivo.png" alt="Logo" style="Width: 250px"></span>
                    </a>
                </div>
                <ul>
                    <li class="label">MENU PRINCIPAL</li>
                    <li>
                        <a href="home.php">
                            <i class="ti-home"></i> INICIO
                        </a>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-user"></i> ROLES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearRoles.php"><i class="bi bi-person-plus"></i> REGISTRAR ROLES</a>
                            </li>
                            <li>
                                <a href="verRoles.php"><i class="bi bi-eye"></i> VER ROLES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-user"></i> USUARIOS
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearUsuario.php"><i class="bi bi-person-plus"></i> REGISTRAR USUARIOS</a>
                            </li>
                            <li>
                                <a href="verUsuarios.php"><i class="bi bi-eye"></i> VER USUARIOS</a>
                            </li>
                        </ul>
                    </li>
 
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-user"></i> ENTRENADORES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearEntrenador.php"><i class="bi bi-person-plus"></i>REGISTRAR ENTRENADORES</a>
                            </li>
                            <li>
                                <a href="verEntrenador.php"><i class="bi bi-eye"></i> VER ENTRENADORES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-user"></i> CLIENTES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearCliente.php"><i class="bi bi-person-plus"></i> REGISTRAR CLIENTES</a>
                            </li>
                            <li>
                                <a href="VerClientes.php"><i class="bi bi-eye"></i> VER CLIENTES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="sidebar-sub-toggle"> 
                            <i class="ti-stats-up"></i> ACTIVIDADES
                            <span class="sidebar-collapse-icon ti-angle-down"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="crearActividades.php"><i class="bi bi-person-plus"></i> REGISTRAR ACTIVIDADES</a>
                            </li>
                            <li>
                                <a href="verActividades.php"><i class="bi bi-eye"></i> VER ACTIVIDADES</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../Controller/cerrarSesion.php">
                            <i class="ti-close"></i> CERRAR SESION</a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
    <!-- /# sidebar -->

<!-- header es el cuerpo o contenido de la pagina  -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Recent Notifications</span>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">5 members joined today </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mariam</div>
                                                        <div class="notification-text">likes a photo of you</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Tasnim</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-email"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">2 New Messages</span>
                                        <a href="email.html">
                                            <i class="ti-pencil-alt pull-right"></i>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/1.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="notification-unread">
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/3.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Michael Qin</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="pull-left m-r-10 avatar-img" src="images/avatar/2.jpg" alt="" />
                                                    <div class="notification-content">
                                                        <small class="notification-timestamp pull-right">02:34 PM</small>
                                                        <div class="notification-heading">Mr. John</div>
                                                        <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="text-center">
                                                <a href="#" class="more-link">See All</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">Danny
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">Upgrade Now</span>
                                        <p class="trial-day">30 Days Trail</p>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="../../Controller/cerrarSesion.php">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<!-- conteido o contenedor principal de la interfaz  -->
<div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-money color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total Profit</div>
                                        <div class="stat-digit">1,012</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-user color-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">New Customer</div>
                                        <div class="stat-digit">961</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Active Projects</div>
                                        <div class="stat-digit">770</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Referral</div>
                                        <div class="stat-digit">2,781</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Fee Collections and Expenses</h4>

                                </div>
                                <div class="card-body">
                                    <div class="ct-bar-chart m-t-30"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">

                                <div class="card-body">
                                    <div class="ct-pie-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card bg-primary">
                                        <div class="weather-widget">
                                            <div id="weather-one" class="weather-one p-22"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="testimonial-widget-one p-17">
                                            <div class="testimonial-widget-one owl-carousel owl-theme">
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-text">
                                                            <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet,
                                                            consectetur adipisicing elit, sed do eiusmod tempor
                                                            incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                            minim veniam, quis
                                                            nostrud exercitation <i class="fa fa-quote-right"></i>
                                                        </div>
                                                        <img class="testimonial-author-img"
                                                            src="images/avatar/1.jpg" alt="" />
                                                        <div class="testimonial-author">TYRION LANNISTER</div>
                                                        <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title pr">
                                    <h4>All Exam Result</h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                            <thead>
                                                <tr>
                                                    <th><label><input type="checkbox" value=""></label>Exam Name</th>
                                                    <th>Subject</th>
                                                    <th>Grade Point</th>
                                                    <th>Percent Form</th>
                                                    <th>Percent Upto</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>Mathmatics</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>Mathmatics</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>English</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>Bangla</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>Mathmatics</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>English</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                                <tr>
                                                    <td>Class Test</td>
                                                    <td>Mathmatics</td>
                                                    <td>
                                                        4.00
                                                    </td>
                                                    <td>
                                                        95.00
                                                    </td>
                                                    <td>
                                                        100
                                                    </td>
                                                    <td>20/04/2017</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-facebook">
                                        <i class="ti-facebook"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">8,268</div>
                                        <div class="stat-text">Likes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-youtube">
                                        <i class="ti-youtube"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">12,545</div>
                                        <div class="stat-text">Subscribes</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-twitter">
                                        <i class="ti-twitter"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">7,982</div>
                                        <div class="stat-text">Tweets</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card p-0">
                                <div class="stat-widget-three home-widget-three">
                                    <div class="stat-icon bg-danger">
                                        <i class="ti-linkedin"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-digit">9,658</div>
                                        <div class="stat-text">Followers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar"></div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Notice Board </h4>

                                </div>
                                <div class="recent-comment m-t-15">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/1.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-primary">john doe</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">10 min ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/2.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-success">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">1 hour ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/3.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-danger">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <div class="comment-date">Yesterday</div>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/1.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-primary">john doe</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">10 min ago</p>
                                        </div>
                                    </div>
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/2.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-success">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <p class="comment-date">1 hour ago</p>
                                        </div>
                                    </div>
                                    <div class="media no-border">
                                        <div class="media-left">
                                            <a href="#"><img class="media-object" src="images/avatar/3.jpg"
                                                    alt="..."></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading color-info">Mr. John</h4>
                                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                                            <div class="comment-date">Yesterday</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Timeline</h4>

                                </div>
                                <div class="card-body">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"><i class="fa fa-smile-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">School promote video sharing</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>10 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Ready our school website and online
                                                        service</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>20 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger"><i class="fa fa-times-circle-o"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Routine pubish our website form
                                                        10/03/2017 </h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>30 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success"><i class="fa fa-check-circle-o"></i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Principle quotation publish our website
                                                    </h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>15 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-badge warning"><i class="fa fa-sun-o"></i></div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <h5 class="timeline-title">Class schedule publish our website</h5>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>20 minutes ago</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Task</h4>

                                </div>
                                <div class="todo-list">
                                    <div class="tdl-holder">
                                        <div class="tdl-content">
                                            <ul>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>22,Dec Publish The Final
                                                            Exam Result</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>First Jan Start Our
                                                            School</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox"><i></i><span>Recently Our Maganement
                                                            Programme Start</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Check out some
                                                            Popular courses</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>

                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>First Jan Start Our
                                                            School</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label>
                                                        <input type="checkbox" checked><i></i><span>Connect with one new
                                                            person</span>
                                                        <a href='#' class="ti-close"></a>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <input type="text" class="tdl-new form-control"
                                            placeholder="Write new item and hit 'Enter'...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title pr">
                                    <h4>All Expense</h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                            <thead>
                                                <tr>
                                                    <th><label><input type="checkbox" value=""></label>ID</th>
                                                    <th>Expense Type</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><label><input type="checkbox" value=""></label>#2901</td>
                                                    <td>
                                                        Salary
                                                    </td>
                                                    <td>
                                                        $2000
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-primary">Paid</span>
                                                    </td>
                                                    <td>
                                                        edumin@gmail.com
                                                    </td>
                                                    <td>
                                                        10/05/2017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label><input type="checkbox" value=""></label>#2901</td>
                                                    <td>
                                                        Salary
                                                    </td>
                                                    <td>
                                                        $2000
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-warning">Pending</span>
                                                    </td>
                                                    <td>
                                                        edumin@gmail.com
                                                    </td>
                                                    <td>
                                                        10/05/2017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label><input type="checkbox" value=""></label>#2901</td>
                                                    <td>
                                                        Salary
                                                    </td>
                                                    <td>
                                                        $2000
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-primary">Paid</span>
                                                    </td>
                                                    <td>
                                                        edumin@gmail.com
                                                    </td>
                                                    <td>
                                                        10/05/2017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label><input type="checkbox" value=""></label>#2901</td>
                                                    <td>
                                                        Salary
                                                    </td>
                                                    <td>
                                                        $2000
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-danger">Due</span>
                                                    </td>
                                                    <td>
                                                        edumin@gmail.com
                                                    </td>
                                                    <td>
                                                        10/05/2017
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label><input type="checkbox" value=""></label>#2901</td>
                                                    <td>
                                                        Salary
                                                    </td>
                                                    <td>
                                                        $2000
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-primary">Paid</span>
                                                    </td>
                                                    <td>
                                                        edumin@gmail.com
                                                    </td>
                                                    <td>
                                                        10/05/2017
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Admin Board. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>




    <!-- Common -->
    <script src="../dashboard/js/lib/jquery.min.js"></script>
    <script src="../dashboard/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="../dashboard/js/lib/menubar/sidebar.js"></script>
    <script src="../dashboard/js/lib/preloader/pace.min.js"></script>
    <script src="../dashboard/js/lib/bootstrap.min.js"></script>
    <script src="../dashboard/js/scripts.js"></script>

    <!-- Calender -->
    <script src="../dashboard/js/lib/jquery-ui/jquery-ui.min.js"></script>
    <script src="../dashboard/js/lib/moment/moment.js"></script>
    <script src="../dashboard/js/lib/calendar/fullcalendar.min.js"></script>
    <script src="../dashboard/js/lib/calendar/fullcalendar-init.js"></script>

    <!--  Flot Chart -->
    <script src="../dashboard/js/lib/flot-chart/excanvas.min.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.time.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.stack.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.resize.js"></script>
    <script src="../dashboard/js/lib/flot-chart/jquery.flot.crosshair.js"></script>
    <script src="../dashboard/js/lib/flot-chart/curvedLines.js"></script>
    <script src="../dashboard/js/lib/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="../dashboard/js/lib/flot-chart/flot-chart-init.js"></script>

    <!--  Chartist -->
    <script src="../dashboard/js/lib/chartist/chartist.min.js"></script>
    <script src="../dashboard/js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="../dashboard/js/lib/chartist/chartist-init.js"></script>

    <!--  Chartjs -->
    <script src="../dashboard/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../dashboard/js/lib/chart-js/chartjs-init.js"></script>

    <!--  Knob -->
    <script src="../dashboard/js/lib/knob/jquery.knob.min.js "></script>
    <script src="../dashboard/js/lib/knob/knob.init.js "></script>

    <!--  Morris -->
    <script src="../dashboard/js/lib/morris-chart/raphael-min.js"></script>
    <script src="../dashboard/js/lib/morris-chart/morris.js"></script>
    <script src="../dashboard/js/lib/morris-chart/morris-init.js"></script>

    <!--  Peity -->
    <script src="../dashboard/js/lib/peitychart/jquery.peity.min.js"></script>
    <script src="../dashboard/js/lib/peitychart/peitychart.init.js"></script>

    <!--  Sparkline -->
    <script src="../dashboard/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="../dashboard/js/lib/sparklinechart/sparkline.init.js"></script>

    <!-- Select2 -->
    <script src="../dashboard/js/lib/select2/select2.full.min.js"></script>

    <!--  Validation -->
    <script src="../dashboard/js/lib/form-validation/jquery.validate.min.js"></script>
    <script src="../dashboard/js/lib/form-validation/jquery.validate-init.js"></script>

    <!--  Circle Progress -->
    <script src="../dashboard/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="../dashboard/js/lib/circle-progress/circle-progress-init.js"></script>

    <!--  Vector Map -->
    <script src="../dashboard/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../dashboard/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../dashboard/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.algeria.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.argentina.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.brazil.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.france.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.germany.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.greece.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.iran.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.iraq.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.russia.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.tunisia.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.europe.js"></script>
    <script src="../dashboard/js/lib/vector-map/country/jquery.vmap.usa.js"></script>

    <!--  Simple Weather -->
    <script src="../dashboard/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../dashboard/js/lib/weather/weather-init.js"></script>

    <!--  Owl Carousel -->
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../dashboard/js/lib/owl-carousel/owl.carousel-init.js"></script>

    <!--  Calender 2 -->
    <script src="../dashboard/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="../dashboard/js/lib/calendar-2/pignose.init.js"></script>


    <!-- Datatable -->
    <script src="../dashboard/js/lib/data-table/datatables.min.js"></script>
    <script src="../dashboard/js/lib/data-table/buttons.dataTables.min.js"></script>
    <script src="../dashboard/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../dashboard/js/lib/data-table/buttons.flash.min.js"></script>
    <script src="../dashboard/js/lib/data-table/jszip.min.js"></script>
    <script src="../dashboard/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../dashboard/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../dashboard/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../dashboard/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../dashboard/js/lib/data-table/datatables-init.js"></script>

    <!-- JS Grid -->
    <script src="../dashboard/js/lib/jsgrid/db.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid.core.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid.load-indicator.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid.load-strategies.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid.sort-strategies.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid.field.js"></script>
    <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.text.js"></script>
    <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.number.js"></script>
    <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.select.js"></script>
    <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.checkbox.js"></script>
    <script src="../dashboard/js/lib/jsgrid/fields/jsgrid.field.control.js"></script>
    <script src="../dashboard/js/lib/jsgrid/jsgrid-init.js"></script>

    <!--  Datamap -->
    <script src="../dashboard/js/lib/datamap/d3.min.js"></script>
    <script src="../dashboard/js/lib/datamap/topojson.js"></script>
    <script src="../dashboard/js/lib/datamap/datamaps.world.min.js"></script>
    <script src="../dashboard/js/lib/datamap/datamap-init.js"></script>

    <!--  Nestable -->
    <script src="../dashboard/js/lib/nestable/jquery.nestable.js"></script>
    <script src="../dashboard/js/lib/nestable/nestable.init.js"></script>

    <!--ION Range Slider JS-->
    <script src="../dashboard/js/lib/rangeSlider/ion.rangeSlider.min.js"></script>
    <script src="../dashboard/js/lib/rangeSlider/moment.js"></script>
    <script src="../dashboard/js/lib/rangeSlider/moment-with-locales.js"></script>
    <script src="../dashboard/js/lib/rangeSlider/rangeslider.init.js"></script>

    <!-- Bar Rating-->
    <script src="../dashboard/js/lib/barRating/jquery.barrating.js"></script>
    <script src="../dashboard/js/lib/barRating/barRating.init.js"></script>

    <!-- jRate -->
    <script src="../dashboard/js/lib/rating1/jRate.min.js"></script>
    <script src="../dashboard/js/lib/rating1/jRate.init.js"></script>

    <!-- Sweet Alert -->
    <script src="../dashboard/js/lib/sweetalert/sweetalert.min.js"></script>
    <script src="../dashboard/js/lib/sweetalert/sweetalert.init.js"></script>

    <!-- Toastr -->
    <script src="../dashboard/js/lib/toastr/toastr.min.js"></script>
    <script src="../dashboard/js/lib/toastr/toastr.init.js"></script>

    <!--  Dashboard 1 -->
    <script src="../dashboard/js/dashboard1.js"></script>
    <script src="../dashboard/js/dashboard2.js"></script>

</body>

</html>