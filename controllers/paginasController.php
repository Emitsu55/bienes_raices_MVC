<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController {
    public static function index(Router $router) {

        
        $propiedades = Propiedad::get(3);
        $inicio = true;
        
        $router->render('home/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    
    public static function nosotros(Router $router) {

        $router->render('home/nosotros', [
            'inicio' => false
        ]);
        
    }
    
    public static function propiedades(Router $router) {
        
        $propiedades = Propiedad::all();
        
        $router->render('home/propiedades', [
            'propiedades' => $propiedades,
            'inicio' => false
            
        ]);
        
    }
    
    public static function propiedad(Router $router) {
        
        
        $id = validarORedir('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('home/propiedad', [
            'inicio' => false,
            'propiedad' => $propiedad
        ]);

    }

    public static function blog(Router $router) {

        $router->render('home/blog', [
            'inicio' => false
        ]);

    }

    public static function entrada(Router $router) {

        $router->render('home/entrada', [
            'inicio' => false
        ]);

    }

    public static function contacto(Router $router) {

        $router->render('home/contacto', [
            'inicio' => false
        ]);

    }
}