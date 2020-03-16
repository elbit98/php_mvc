<?php

namespace System;

class Router
{
    protected $routes = [];
    protected $params = [];

    public function add($route, $params = [])
    {
        $this->routes[$route] = $params;
    }

    // Поиск роута
    public function match($url)
    {
        if (array_key_exists($url, $this->routes)) {
               $this->params = $this->routes[$url];
            return true;
        }

        return false;
    }

    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];

        // Определяем id параметр
        $edit = explode('edit/', $url);
        $param_id = isset($edit[1]) ? $edit[1] : false;

        if ($param_id) $url = $edit[0].'edit/';

        // Вызываем метод с контроллера
        if ($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller.'Controller';

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if (preg_match('/action$/i', $action) == 0) {
                    if ($param_id) {
                        $controller_object->$action($param_id);
                    } else {
                        $controller_object->$action();
                    }

                } else {
                    throw new \Exception("Method $action in controller $controller cannot be called directly - remove the Action suffix to call this method");
                }
            } else {
                throw new \Exception("Controller class $controller not found");
            }
        } else {
            throw new \Exception('No route matched.', 404);
        }

    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }

        return $namespace;
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }

}