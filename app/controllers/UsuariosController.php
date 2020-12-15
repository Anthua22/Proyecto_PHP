<?php

namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\helpers\GenerateCaptcha;
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
        if (is_null($usuario)) {
            $errorLogin = FlashMessage::get('error_login');
            Response::renderView('login', ['error_login' => $errorLogin]);
        } else {
            App::get('router')->redirect('');
        }

    }

    public function showBandejaMensajes(){
        Response::renderView('mensajes');
    }

    public function showPartidos()
    {

        $usuario = App::get('user');
        $partidosRepository = new PartidoRepository();

        $partidos = $partidosRepository->getPartidosArbitro($usuario->getId());

        Response::renderView('mis-partidos', [
            'partidos' => $partidos
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

        if($username!== ''){
            $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
                'email' => $username
            ]);

            if (Security::checkPassword(
                    $password,
                    $usuario->getPassword()
                ) === true) {
                $_SESSION['usuario'] = $usuario->getId();
                App::get('router')->redirect('');
            }

        }


        FlashMessage::set('error_login', "El usuario y/o password introducidos no son correctos");

        App::get('router')->redirect('login');
    }

    public function unanthorized()
    {
        header('HTTP/1.1 403 Forbiden', true, 403);
        Response::renderView('403');
    }

    public function generateCapcha()
    {
        $imagen = new GenerateCaptcha();
        $imagen->generateColors();
        $imagen->generateTextColor();
        $imagen->setText();
    }

    public function register()
    {
        $usuario = App::get('user');
        if (is_null($usuario)) {
            try {
                $usuariosRepository = new UsuariosRepository();
                $usuariosRepository->getConnection()->beginTransaction();
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $email = $_POST['correo'];
                $pass = $_POST['password'];
                $telefono = $_POST['telefono'];
                $fecha_nacimiento = $_POST['fechanacimiento'];
                $passconform = $_POST['passwordconfirm'];
                $captcha = $_POST['captcha'];
                if ($pass === $passconform) {

                    if ($captcha === $_SESSION['captcha']) {
                        $passEncript = Security::encrypt($pass);
                        $newArbitro = new Usuarios();
                        $newArbitro->setFoto('gg');
                        $newArbitro->setNombre($nombre);
                        $newArbitro->setApellidos($apellidos);
                        $newArbitro->setRole('arbitro');
                        $newArbitro->setPassword($passEncript);
                        $newArbitro->setEmail($email);
                        $newArbitro->setTelefono($telefono);
                        $newArbitro->setFechanacimiento($fecha_nacimiento);
                        if (!$usuariosRepository->checkAccount($newArbitro)) {
                            $imagenBLL = new ImagenFutappBLL($_FILES['foto'], 'public/images/users');
                            $imagenBLL->uploadImagen();
                            $foto = $imagenBLL->getUploadedFileName();
                            $newArbitro->setFoto($foto);
                            $usuariosRepository->save($newArbitro);
                            $usuariosRepository->getConnection()->commit();
                            App::get('router')->redirect('login');
                        }
                        $this->saveInformation();
                        FlashMessage::set('error-register', "Ya existe una cuenta asociada al correo proporcionado");
                        App::get('router')->redirect('register');

                    }else{
                        FlashMessage::set('error-register', "El captcha no coincide con la imagen");

                        $this->saveInformation();
                        App::get('router')->redirect('register');
                    }


                } else {
                    FlashMessage::set('error-register', "Las contraseñas intruducidas no coinciden");
                    $this->saveInformation();
                    App::get('router')->redirect('register');
                }
            } catch (Exception $exception) {
                $usuariosRepository->getConnection()->rollBack();
            }
        }

    }

    private function saveInformation()
    {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $fecha_nacimiento = $_POST['fechanacimiento'];

        FlashMessage::set('nombreuser', $nombre);
        FlashMessage::set('apellidosuser', $apellidos);
        FlashMessage::set('emailuser', $email);
        FlashMessage::set('telefonouser', $telefono);
        FlashMessage::set('fechanacimientouser', $fecha_nacimiento);
    }
}