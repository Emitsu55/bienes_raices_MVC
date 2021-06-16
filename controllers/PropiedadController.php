<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController
{
    public static function index(Router $router)
    { //con esos parametros mantiene la referencia a la instancia

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = $_GET['resultado'] ?? null;


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {

                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {

                    if ($_POST['tipo'] === 'propiedad') {
                        //traer el objeto completo
                        $propiedad = Propiedad::find($id);

                        //Eliminar la propiedad
                        $propiedad->eliminar();
                    } else if ($_POST['tipo'] === 'vendedor') {
                        //traer el objeto completo
                        $vendedor = Vendedor::find($id);

                        //Eliminar el vendedor
                        $vendedor->eliminar();
                    }
                }
            }
        }


        $router->render('propiedades/admin', [

            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado

        ]);
    }

    public static function crear(Router $router)
    {

        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        //Arreglo con mensajes de error
        $errores = Propiedad::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear la nueva instancia    
            $propiedad = new Propiedad($_POST['propiedad']);

            //Generar nombre unico para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            //Setear la imagen
            //Realizar un resize a la imagen con intervention image

            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImage($nombreImagen);
            }

            //Validacion    
            $errores = $propiedad->validar();

            //Revisar que el Array de errores este vacio

            if (empty($errores)) {


                //crear carpetas
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);  //Crea la carpeta
                }

                //Subida de archivos
                //Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //insertar a la base de datos 
                $resultado = $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }


    public static function actualizar(Router $router)
    {

        $id = validarORedir('/panel/admin');

        $propiedad = Propiedad::find($id);

        //consulta para obtener los vendedores
        $vendedores = Vendedor::all();
        //Lista de errores
        $errores = Propiedad::getErrores();

        //Ejecutar el codigo despues del envio de formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            //Validacion
            $errores = $propiedad->validar();


            if ($_FILES['propiedad']['tmp_name']['imagen']) {

                //Generar nombre unico para la imagen
                $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
                //Modificar la imagen con intervention image
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                //Asignarle el nombre a la imagen
                $propiedad->setImage($nombreImagen);
            }

            if (empty($errores)) {

                if (isset($image)) {
                    //Subida de archivos
                    //Guardar la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                //insertar a la base de datos
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
            ]);
    
    }
       
        public static function eliminar() 
        {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                //VALIDAR ID
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                
                if($id){
                    $tipo = $_POST['tipo'];
                    if(validarTipoContenido($tipo)){
                        $propiedad = Propiedad::find($id);
                        $propiedad->eliminar();
                    }
                }
            }
            
    
        }
}
    