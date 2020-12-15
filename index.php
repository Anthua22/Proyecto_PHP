<?php

use FUTAPP\APP\REPOSITORY\UsuariosRepository;
use FUTAPP\CORE\App;
use FUTAPP\core\Request;
use FUTAPP\core\Router;

require __DIR__.'/core/bootstrap.php';


if(isset($_SESSION['usuario'])){
    $usuario = App::getRepository(UsuariosRepository::class)->find($_SESSION['usuario']);
}else{
    $usuario = null;
}
App::bind('user',$usuario);

Router::load(__DIR__.'/app/routes.php');


App::get('router')->direct(Request::uri(), Request::method());