<?php

namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\entity\Partido;
use FUTAPP\app\helpers\Emails;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\helpers\GenerateCaptcha;
use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\core\App;
use FUTAPP\core\Response;


class FutAppController
{
    public function inicio()
    {

        $partidosRepository = new PartidoRepository();
        $partidos = $partidosRepository->findAll();

        Response::renderView('index', [
            'partidos' => $partidos
        ]);
    }


    public function formAddEquipo()
    {
        Response::renderView('addEquipo');
    }

    public function showEquipos()
    {
        $equipoRepository = new EquiposRepository();
        $equipos = $equipoRepository->findAll();
        Response::renderView('equipos', [
            'equipos' => $equipos
        ]);
    }

    public function registerForm()
    {
        $usuario = App::get('user');
        if(is_null($usuario)){
            $imagen = new GenerateCaptcha();
            $imagen->generateColors();
            $imagen->generateTextColor();
            $imagen->setText();

            Response::renderView('register', [

            ]);
        }else{
            App::get('router')->redirect('');
        }

    }

    public function notFound()
    {
        header ('HTTP/1.1 404 Not Found', true, 404);
        Response:: renderView ('404');
    }

    public function showArbitros()
    {
        $arbitrosRepository = new UsuariosRepository();
        $arbitros = $arbitrosRepository->getAllArbitros();
        Response::renderView('arbitros', [
            'arbitros' => $arbitros
        ]);
    }

    public function addPartidoForm()
    {

        $errorAddPartido = FlashMessage::get('error_addPartido');
        $hora = FlashMessage::get('hora');
        $minutos = FlashMessage::get('minutos');
        $fecha = FlashMessage::get('fecha');
        $arbitro = FlashMessage::get('arbitro');
        $equipolocal = FlashMessage::get('equipolocalSeleccionado');
        $direccion = FlashMessage::get('direccion');


        $equiposRepository = new EquiposRepository();
        $equipos = $equiposRepository->findAll();
        $arbitrosRepository = new UsuariosRepository();
        $arbitros = $arbitrosRepository->getAllArbitros();
        Response::renderView('addPartido', [
            'arbitros' => $arbitros,
            'equipos' => $equipos,
            'error_addPartido' => $errorAddPartido,
            'hora' => $hora,
            'fecha' => $fecha,
            'minutos' => $minutos,
            'equipolocalSeleccionado' => $equipolocal,
            'arbitroSeleccionado' => $arbitro,
            'direccion' => $direccion
        ]);
    }

    private function deletePartido(string $id)
    {
        try {
            $partidoRespository = new PartidoRepository();
            $partidoRespository->getConnection()->beginTransaction();

            $partido = $partidoRespository->find($id);

            $partidoRespository->delete($partido);

            $partidoRespository->getConnection()->commit();
        } catch (Exception $exception) {
            $partidoRespository->getConnection()->rollBack();
            die('No se ha podido eliminar el partido');
        }
    }

    public function addPartido()
    {
        $partidoRepository = new PartidoRepository();
        try {
            $partidoRepository->getConnection()->beginTransaction();
            $equipoLocal = trim(htmlspecialchars($_POST['equiposlocales']));
            $equipoVisitante = trim(htmlspecialchars($_POST['equiposvisitantes']));
            $arbitro = trim(htmlspecialchars($_POST['arbitros']));
            $direccion = trim(htmlspecialchars($_POST['direccion']));
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $minutos = $_POST['minuto'];

            if ($equipoLocal === $equipoVisitante) {
                $error_addPartido = 'El equipo local no puede ser el mismo que el equipo visitante!!';
                FlashMessage::set('error_addPartido', $error_addPartido);
                FlashMessage::set('fecha', $fecha);
                FlashMessage::set('hora', $hora);
                FlashMessage::set('minutos', $minutos);
                FlashMessage::set('arbitro', $arbitro);
                FlashMessage::set('direccion', $direccion);
                FlashMessage::set('equipolocalSeleccionado', $equipoLocal);
                App::get('router')->redirect('add-partido');
            } else {
                $partido = new Partido();
                $partido->setDireccionEncuentro($direccion);
                $partido->setEquipoLocal($equipoLocal);
                $partido->setEquipoVisitante($equipoVisitante);
                $fecha_completo = $fecha . ' ' . $hora . ':' . $minutos . ':00';
                $partido->setFechaEncuentro($fecha_completo);
                $partido->setArbitro($arbitro);
                $partido->setResultado('-');
                $partidoRepository->save($partido);
                $partidoRepository->getConnection()->commit();


                $usuario_ = App::get('user');
                $mailer = new Emails($partido, $usuario_->getNombre() . ' ' . $usuario_->getApellidos());
                $mailer->sendDesignacion();



            }

        } catch (Exception $exception) {
            $partidoRepository->getConnection()->rollBack();
            die('No se ha podido asignar el partido');
        }
    }

    public function deleteJson(string $id)
    {

        $partid = App::getRepository(PartidoRepository::class)->find($id);
        $local = App::getRepository(PartidoRepository::class)->getEquipoLocal($partid)->getNombre();
        $visitante = App::getRepository(PartidoRepository::class)->getEquipoVisitante($partid)->getNombre();
        $this->deletePartido($id);
        header('Content-Type: application/json');

        echo json_encode([
            'error' => false,
            'mensaje' => "El partido $local vs $visitante   se ha eliminado correctamente"
        ]);
    }

}