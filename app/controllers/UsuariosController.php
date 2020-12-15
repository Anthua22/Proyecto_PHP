<?php

namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\helpers\GenerateCaptcha;
use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\app\repository\MensajeRepository;
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

    public function showupdate(string $id)
    {
        $equipoRespository = new UsuariosRepository();
        $error = FlashMessage::get('error_update_perfil');

        $_usuario = $equipoRespository->find($id);

        Response::renderView(
            'updateuser', [
                '_usuario' => $_usuario,
                'error' => $error
            ]
        );
    }

    public function perfil(string $id)
    {

        $usarioRepository = new UsuariosRepository();
        $partidosRepository = new PartidoRepository();
        $user = $usarioRepository->find($id);
        $userid = $user->getId();
        $partidos = $partidosRepository->findOneBy([
            'arbitro' => $userid
        ]);


        Response::renderView('perfil', [
            'partidos' => $partidos,
            '_usuario' => $user
        ]);
    }

    public function updatePerfil(string $id)
    {
        $usariosREpository = new UsuariosRepository();

        $userantiguo = $usariosREpository->find($id);

        $correo = htmlspecialchars($_POST['correo']);
        $pass = htmlspecialchars($_POST['password']);
        $passconfirm = htmlspecialchars($_POST['confirmpassword']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellidos = htmlspecialchars($_POST['apellidos']);
        $foto = $_FILES['foto'] ?? '';
        $telefono = htmlspecialchars($_POST['telefono']);
        $rol = $_POST['role'] ?? '';

        if ($pass === $passconfirm) {
            $user = new Usuarios();
            $user->setNombre($nombre);
            $user->setApellidos($apellidos);
            $user->setEmail($correo);
            $user->setPassword(Security::encrypt($pass));
            $user->setTelefono($telefono);

            if (!is_null($rol)) {
                $user->setRole('admin');
            }


            $user->setRole($userantiguo->getRole());



            $user->setFoto($userantiguo->getFoto());


            $usariosREpository->update($user);
            App::get('router')->redirect('arbitros/' . $user->getId() . '/update');
        } else {
            FlashMessage::set('error_update_perfil', 'Las contraseñas no coinciden');
            App::get('router')->redirect('arbitros/' . $userantiguo->getId() . '/update');
        }


    }

    public function showBandejaMensajes()
    {

        $mensajeRepository = new MensajeRepository();

        $user = App::get('user');
        if (!is_null($user)) {
            $mensajes = $mensajeRepository->getAllMensajeUser($user->getId());
            $contacts = $this->showOneContact($mensajes);

            Response::renderView('mensajes', [
                'mensajes' => $mensajes
            ]);
        }

    }

    private function showOneContact(array $mensajes)
    {
        $contacts = [];

        $usuarios = App::getRepository(UsuariosRepository::class)->findAll();
        foreach ($mensajes as $mensaje) {
            foreach ($usuarios as $usuario) {
                if ($mensaje->getEmisor() === $usuario->getId() || $mensaje->getReceptor() === !$this->checkExist($contacts, $usuario->getId())) {
                    $contacts .= $usuario;
                }
            }
        }

        return $contacts;
    }

    private function checkExist(array $mensajes, int $id)
    {
        $existe = false;
        foreach ($mensajes as $mensaje) {
            if ($mensaje->getId() === $id) {
                $existe = true;
            }
        }
        return $existe;
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

        if ($username !== '') {
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

                    } else {
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