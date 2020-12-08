<?php
require_once __DIR__.'/../repository/EquiposRepository.php';
require_once __DIR__.'/../../core/Response.php';

class FutAppController
{
    public function inicio()
    {
        Response::renderView('index', [

        ]);
    }

    public function addEquipo()
    {

    }

    public function showEquipos()
    {
        $equipoRepository = new EquiposRepository();
        $equipos = $equipoRepository->findAll();
        Response::renderView('equipos',[
            'equipos'=>$equipos
        ]);
    }
}