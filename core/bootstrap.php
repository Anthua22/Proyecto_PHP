<?php


require_once __DIR__.'/../core/App.php';
require_once __DIR__.'/../core/database/Connection.php';



session_start();
$config = require __DIR__ . '/../app/config.php';
App::bind('config',$config);
App::bind('connection',Connection::make($config['database']));
