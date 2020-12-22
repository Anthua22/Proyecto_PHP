<?php

namespace FUTAPP\app\controllers;

use Exception;
use FUTAPP\app\BLL\ImagenFutappBLL;
use FUTAPP\app\entity\Usuarios;
use FUTAPP\app\helpers\Emails;
use FUTAPP\app\helpers\FlashMessage;
use FUTAPP\app\helpers\GenerateCaptcha;
use FUTAPP\app\repository\EquiposRepository;
use FUTAPP\app\repository\MensajeRepository;
use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\app\repository\UsuariosRepository;
use FUTAPP\CORE\App;
use FUTAPP\core\Response;
use FUTAPP\CORE\Security;


class   UsuariosController
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
        $info = FlashMessage::get('update_user_ok');


        Response::renderView(
            'updateuserinfo', [
                '_usuario' => $_usuario,
                'error' => $error,
                'info'=>$info
            ]
        );
    }

    public function showupdatePass()
    {
        $error = FlashMessage::get('error_pass');
        $info = FlashMessage::get('update_userpass_ok');
        Response::renderView(
            'updatepass',
            [
                'error' => $error,
                'info'=>$info
            ]
        );
    }

    public function perfil(string $id)
    {

        $usarioRepository = new UsuariosRepository();
        $partidosRepository = new PartidoRepository();
        $user = $usarioRepository->find($id);
        $userid = $user->getId();



        Response::renderView('perfil', [

            '_usuario' => $user
        ]);
    }

    public function updatePass(string $id)
    {
        $usariosREpository = new UsuariosRepository();

        $userantiguo = $usariosREpository->find($id);

        $passantigua = htmlspecialchars($_POST['passantigua']);
        $passnueva = htmlspecialchars($_POST['passnueva']);
        $passnuevaconfirm = htmlspecialchars($_POST['passnuevaconfirm']);

        if (Security::checkPassword(
                $passantigua,
                $userantiguo->getPassword()
            ) === true) {
            if ($passnueva === $passnuevaconfirm) {
                $userantiguo->setPassword(Security::encrypt($passnueva));
                $usariosREpository->update($userantiguo);
                FlashMessage::set('update_userpass_ok', 'La contraseña se ha actuizado correctamente');

            } else {
                FlashMessage::set('error_pass', 'La contraseña nueva no coincide con la contraseña nueva de confirmación');
            }
        } else {
            FlashMessage::set('error_pass', 'La contraseña introducida no coincide con la original');
        }
        App::get('router')->redirect("arbitros/$id/updatepass");
    }

    public function updatePerfil(string $id)
    {
        $usariosREpository = new UsuariosRepository();

        $userantiguo = $usariosREpository->find($id);

        $correo = htmlspecialchars($_POST['correo']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellidos = htmlspecialchars($_POST['apellidos']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $rol = $_POST['role'] ?? '';


        $user = new Usuarios();
        $user->setNombre($nombre);
        $user->setApellidos($apellidos);
        $user->setEmail($correo);
        $user->setPassword($userantiguo->getPassword());
        $user->setTelefono($telefono);

        if (!is_null($rol) || $rol !== '') {
            $user->setRole('admin');
        }


        $user->setRole($userantiguo->getRole());

        $user->setId($userantiguo->getId());


        if ($_FILES['image']['name'] !== '') {
            $imagenBLL = new ImagenFutappBLL($_FILES['image'], 'public/images/users');
            $imagenBLL->uploadImagen();
            $foto = $imagenBLL->getUploadedFileName();
            $user->setFoto($foto);
            unlink(__DIR__ . '/../../public/images/equipos/' . $user->getFoto());
        } else {
            $user->setFoto($userantiguo->getFoto());
        }

        $usariosREpository->update($user);

        FlashMessage::set('update_user_ok', 'Se ha actualizado la información correctamente');

        App::get('router')->redirect('arbitros/' . $user->getId() . '/update');


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

    public function filtroAsc(){
        $partidosRepository = new PartidoRepository();
        $usuario = App::get('user');
        $partidos = $partidosRepository->getPartidosAsc($usuario->getId());
        Response::renderView('mis-partidos', [
            'partidos' => $partidos
        ]);
    }

    public function filtroDesc(){
        $partidosRepository = new PartidoRepository();
        $usuario = App::get('user');
        $partidos = $partidosRepository->getPartidosDesc($usuario->getId());
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
                ) === true && !is_null($usuario)) {
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

    private function deletePartidos(array $partidos)
    {
        foreach ($partidos as $partido) {
            App::getRepository(PartidoRepository::class)->delete($partido);
        }
    }


    private function deleteMensajes(array $mensajes)
    {
        foreach ($mensajes as $mensaje) {
            App::getRepository(MensajeRepository::class)->delete($mensaje);
        }
    }
    public function deleteJson(string $id)
    {
        try{
            $usariosRepository = new UsuariosRepository();
            $usariosRepository->getConnection()->beginTransaction();

            $usuario = $usariosRepository->find($id);

            $partidos = App::getRepository(PartidoRepository::class)->getAllPartidosArbitro($usuario->getId());
            $mensajes = App::getRepository(MensajeRepository::class)->getMensajesUser($usuario->getId());

            $this->deletePartidos($partidos);
            $this->deleteMensajes($mensajes);
            $rs=$usariosRepository->delete($usuario);
            $usariosRepository->getConnection()->commit();
            $nombre = $usuario->getNombre().' '.$usuario->getApellidos();
            header('Content-Type: application/json');

            echo json_encode([
                'error' => false,
                'mensaje' => "El arbitro $nombre se ha eliminado correctamente"
            ]);
        }catch (Exception $ex){
            $usariosRepository->getConnection()->rollBack();
            die('No se ha podido eliminar el equipo');
        }

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
                            $imagenBLL = new ImagenFutappBLL($_FILES['image'], 'public/images/users');
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