<?php


use FUTAPP\app\controllers\EquiposController;
use FUTAPP\core\App;

$router = App::get('router');

$router->post(
    'equipos',
    EquiposController::class,
    'nuevoEquipo'
);

$router->get('addequipo',EquiposController::class,'addEquipo');
