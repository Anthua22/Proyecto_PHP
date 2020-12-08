<?php

use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\core\App;
use FUTAPP\core\Request;
use FUTAPP\core\Router;

/*$equiporepository = new EquiposRepository();
$equipos = $equiporepository->findAll();

$usuariosrepository = new UsuariosRepository();

*/
require __DIR__.'/../views/index.view.php';

Router::load(__DIR__.'/../app/routes.php');


App::get('router')->direct(Request::uri());
