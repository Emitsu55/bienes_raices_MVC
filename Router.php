<?php 

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn) { //Toma la url actual y la funcion asociada a esa url
        $this->rutasGET[$url] = $fn;
    } 

    public function comprobarRutas()
    {
        $url_actual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET') {

            $fn = $this->rutasGET[$url_actual] ?? null;
            
        }

        if($fn) {
            //La url existe y hay una funcion asociada
            call_user_func($fn, $this); //Nos permite llamar una funcion cuando no sabemos como se llama
        } else {
            echo "Pagina no encontrada";
        }
    }

    //Muestra una vista
    public function render($view, $datos = []) {

        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); //Almacena los datos en memoria 
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean(); //Limpia el almacenamiento en memoria despues de almacenar la variable
        include __DIR__ . "/views/layout.php";
    }
}