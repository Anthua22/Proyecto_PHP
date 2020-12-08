<?php
namespace  FUTAPP\app\controllers;

use Exception;
use FUATAPP\app\entity\Equipo;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\core\App;
use FUTAPP\core\Response;

class EquiposController{

    public function inicio(){

        $equipos = App::getRepository(EquiposRepository::class)->findAll();

        Response::renderView('index',[
            'equipos'=>$equipos,

        ]);
    }

    public function addEquipo()
    {
        return require __DIR__.'/../views/agregarEquipo.php';
    }
    public function nuevoEquipo():void{
        $equipoRepository = new EquiposRepository();

        try{
            $equipoRepository->getConnection()->beginTransaction();
            $direccion = $_POST['direccion']??'';
            $nombre = $_POST['nombre']??'';
            $correo = $_POST['correo']??'';
            $imagenBLL = new ImagenFutappBLL($_FILES['imagen']);
            $imagenBLL->uploadImagen();
            $nombreImagen = $imagenBLL->getUploadedFileName();
            $equipo = new Equipo();
            $equipo->setNombre($nombre);
            $equipo->setCorreo($correo);
            $equipo->setFoto($nombreImagen);
            $equipo->setDireccionCampo($direccion);

            $equipoRepository->save($equipo);
            $equipoRepository->getConnection()->commit();

            App::get('router')->redirect('equipos');
        }catch (Exception $e){
            $equipoRepository->getConnection()->rollBack();
        }   die('No se pudo insertar al equipo');
    }
}