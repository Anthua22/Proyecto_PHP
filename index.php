<?php

require __DIR__ . '/core/bootstrap.php';

$routes = require 'app/routes.php';

$uri = trim($_SERVER['REQUEST_METHOD'],'/');

require $routes[$uri];