<?php

require_once __DIR__.'/../../core/App.php';
require_once __DIR__.'/../repository/UsuariosRepository.php';

class UsuariosController
{
    public function login()
    {
        Response::renderView('login', []);
    }

    public function checkLogin()
    {
        $username = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $usuario = App::getRepository(UsuariosRepository::class)->findOneBy([
            'email' => $username
        ]);

        if (Security:: checkPassword (
                $password,
                $usuario->getPassword()
            ) === true)
        {
            $_SESSION['usuario'] = $usuario->getId();
            App::get('router')->redirect('/');
        }

        FlashMessage::set('error-login', "El usuario y/o password introducidos no son correctos");

        App::get('router')->redirect('login');
    }

    public function unauthorized(){
        header('HTTP/1.1 403 Forbiden',true,403);
        Response::renderView('403');
    }

    public function register()
    {

    }
}