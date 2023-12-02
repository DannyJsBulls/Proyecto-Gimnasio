<?php 
    // IMPORTAMO LIBRERIA PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exeception;

    require_once("../PHPMailer/Exception.php");
    require_once("../PHPMailer/Sesion.php");
    require_once("../PHPMailer/PHPMailer.php");
    require_once("../Model/validarSesion.php");
    require_once("../Model/conexion.php");

    class ReasignarClave {
        public function resetearClave ($id_usuario, $email_usuario){
            $f=null;
            $objConexion = new Conexion;
            $conexion = $objConexion->get_conexion();

            $consultar ="SELECT * FROM usuarios WHERE id_usuario=:id_usuario AND email_usuario =:email_usuario";
            $result = $conexion->prepare ($consultar);
            
            $result->bindParam (":id_usuario", $id_usuario);
            $result->bindParam (":email_usuario", $email_usuario);

            $result->execute();
            $f=$result->fetch();

            if ($f){
                # generamos la nueva clave a partir de un codigo aleatorio(8)
                $caracteres = "0123456789abcdefghijklmnopqrstuvwyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $longitud = 8;
                $newClave = substr(str_shuffle($caracteres),0,$longitud);
                //Encriptamos la nueva clave
                $clavemd =md5($newClave);
                
                $actualizarC = "UPDATE usuarios SET clavemd=:clavemd WHERE id_usuario=:id_usuario";
                $result = $conexion->prepare($actualizarC);

                $result->bindParam(":id_usuario", $id_usuario);
                $result->bindParam(":clavemd", $clavemd);

                $result->execute();

                //LÓGICA DE REASIGNACIÓN Y ACTUALIZACIÓN
                $emailFor=$f['email_usuario'];

                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

            try {
                //Server settings
                //configuración de acceso al servidor de gmail para enviar los mails
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'ddmasolutions@gmail.com';                     //SMTP username
                $mail->Password   = 'waqiqwjhuvpmbiaq';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                //Emisor: desde donde se envia el mensaje
                $mail->setFrom('ddmasolutions@gmail.com', 'Suport D.M.A Solutions');
                // Reseptor: Quien va a recibir el mensaje
                $mail->addAddress($emailFor);     //Add a recipient
                //$mail->addAddress('ellen@example.com');               //Name is optional
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true); 
                $mail->CharSet = "UTF-8";                                 //Set email format to HTML
                // Asunto del email
                $mail->Subject = 'GYM DDMAA SOLUTIONS - Reestablecimiento de contraseña';
                // Cuerpo del mensaje
                $mail->Body = '
                    <!DOCTYPE html
                    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">

                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                            <title>NOTIFICACION LIVING SAFE</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                        </head>

                        <body style="margin: 0; padding: 0;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 10px 0 30px 0;">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="600"
                                            style="border: 1px solid #cccccc; border-collapse: collapse;">
                                            <tr>
                                                <td align="center" bgcolor="#212121"
                                                    style="padding: 20px 0 20px 0; color: #ffffff; font-size: 28px; font-weight: bold; font-family: Arial, sans-serif;">
                                                    <img src="https://dannyjsbulls.github.io/Logo-Proyecto/" alt="Logo" width="120"
                                                        height="120" style="display: block;" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#212121" style="padding: 40px 30px 40px 30px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center"
                                                                style="color:#FFFFFF; font-family: Arial, sans-serif; font-size: 24px;">
                                                                <b>RECUPERACIÓN DE CONTRASEÑA</b>
                                                            </td>
                                                        </tr><tr>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                                            &nbsp;
                                                                        </td>
                                                                        <td width="400" valign="top">
                                                                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                <tr>
                                                                                    <td align="center">
                                                                                    <p style="color:#fff; font-size:22px; padding-top: 30px">Hola apreciado usuario tu nueva clave de acceso para nuestro sistema es: </p>
                                                                                    <p style="color:#fff; font-size:25px; padding-top: 30px">'.$newClave.' </p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center"
                                                                                        style="padding: 0; color: #FFFFFF; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">

                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td style="font-size: 0; line-height: 0;" width="100">
                                                                            &nbsp;
                                                                        </td>

                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#14ffec" style="padding: 30px 30px 30px 30px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td align="center"
                                                                style="color: #010A43; font-family: Arial, sans-serif; font-size: 14px;"
                                                                width="75%; text-aling:center">
                                                                &reg; DDMA-Gym-soft-solutions.com - 2023<br />
                                                                <a href="https://www.youtube.com/@codingnow6059" target="_blank"
                                                                    style="color: #010A43;">
                                                                    <font color="#010A43">www.DDMA-Gym-soft-solutions.com.co/</font>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>
                ';
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo '<script>alert("Se ha enviado una nueva contraseña a tu correo electronico! ")</script>';
                echo "<script> location.href='../Views/Extras/iniciarSesion.php'</script>";
            } 
            catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            }else{
                echo '<script>alert("¡Los datos ingresados no coinciden con la base de datos!")</script>';
                echo "<script> location.href='../Views/Extras/recuperarContraseña.php'</script>";
            }
        }
    }

    // capturamos en variables los valores enviados desde el formualrio
    // atraves del method post y los name de los campos
    $id_usuario = $_POST['id_usuario'];
    $email_usuario = $_POST['email_usuario'];
    // Creamos el objeto a partir de la clase validar sesion
    $objRclave = new ReasignarClave();
    $result = $objRclave->resetearClave($id_usuario, $email_usuario);
?>