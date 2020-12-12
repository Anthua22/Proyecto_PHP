<?php
require_once __DIR__.'/controllers/FutAppController.php';
require_once __DIR__.'/controllers/EquiposController.php';
require_once __DIR__.'/controllers/UsuariosController.php   ';
require_once __DIR__.'/../core/App.php';

$router = App::get('router');
$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');
$router->get('arbitros',FutAppController::class,'showArbitros');
$router->get('add-equipo',FutAppController::class,'formAddEquipo');
$router->get('add-partido',FutAppController::class,'addPartidoForm');
$router->get('equipos/:id',EquiposController::class,'showEquipo');
$router->get('equipos/:id/update',EquiposController::class,'showFormUpdate');
$router->get('login',UsuariosController::class,'login');
$router->get('logout',UsuariosController::class,'logout');
$router->get('register',FutAppController::class,'registerForm');


$router->post('check-login',UsuariosController::class,'checkLogin');

$router->delete(
    '/:id',
    FutAppController::class,
    'deleteJson'
);


$router->post('equipos/:id/update',EquiposController::class,'update');
$router->post('add-partido',FutAppController::class,'addPartido');
$router->post('add-equipo',EquiposController::class,'addEquipo');
