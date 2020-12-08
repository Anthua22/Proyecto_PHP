<?php



class EquiposController{



    public function addEquipos()
    {
        Response::renderView('equipos');
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