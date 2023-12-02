<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Website-Externo/css/recuperacionContraseña.css">
    <script src="https://kit.fontawesome.com/9ed7eb7a61.js" crossorigin="anonymous"></script>
  </head>
  <body class="bg-dark">
    
    <section>
        <!-- clase g-0, nos borra el scroll que tenia en el eje x -->
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <!-- aca traemos el carrusel de bootsrap -->
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <!-- clase min-vh-100 ajusta la imagen de altura al 100% de la pantalla -->
                        <div class="carousel-item img-1 min-vh-100 active">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="font-weight-bold color">La mas potente del mercado</h5>
                                <a href="#" class="text-muted text-decoration-none destacado">Visita nuestra tienda</a>
                            </div>
                        </div>
                        <div class="carousel-item img-2 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="font-weight-bold color">Descubre la nueva generacion</h5>
                                <a href="#" class="text-muted text-decoration-none destacado">Visita nuestra tienda</a>
                            </div>
                        </div>
                        <div class="carousel-item img-3 min-vh-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5 class="font-weight-bold color">La mas potente del mercado</h5>
                                <a href="#" class="text-muted text-decoration-none destacado">Visita nuestra tienda</a>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100">
                <!-- clase px-lg-5 define un padding en los lados en los dispositivos largos(grandes), -->
                <!-- clase pt-lg-4 Define un padding superior en los dispositivos largos(grandes) -->
                <!-- clase pb-lg-3 define un padding inferior en los dispositivos largos(grandes) -->
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100 mb-auto">
                    <img src="../Extras/Logos/logo-trnasparente.png" class="img-fluid custom-img mx-auto">
                </div>
                <div class="px-lg-5 py-lg-4 p-4 w-100 align-self-center">
                    <!-- clase text-light cambia el color del texto a blanco -->
                    <!-- clase font-weight-bold usar negrita en el titulo, y la clase mb-4para que tenga un padding inferior -->
                    <h1 class="font-weight-bold mb-4">Restablecer Contraseña</h1>
                    <!-- Importamos el fomrulario de boostrap -->
                    <!-- clase mb-5 le da mas espacio al p que dice o inicia sesion con -->
                    <form action="../../Controller/reasignarClave.php" method="POST" class="mb-5">
                        <!-- clase m-b4 sera mayor la distancia entre los input -->
                        <div class="mb-4">
                          <label for="exampleInputEmail1" class="form-label font-weight-bold">Identificacion</label>
                          <input type="number" name="id_usuario" class="form-control bg-dark-x border-0 margin" placeholder="Identificacion" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                          <label for="exampleInputEmail1" class="form-label font-weight-bold">Email</label>
                          <input type="email" name="email_usuario" class="form-control bg-dark-x border-0 mb-2 margin" placeholder="Correo Electronico" id="exampleInputPassword1">
                        </div>
                        <!-- la clase w-100 estira el boton a lo ancho del 100% del contenedor -->
                        <button type="submit" class="btn btn-primary w-100 login">Restablecer Contraseña</button>
                    </form>
                </div>
                <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 w-100 mt-auto">
                    <p class="d-inline-block mb-0">¿De vuelta?</p> <a href="iniciarSesion.php" target="_blank" class="text-primary font-weight-bold text-decoration-none register">Ingresar</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Inicializa el carrusel después de que la página esté completamente cargada
            var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleCaptions'));
        });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://kit.fontawesome.com/9ed7eb7a61.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>