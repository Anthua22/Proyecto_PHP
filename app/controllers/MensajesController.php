<?php


namespace FUTAPP\app\controllers;


use FUTAPP\app\entity\DistinctEmisor;
use FUTAPP\app\entity\DistinctReceptor;
use FUTAPP\app\entity\Mensajes;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\repository\MensajeRepository;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\core\App;
use FUTAPP\core\Response;

class MensajesController
{
    public function showMensajes()
    {

        $mensajeRepository = new MensajeRepository();

        $user = App::get('user');
        if (!is_null($user)) {

            $emisores = $mensajeRepository->getMensajes('-1');
            $mensajes = $mensajeRepository->getAllMensajeUser($emisores,'-1','0');

            $mff = null;
            Response::renderView('mensajes', [
                'mensajes' => $mensajes,
                'mensajesChat' => $mff,
                'emisores' => $emisores
            ]);
        }

    }

    private function usersMix(array $emisores){
        $mensajeRepository = new MensajeRepository();
        $receptores = $mensajeRepository->getMensajesReceptor(DistinctReceptor::class);
        foreach ($emisores as $emisore){
            foreach ($receptores as $receptore){
                if($emisore->getEmisor() !==$receptore->getReceptor()){
                    $nwrecp = new DistinctEmisor();
                    $nwrecp->setEmisorr($receptore->getReceptor());
                    array_push($emisores,$nwrecp);
                }
            }
        }

    }

    public function showChat(string $id)
    {
        $mensajeRepository = new MensajeRepository();
        $mensaje = $mensajeRepository->find($id);

        $user = App::get('user');


        $emisores = $mensajeRepository->getMensajes(DistinctEmisor::class,$mensaje);
        $mensajesss = $mensajeRepository->getAllMensajeUser($emisores,$mensaje->getEmisor().'',$mensaje->getReceptor().'');
        $mensajes = $mensajeRepository->getMensajeChat($mensaje);
        $mg = '';
        $this->usersMix($emisores);
        Response::renderView('mensajes', [
            'mensajesChat' => $mensajes,
            'mensajes' => $mensajesss,
            'mensajeSelecionado' => $mg,
            "emisores" => $emisores
        ]);
    }

    public function send(string $id)
    {
        $mensaRepository = new MensajeRepository();
        $mensaje = $mensaRepository->find($id);
        $mensajesend = htmlspecialchars($_POST['mensaje']);
        $user = App::get('user');

        $mensajeEnviar = new Mensajes();
        $hora = new \DateTime();
        $mensajeEnviar->setHora($hora->format('Y-m-d H:i:s'));
        $mensajeEnviar->setEmisor($user->getId());
        if ($mensaje->getReceptor() !== $user->getId()) {
            $mensajeEnviar->setReceptor($mensaje->getReceptor());
        } else {
            $mensajeEnviar->setReceptor($mensaje->getEmisor());
        }
        $mensajeEnviar->setMensaje($mensajesend);
        $mensaRepository->save($mensajeEnviar);

        App::get('router')->redirect('mensajes/mis-mensajes/' . $id);

    }

    public function sendOneMessageForm(string $id)
    {

        $usuario = App::getRepository(UsuariosRepository::class)->find($id);
        $msg=  FlashMessage::get('send_ok');


        Response::renderView('onemensaje',[
            '_usuario'=>$usuario,'mensaje'=>$msg
        ]);
    }

    public function sendOneMessage(string $id){
        $mensaRepository = new MensajeRepository();
        $mensaje = htmlspecialchars($_POST['mensaje']);
        $user = App::get('user');
        $mensajeEnviar = new Mensajes();
        $hora = new \DateTime();
        $mensajeEnviar->setHora($hora->format('Y-m-d H:i:s'));
        $mensajeEnviar->setEmisor($user->getId());
        $mensajeEnviar->setMensaje($mensaje);
        $mensajeEnviar->setReceptor($id);
        $mensaRepository->save($mensajeEnviar);
        FlashMessage::set('send_ok','Se ha enviado el mensaje correctamente, ve a tu perfil a mirar tus mensajes para comprobarlo');
        App::get('router')->redirect('mensajes/'.$id);
    }

}