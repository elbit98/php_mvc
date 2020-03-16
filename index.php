<?php

session_start();

use System\Router;

require_once './vendor/autoload.php';

// Вызываем роутер
$router = new Router();
$router->add('/', ['controller' => 'Home', 'action' => 'index']);

$router->add('/add/task', ['controller' => 'Task', 'action' => 'add']);
$router->add('/store/task', ['controller' => 'Task', 'action' => 'store']);

$router->add('/task/edit/', ['controller' => 'Task', 'action' => 'edit']);
$router->add('/task/update', ['controller' => 'Task', 'action' => 'update']);

$router->add('/admin/login', ['controller' => 'Admin', 'action' => 'login']);
$router->add('/admin/logout', ['controller' => 'Admin', 'action' => 'logout']);

$router->run();
