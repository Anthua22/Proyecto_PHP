<?php
require_once __DIR__.'/../repository/EquiposRepository.php';
require_once __DIR__.'/../repository/UsuariosRepository.php';
require_once __DIR__.'/../../core/Response.php';
require_once __DIR__.'/../BLL/ImagenFutappBLL.php';
require_once __DIR__.'/../../core/App.php';

class FutAppController
{
    public function inicio()
    {
        Response::renderView('index', [

        ]);
    }

    public function formAddEquipo()
    {
        Response::renderView('addEquipo', [
        ]);
    }



    public function showEquipos()
    {
        $equipoRepository = new EquiposRepository();
        $equipos = $equipoRepository->findAll();
        Response::renderView('equipos',[
            'equipos'=>$equipos
        ]);
    }

    public function showArbitros()
    {
        $arbitrosRepository = new UsuariosRepository();
        $arbitros = $arbitrosRepository->getAllArbitros();
        Response::renderView('arbitros',[
            'arbitros'=>$arbitros
        ]);
    }

    public function addPartidoForm(){
        $equiposRepository = new EquiposRepository();
        $equipos = $equiposRepository->findAll();

        $arbitrosRepository = new UsuariosRepository();
        $arbitros = $arbitrosRepository->getAllArbitros();
        Response::renderView('addPartido',[
            'arbitros' =>$arbitros,
            'equipos'=>$equipos
        ]);
    }

    public function addPartido(){

    }
}