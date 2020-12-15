<?php


use FUTAPP\app\controllers\EquiposController;
use FUTAPP\app\controllers\FutAppController;
use FUTAPP\app\controllers\UsuariosController;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\core\App;

$router = App::get('router');

$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');
$router->get('arbitros',FutAppController::class,'showArbitros');
$router->get('add-equipo',FutAppController::class,'formAddEquipo','admin');
$router->get('add-partido',FutAppController::class,'addPartidoForm','admin');
$router->get('equipos/:id',EquiposController::class,'showEquipo');
$router->get('equipos/:id/update',EquiposController::class,'showFormUpdate','admin');
$router->get('login',UsuariosController::class,'login');
$router->get('logout',UsuariosController::class,'logout');
$router->get('register',FutAppController::class,'registerForm');
$router->get('mis-partidos',UsuariosController::class,'showPartidos','arbitro');
$router->get('my',UsuariosController::class,'showPerfil','arbitro');
$router->get('image-generate',UsuariosController::class,'generateCapcha');
$router->get('mi-bandeja',UsuariosController::class,'showBandejaMensajes','arbitro');
$router->get('perfil/:id',UsuariosController::class, 'perfil');
$router->get('arbitros/:id/update',UsuariosController::class,'showupdate','arbitro');

$router->post('login',UsuariosController::class,'checkLogin');
$router->post('arbitros/:id/update',UsuariosController::class,'updatePerfil','arbitro');


$router->post('register',UsuariosController::class,'register');
$router->post('equipos/:id/update',EquiposController::class,'update');
$router->post('add-partido',FutAppController::class,'addPartido');
$router->post('add-equipo',EquiposController::class,'addEquipo');


$router->delete('partidos/:id',FutAppController::class,'deleteJson','arbitro');

$router->delete('equipos/:id',EquiposController::class,'deleteJson','admin');