<?php

return [
    'database' => [
        'name' => 'futapp',
        'username' => 'userFutapp',
        'password' => '1234',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO:: ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
            PDO:: ATTR_PERSISTENT => true
        ]
    ],
    'security'=>[
        'roles'=>[
            'ROLE_ADMIN'=>3,
            'ROLE_USER'=>2,
            'ROLE_ANONIMO'=>1
        ]
    ]
];