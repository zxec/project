<?php

class Route
{

    static public function start(): void
    {
        $controllerName = 'Main';
        $action_name = 'index';
        $params = [];

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        for ($i = 3; $i < count($routes); $i++) {
            if (!empty($routes[$i])) {
                $params[] = $routes[$i];
            }
        }

        $modelName = $controllerName . 'Model';
        $controllerName = $controllerName . 'Controller';

        $modelFile = $modelName . '.php';
        $modelPath = "app/models/" . $modelFile;
        if (file_exists($modelPath)) {
            include "app/models/" . $modelFile;
        }

        $controllerFile = $controllerName . '.php';
        $controllerPath = "app/controllers/" . $controllerFile;
        if (file_exists($controllerPath)) {
            include "app/controllers/" . $controllerFile;
        } else {
            Route::ErrorPage404();
        }

        $controller = new $controllerName();
        $action = $action_name;

        if (method_exists($controller, $action)) {
            if (empty($params)) {
                $controller->$action();
            } else {
                $controller->$action($params);
            }
        } else {
            Route::ErrorPage404();
        }
    }

    static function ErrorPage404(): void
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }
}
