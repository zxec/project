<?php

class Route
{
    static public function start(): void
    {
        $controller_name = 'Main';
        $action_name = 'index';
        $params = [];

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        for ($i = 3; $i < count($routes); $i++) {
            if (!empty($routes[$i])) {
                $params[] = $routes[$i];
            }
        }

        $model_name = 'Model' . $controller_name;
        $controller_name = 'Controller' . $controller_name;

        $model_file = $model_name . '.php';
        $model_path = "app/models/" . $model_file;
        if (file_exists($model_path)) {
            include "app/models/" . $model_file;
        }

        $controller_file = $controller_name . '.php';
        $controller_path = "app/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "app/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        $controller = new $controller_name();
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
