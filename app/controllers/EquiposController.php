<?php
namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\entity\Equipo;
use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\core\App;
use FUTAPP\core\Response;

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
            $imagenBLL = new ImagenFutappBLL($arrayfile,'public/images/equipos');
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
        $equipo = new Equipo();

        if(isset($_FILES['foto'])){
            $imagenBLL = new ImagenFutappBLL($_FILES['foto'],'public/images/equipos');
            $imagenBLL->uploadImagen();
            $foto = $imagenBLL->getUploadedFileName();
            $equipo->setFoto($foto);
            unlink(__DIR__ . '/../../public /images/equipos/' .$equipoantiguo->getFoto());
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