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

    public function addEquipo()
    {
        $equipoRespository = new EquiposRepository();
        try{
            $equipoRespository->getConnection()->beginTransaction();
            $nombre = trim(htmlspecialchars($_POST['nombreEquipo']));
            $correo = trim(htmlspecialchars($_POST['correoEquipo']));
            $arrayfile = $_FILES['imagen'];
            $imagenBLL = new ImagenFutappBLL($arrayfile);
            $direccion = trim(htmlspecialchars($_POST['direccion']));
            $imagenBLL->uploadImagen();
            $foto =$imagenBLL->getUploadedFileName();

            $equipo = new Equipo();
            $equipo->setNombre($nombre);
            $equipo->setCorreo($correo);
            $equipo->setDireccionCampo($direccion);
            $equipo->setFoto($foto);

            $equipoRespository->save($equipo);
            $equipoRespository->getConnection()->commit();

            App::get('router')->redirect('equipos');
        }catch (Exception $exception){
            $equipoRespository->getConnection()->rollBack();
            die('No se ha podido insertar el equipo');
        }
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
}