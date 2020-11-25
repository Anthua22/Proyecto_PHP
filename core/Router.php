<?php


namespace FUTAPP\core;



class Router
{

    private $routes = [
        'GET'=>[],
        'POST'=>[]
    ];


    public function post(string $uri, string $controller, string $action){
        $this->routes['POST'][$uri] = $controller . '@' . $action;
    }

    public static function load(string $file)
    {
        $route = new static;
        App::bind('router',$route);
        require $file;
    }

    public function redirect(string $path){
        header('location:/'.$path);
        exit;
    }
}