<?php
require_once __DIR__.'/controllers/FutAppController.php';
require_once __DIR__.'/../core/App.php';

$router = App::get('router');
$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');


/*
return [
    ''=>'app/controllers/index.php',
    'login'=>'app/controllers/login.php',
    'equipos'=>'app/controllers/equipos.php',
    'add-equipo'=>'app/controllers/'
];
*/