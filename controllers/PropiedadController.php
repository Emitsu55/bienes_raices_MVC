<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;

class PropiedadController
{
    public static function index(Router $router) { //con esos parametros mantiene la referencia a la instancia

        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $resultado = null;

        $router->render('propiedades/admin', [
            
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado

        ]);
    }
    public static function crear() {
        echo 'crear';
    }
    public static function actualizar() {
        echo 'actualizar';
    }

}