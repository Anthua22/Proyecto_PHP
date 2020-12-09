<?php
require_once __DIR__.'/../repository/EquiposRepository.php';
require_once __DIR__.'/../repository/UsuariosRepository.php';
require_once __DIR__.'/../repository/PartidoRepository.php';
require_once __DIR__.'/../../core/Response.php';
require_once __DIR__.'/../BLL/ImagenFutappBLL.php';
require_once __DIR__.'/../../core/App.php';
require_once __DIR__.'/../../app/entity/Partido.php';
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
        $partidoRepository = new PartidoRepository();
        try{
            $partidoRepository->getConnection()->beginTransaction();
            $equipoLocal = trim(htmlspecialchars($_POST['equiposlocales']));
            $equipoVisitante = trim(htmlspecialchars($_POST['equiposvisitantes']));
            $arbitro = trim(htmlspecialchars($_POST['arbitros']));
            $direccion = trim(htmlspecialchars($_POST['direccion']));
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $minutos = $_POST['minuto'];
            if($equipoLocal === $equipoVisitante){
                die('El equipo local y visitante tienen  que ser diferentes');
            }else{
                $partido = new Partido();
                $partido->setDireccionEncuentro($direccion);
                $partido->setIdEquipoLocal($equipoLocal);
                $partido->setIdEquipoVisitante($equipoVisitante);
                $fecha_completo  = $fecha.' '.$hora.':'.$minutos.':00';
                $partido->setFechaEncuentro($fecha_completo);
                $partido->setIdUsuario($arbitro);

                $partidoRepository->save($partido);
                $partidoRepository->getConnection()->commit();
            }



        }catch (Exception $exception){
            $partidoRepository->getConnection()->rollBack();
            die('No se ha podido asignar el partido');
        }
    }
}