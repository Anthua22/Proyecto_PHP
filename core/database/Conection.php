<?php

namespace FUTAPP\core\database;


use PDO;
use PDOException;

class Conection
{
    public static function make(array $config)
    {
        try {
            $pdo = new PDO(
                $config['connection'] . ';dbname=' . $config['name'] .
                ';charset=utf8',
                $config['username'],
                $config['password'],
                $config['options']);
        } catch(PDOException $pdoException) {
            die($pdoException->getMessage());
        }

        return $pdo;
    }

}