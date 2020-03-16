<?php

namespace App\Controllers;

use App\Services\TaskService;
use System\Authorization;
use System\Controller;

class TaskController extends Controller
{
    private $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function add()
    {
        $this->view('task/create');
    }

    public function store()
    {
        $errors = $this->taskService->store($_POST);

        if (count($errors) == 0) {
            $_SESSION['ADD_TUSK_SUCCESS'] = true;
            header('location: /');
        } else {
            $_SESSION['ERRORS'] = $errors;
            $_SESSION['ERRORS_DATA'] = $_POST;
            header('location: /add/task');
        }

    }

    public function edit($id)
    {
        $isAdmin = Authorization::isLoggedIn();

        if ($isAdmin) {
            $this->view('task/edit', $this->taskService->find($id));
        } else {
            header('location: /admin/login');
        }

    }

    public function update()
    {
        $isAdmin = Authorization::isLoggedIn();

        if ($isAdmin) {
            $this->taskService->update($_POST);
            header('location: /');
        } else {
            header('location: /admin/login');
        }
    }


}