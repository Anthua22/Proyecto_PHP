<?php

require __DIR__ . '/core/bootstrap.php';
require_once __DIR__.'/core/Router.php';
require_once __DIR__.'/core/App.php';
require_once __DIR__.'/core/Request.php';
require_once __DIR__.'/app/controllers/UsuariosController.php';


if(isset($_SESSION['usuario'])){
    $usuario = App::getRepository(UsuariosRepository::class)->find($_SESSION['usuario']);
}else{
    $usuario = null;
}
App::bind('user',$usuario);

Router::load(__DIR__.'/app/routes.php');


App::get('router')->direct(Request::uri(), Request::method());
/*$uri = trim($_SERVER['REQUEST_URI'],'/');

require $routes[$uri];*/