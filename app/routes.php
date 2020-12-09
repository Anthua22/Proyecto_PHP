<?php
require_once __DIR__.'/controllers/FutAppController.php';
require_once __DIR__.'/../core/App.php';

$router = App::get('router');
$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');
$router->get('arbitros',FutAppController::class,'showArbitros');
$router->get('add-equipo',FutAppController::class,'formAddEquipo');
$router->post('add-equipo',FutAppController::class,'addEquipo');


/*
return [
    ''=>'app/controllers/index.php',
    'login'=>'app/controllers/login.php',
    'equipos'=>'app/controllers/equipos.php',
    'add-equipo'=>'app/controllers/'
];
*/