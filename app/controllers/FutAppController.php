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

        $partidosRepository = new PartidoRepository();
        $partidos = $partidosRepository->findAll();

        Response::renderView('index', [
            'partidos'=>$partidos
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
    public function registerForm(){

        Response::renderView('register',[

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

    private function deletePartido(int $id){
        try{
            $partidoRespository = new PartidoRepository();
            $partidoRespository->getConnection()->beginTransaction();

            $partido = $partidoRespository->find($id);

            $partidoRespository->delete($partido);

            $partidoRespository->getConnection()->commit();
        }catch (Exception $exception){
            $partidoRespository->getConnection()->rollBack();
            die('No se ha podido eliminar el partido');
        }
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

                $partido = new Partido();
                $partido->setDireccionEncuentro($direccion);
                $partido->setEquipoLocal($equipoLocal);
                $partido->setEquipoVisitante($equipoVisitante);
                $fecha_completo  = $fecha.' '.$hora.':'.$minutos.':00';
                $partido->setFechaEncuentro($fecha_completo);
                $partido->setArbitro($arbitro);

                $partidoRepository->save($partido);
                $partidoRepository->getConnection()->commit();




        }catch (Exception $exception){
            $partidoRepository->getConnection()->rollBack();
            die('No se ha podido asignar el partido');
        }
    }

    public function deleteJson(int $id){
        $this->deletePartido($id);

        header('Content-Type: application/json');

        echo json_decode([
            'error'=>false,
            'mensaje'=>"El partido con id $id se ha eliminado correctamente"
        ]);
    }

}