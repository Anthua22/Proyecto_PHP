<?php


use FUTAPP\app\controllers\EquiposController;
use FUTAPP\app\controllers\FutAppController;
use FUTAPP\app\controllers\MensajesController;
use FUTAPP\app\controllers\UsuariosController;
use FUTAPP\core\App;

$router = App::get('router');

$router->get('',FutAppController::class,'inicio');
$router->get('equipos',FutAppController::class,'showEquipos');
$router->get('arbitros',FutAppController::class,'showArbitros');
$router->get('add-equipo',FutAppController::class,'formAddEquipo','admin');
$router->get('add-partido',FutAppController::class,'addPartidoForm','admin');
$router->get('mis-partidos/:id/terminado',FutAppController::class,'formResultObser','arbitro');
$router->get('equipos/:id',EquiposController::class,'showEquipo');
$router->get('equipos/:id/update',EquiposController::class,'showFormUpdate','admin');
$router->get('login',UsuariosController::class,'login');
$router->get('logout',UsuariosController::class,'logout');
$router->get('register',FutAppController::class,'registerForm');
$router->get('mis-partidos',UsuariosController::class,'showPartidos','arbitro');
$router->get('mis-partidos/asc',UsuariosController::class,'filtroAsc','arbitro');
$router->get('mis-partidos/desc',UsuariosController::class,'filtroDesc','arbitro');
$router->get('my',UsuariosController::class,'showPerfil','arbitro');
$router->get('image-generate',UsuariosController::class,'generateCapcha');
$router->get('mi-bandeja',UsuariosController::class,'showBandejaMensajes','arbitro');
$router->get('perfil/:id',UsuariosController::class, 'perfil');
$router->get('arbitros/:id/update',UsuariosController::class,'showupdate','arbitro');
$router->get('arbitros/:id/updatepass',UsuariosController::class,'showupdatePass','arbitro');
$router->get('mensajes/:id/mis-mensajes',MensajesController::class,'showMensajes','arbitro');
$router->get('mensajes/mis-mensajes/:id',MensajesController::class,'showChat','arbitro');
$router->get('mensajes/:id',MensajesController::class,'sendOneMessageForm','arbitro');

$router->post('mensajes/:id',MensajesController::class,'sendOneMessage','arbitro');
$router->post('login',UsuariosController::class,'checkLogin');
$router->post('arbitros/:id/update',UsuariosController::class,'updatePerfil','arbitro');
$router->post('arbitros/:id/updatepass',UsuariosController::class,'updatePass','arbitro');
$router->post('mensajes/mis-mensajes/:id',MensajesController::class,'send','arbitro');
$router->post('register',UsuariosController::class,'register');
$router->post('equipos/:id/update',EquiposController::class,'update');
$router->post('add-partido',FutAppController::class,'addPartido');
$router->post('add-equipo',EquiposController::class,'addEquipo');
$router->post('mis-partidos/:id/terminado',FutAppController::class,'setResultObser','arbitro');
$router->delete('arbitros/:id',UsuariosController::class,'deleteJson','admin');
$router->delete('partidos/:id',FutAppController::class,'deleteJson','arbitro');

$router->delete('equipos/:id',EquiposController::class,'deleteJson','admin');