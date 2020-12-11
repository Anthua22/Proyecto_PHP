<?php

require_once __DIR__ . '/../repository/EquiposRepository.php';
require_once __DIR__ . '/../../core/Response.php';
require_once __DIR__.'/../../core/App.php';
require_once __DIR__.'/../BLL/ImagenFutappBLL.php';

class EquiposController
{

    public function showEquipo(int $id)
    {
        $equipoRespository = new EquiposRepository();
        $partidoRespository = new PartidoRepository();


        $equipo = $equipoRespository->find($id);
        $partidos = $partidoRespository->getPartidosUnEquipo($id);
        Response::renderView('show-equipo', [
            'equipo' => $equipo,
            'partidos' => $partidos
        ]);

    }

    public function showFormUpdate(int $id)
    {
        $equipoRespository = new EquiposRepository();


        $equipo = $equipoRespository->find($id);
        Response::renderView('updateEquipo', [
            'equipo' => $equipo
        ]);
    }

    public function addEquipo()
    {
        $equipoRespository = new EquiposRepository();
        try {
            $equipoRespository->getConnection()->beginTransaction();
            $nombre = trim(htmlspecialchars($_POST['nombreEquipo']));
            $correo = trim(htmlspecialchars($_POST['correoEquipo']));
            $arrayfile = $_FILES['imagen'];
            $imagenBLL = new ImagenFutappBLL($arrayfile);
            $direccion = trim(htmlspecialchars($_POST['direccion']));
            $imagenBLL->uploadImagen();
            $foto = $imagenBLL->getUploadedFileName();

            $equipo = new Equipo();
            $equipo->setNombre($nombre);
            $equipo->setCorreo($correo);
            $equipo->setDireccionCampo($direccion);
            $equipo->setFoto($foto);

            $equipoRespository->save($equipo);
            $equipoRespository->getConnection()->commit();

            App::get('router')->redirect('equipos');
        } catch (Exception $exception) {
            $equipoRespository->getConnection()->rollBack();
            die('No se ha podido insertar el equipo');
        }
    }

    public function update(int $id)
    {
        $equipoRespository = new EquiposRepository();
        $equipoantiguo = $equipoRespository->find($id);

        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $imagen =$_FILES['foto']??'null';

        $equipo = new Equipo();

        if($imagen!== 'null'){
            $imagenBLL = new ImagenFutappBLL($imagen);
            $imagenBLL->uploadImagen();
            $foto = $imagenBLL->getUploadedFileName();
            $equipo->setFoto($foto);
        }else{
            $equipo->setFoto($equipoantiguo->getFoto());
        }


        $equipo->setNombre($nombre);
        $equipo->setCorreo($correo);
        $equipo->setDireccionCampo($direccion);
        $equipo->setId($id);

        $equipoRespository->update($equipo);
        App::get('router')->redirect('equipos/'.$id);


    }
}