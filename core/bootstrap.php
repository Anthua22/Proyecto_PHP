<?php

use FUTAPP\core\App;
use FUTAPP\core\database\Connection;

$config = require __DIR__ . '/../app/config.php';
App::bind('config',$config);
App::bind('connection',Connection::make($config['database']));
