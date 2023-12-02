<?php
    function mostrarPerfilProveedor($id_usuario){

        // Traemos la informacion de los usuarios desde el modelo, a partir de la clase y la funcion
        $objConsultas = new Consultas();
        $result = $objConsultas->mostrarPerfilProveedor($id_usuario);

        if (!isset($result)) {
            echo '<h2>No Hay Datos de tu perfil Registrados en el Sistema</h2>';
        }else {
            foreach ($result as $f) {
                echo '
                    <div class="card-user card-centered">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="' . $f['foto_usuario'] . '" class="card-img-top imagen-ancho-completo" alt="Foto de usuario">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
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
                                    <p class="card-text mt-3 resultado"> Identificacion: ' . $f['id_usuario'] . '</p>
                                    <p class="card-text mt-3 resultado-admin"> Tipo Documento: ' . $f['tipo_documento_usuario'] . '</p>
                                    <p class="card-text mt-3 resultado-admin"> Fecha de Nacimiento: ' . $f['fecha_nacimiento_usuario'] . '</p>
                                    <p class="card-text mt-3 resultado-admin"> Email: ' . $f['email_usuario'] . '</p>
                                    <p class="card-text mt-3 resultado-admin"> Telefono: ' . $f['telefono_usuario'] . '</p>
                                    <p class="card-text mt-3 resultado-admin"> Estado: ' . $f['estado_usuario'] . '</p>
                                    <a href="modificarPerfilProveedor.php?id_user=' . $f['id_usuario'] . '" class="btn btn-primary admin"> ACTUALIZAR DATOS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
    }
    // Funcion para mostrar la info del usuario a modificar en un formulario
    function cargarPerfilProveedor($id_usuario){
        $id_user = $_GET['id_user'];

        $objConsultas = new Consultas();
        $result = $objConsultas->buscarPerfilProveedor($id_user);

        foreach ($result as $f) {
            echo '
                <form action="../../Controller/modificarProveedor/modificarUserProveedor.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6">
                            <label>FOTO</label>
                            <img src="' . $f['foto_usuario'] . '" width="100px" alt="Foto de Usuario">
                            <input type="file"  accept=".png, .jpg, .gif" name="foto_usuario" class="form-control" >
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NUMERO IDENTIFICACION</label>
                            <input type="number" class="form-control" placeholder="Ingrese el numero" name="id_usuario" required="required" readonly value="' . $f['id_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>TIPO DE DOCUMENTO</label>
                            <select name="tipo_documento_usuario" id="" class="form-control">
                                <option value="' . $f['tipo_documento_usuario'] . '"> ' . $f['tipo_documento_usuario'] . ' </option>
                                <option value="CC">CC</option>
                                <option value="CE">CE</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>NOMBRES</label>
                            <input type="text" class="form-control" placeholder="Ingrese los nombres" name="nombres_usuario" value="' . $f['nombres_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>APELLIDOS</label>
                            <input type="text" class="form-control" placeholder="Ingrese los apellidos" name="apellidos_usuario" value="' . $f['apellidos_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>EMAIL</label>
                            <input type="email" class="form-control" placeholder="Ingrese un email" name="email_usuario" value="' . $f['email_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>TELEFONO</label>
                            <input type="number" class="form-control" placeholder="Ingrese un numero de telefono" name="telefono_usuario" value="' . $f['telefono_usuario'] . '">
                        </div>
                        <div class="form-group col-lg-4 col-md-6">
                            <label>CONTRASEÑA</label>
                            <input type="password" class="form-control" placeholder="Ingrese una Contraseña" name="clavemd" value="' . $f['clavemd'] . '">
                        </div>
                        <button type="submit" class="btn btn-primary">Modificar Datos</button>
                    </div>
                </form>
            ';
        }

    }

?>