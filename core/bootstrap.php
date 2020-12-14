<?php


use FUTAPP\core\App;
use FUTAPP\core\database\Connection;

session_start();

require __DIR__.'/../vendor/autoload.php';

$config = require __DIR__ . '/../app/config.php';
App::bind('config',$config);
App::bind('connection',Connection::make($config['database']));
