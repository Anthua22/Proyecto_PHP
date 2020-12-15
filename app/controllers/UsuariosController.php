<?php

namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\CORE\App;
use FUTAPP\core\Response;
use FUTAPP\CORE\Security;


class UsuariosController
{
    public function login()
    {
        $usuario = App::get('user');
        if(is_null($usuario)){
            $errorLogin = FlashMessage::get('error_login');
            Response::renderView('login', ['error_login'=>$errorLogin]);
        }else{
            App::get('router')->redirect('');
        }

    }

    public function showPartidos(){

        $usuario = App::get('user');
        $partidosRepository = new PartidoRepository();

        $partidos = $partidosRepository->getPartidosArbitro($usuario->getId());

        Response::renderView('mis-partidos',[
            'partidos'=>$partidos
        ]);

    }
    public function logout()
    {
        $_SESSION['usuario'] = null;
        unset($_SESSION['usuario']);

        App::get('router')->redirect('login');

    }

    public function checkLogin()
    {
        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
            'email' => $username
        ]);

        if (Security::checkPassword (
                $password,
                $usuario->getPassword()
            ) === true)
        {
            $_SESSION['usuario'] = $usuario->getId();
            App::get('router')->redirect('');
        }

        FlashMessage::set('error_login', "El usuario y/o password introducidos no son correctos");

        App::get('router')->redirect('login');
    }

    public function unanthorized(){
        header('HTTP/1.1 403 Forbiden',true,403);
        Response::renderView('403');
    }

    public function register()
    {
        $usuario = App::get('user');
        if(is_null($usuario)){
            $usuariosRepository = new UsuariosRepository();

            try{
                $usuariosRepository->getConnection()->beginTransaction();
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $email = $_POST['correo'];
                $pass = $_POST['password'];
                $telefono = $_POST['telefono'];
                $fecha_nacimiento = $_POST['fechanacimiento'];
                $passconform = $_POST['passwordconfirm'];

                if($pass === $passconform){
                    $imagenBLL = new ImagenFutappBLL($_FILES['foto'],'public/images/users');
                    $imagenBLL->uploadImagen();
                    $foto = $imagenBLL->getUploadedFileName();
                    $passEncript = Security::encrypt($pass);
                    $newArbitro = new Usuarios();
                    $newArbitro->setFoto($foto);
                    $newArbitro->setNombre($nombre);
                    $newArbitro->setApellidos($apellidos);
                    $newArbitro->setRole('arbitro');
                    $newArbitro->setPassword($passEncript);
                    $newArbitro->setEmail($email);
                    $newArbitro->setTelefono($telefono);
                    $newArbitro->setFechanacimiento($fecha_nacimiento);
                    $usuariosRepository->save($newArbitro);
                    $usuariosRepository->getConnection()->commit();

                    $usuarioNuevo = App::getRepository(UsuariosRepository::class)->findOneBy([
                        'email'=>$newArbitro->getEmail()
                    ]);

                    $_SESSION['usuario'] = $usuarioNuevo->getId();

                    App::get('router')->redirect('mis-partidos');
                }else{
                    FlashMessage::set('error-register',"Las contraseñas intruducidas no coinciden");
                    App::get('router')->redirect('register');
                }
            }catch (Exception $exception){
                $usuariosRepository->getConnection()->rollBack();
            }
        }


    }
}