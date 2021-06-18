<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {


        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('home/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('home/nosotros', [
            'inicio' => false
        ]);
    }

    public static function propiedades(Router $router)
    {

        $propiedades = Propiedad::all();

        $router->render('home/propiedades', [
            'propiedades' => $propiedades,
            'inicio' => false

        ]);
    }

    public static function propiedad(Router $router)
    {


        $id = validarORedir('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('home/propiedad', [
            'inicio' => false,
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {

        $router->render('home/blog', [
            'inicio' => false
        ]);
    }

    public static function entrada(Router $router)
    {

        $router->render('home/entrada', [
            'inicio' => false
        ]);
    }

    public static function contacto(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Acceder al contenido de POST

            $respuestas = $_POST['contacto'];

            //Crear nueva instancia de php mailer
            $mail = new PHPMailer();

            //Configurar SMTP (Protocolo que se utiliza para envio de emails)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;
            $mail->Username = 'c1a89565a964df';
            $mail->Password = 'e6f25391ada5ed';

            //Configurar contenido del email
            $mail->setFrom('admin@bienesraices.com'); //Quien envia el email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); //A quien se envia
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar html
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Definir contenido
            $contenido = '<html>';
            $contenido .='<p>Tienes un nuevo mensaje</p>'; 
            $contenido .='<p>Nombre: ' . $respuestas['nombre'] . '</p>'; 
            $contenido .='<p>Mensaje: ' . $respuestas['mensaje'] . '</p>'; 
            $contenido .='<p>Nombre: ' . $respuestas['nombre'] . '</p>'; 
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Texto alternativo sin html';

            //Enviar el email
            if ($mail->send()) {
                echo 'Mensaje enviado correctamente';
            } else {
                debuguear($mail);
                echo 'El mensaje no se pudo enviar';
            }
        }

        $router->render('home/contacto', [
            'inicio' => false
        ]);
    }
}
