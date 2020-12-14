<?php

namespace FUTAPP\CORE;
class Security
{
    public static function isUserGranted(string $role) : bool
    {
        if ($role === 'ROLE_ANONIMO')
            return true;

        $usuario = App::get('user');
        if (is_null($usuario))
            return false;

        $roleUsuario = $usuario->getRole();

        $roles = App::get('config')['security']['roles'];

        if ($roles[$role] > $roles[$roleUsuario])
            return false;
        return true;
    }

    public static function encrypt(string $password) : string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function checkPassword(
        string $password, string $bdPassword) : bool
    {
        return password_verify($password, $bdPassword);
    }
}