<?php
require_once __DIR__.'/controllers/FutAppController.php';
require_once __DIR__.'/controllers/EquiposController.php';
require_once __DIR__.'/../core/App.php';

$router = App::get('router');
$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');
$router->get('arbitros',FutAppController::class,'showArbitros');
$router->get('add-equipo',FutAppController::class,'formAddEquipo');
$router->get('add-partido',FutAppController::class,'addPartidoForm');

$router->post('add-partido',FutAppController::class,'addPartido');
$router->post('add-equipo',EquiposController::class,'addEquipo');
