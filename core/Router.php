<?php


class Router
{

    private $routes = [
        'GET' => [],
        'POST' => []
    ];


    public function post(string $uri, string $controller, string $action)
    {
        $this->routes['POST'][$uri] = $controller . '@' . $action;
    }

    public function get(
        string $uri, string $controller, string $action, string $role = 'ROLE_ANONIMO')
    {
        $this->routes['GET'][$uri] = [
            'controller' => $controller . '@' . $action,
            'role' => $role
        ];
    }

    public static function load(string $file)
    {
        $route = new static;
        App::bind('router', $route);
        require $file;
    }

    public function direct(string $uri, string $method) {

        foreach($this->routes[$method] as $route=>$data) {
            $urlRule = $this->prepareRoute($route);
            if (preg_match('/^' . $urlRule . '\/*$/s', $uri, $matches)) {
                $controller = $data['controller'];
                $role = $data['role'];


                    $parameters = $this->getParametersRoute($route, $matches);
                    list($controller, $action) = explode('@', $controller);

                    return $this->callAction($controller, $action, $parameters);

            }
        }


    }


    private function prepareRoute(string $route)
    {
        $urlRule = preg_replace(
            '/:([^\/]+)/',
            '(?<\1>[A-Za-z0-9\-\_]+)',
            $route
        );

        return str_replace('/', '\/', $urlRule);
    }

    private function callAction(string $controller, string $action, array $parameters = [])
    {
        $objController = new $controller;
        if (!method_exists($objController, $action)) {
            throw new Exception(
                "El controlador $controller no responde al action $action");
        }

        call_user_func_array([$objController, $action], $parameters);

        return true;
    }

    private function getParametersRoute(string $route, array $matches)
    {
        preg_match_all('/:([^\/]+)/', $route, $parameterNames);

        return array_intersect_key($matches, array_flip($parameterNames[1]));
    }

    public function redirect(string $path)
    {
        header('location:/' . $path);
        exit;
    }
}