<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    
    public static function crear(Router $router)
    {

        $vendedor = new Vendedor();
        //Arreglo con mensajes de error
        $errores = Vendedor::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crear la nueva instancia    
            $vendedor = new Vendedor($_POST['vendedor']);

            //Validacion    
            $errores = $vendedor->validar();

            //Revisar que el Array de errores este vacio

            if (empty($errores)) {
                //insertar a la base de datos 
                $resultado = $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }


    public static function actualizar(Router $router)
    {

        $id = validarORedir('/panel/admin');

        $vendedor = Vendedor::find($id);

        //consulta para obtener los vendedores
        $vendedores = Vendedor::all();
        //Lista de errores
        $errores = Vendedor::getErrores();

        //Ejecutar el codigo despues del envio de formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            //Asignar los atributos
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);

            //Validacion
            $errores = $vendedor->validar();

            if (empty($errores)) {

                //insertar a la base de datos
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
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
                        $vendedor = Vendedor::find($id);
                        $vendedor->eliminar();
                    }
                }
            }
            
    
        }
}
    