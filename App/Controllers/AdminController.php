<?php

namespace App\Controllers;

use App\Services\AdminService;
use App\Services\TaskService;
use System\Authorization;
use System\Controller;

class AdminController extends Controller
{

    private $adminService;
    private $taskService;

    public function __construct()
    {
        $this->adminService = new AdminService();
        $this->taskService = new TaskService();
    }

    public function login()
    {
        if (Authorization::isLoggedIn() === true) {
            header('location: /');
        }

        $data = $_POST;

        if (isset($data['login']) && isset($data['password'])) {
            $errors = $this->adminService->login($data);

            if (count($errors) > 0) {
                $_SESSION['ERRORS'] = $errors;
                header('location: /admin/login');
            } else {
                header('location: /');
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function logout()
    {
        $auth = new Authorization();
        $auth->deleteAuthSession();
        header('location: /');
    }

}