<?php

namespace App\Controllers;

use App\Services\TaskService;
use System\Controller;

class HomeController extends Controller
{
    private $taskService;

    public function __construct()
    {
        $this->taskService = new TaskService();
    }

    public function Index()
    {
        $this->view('home/index', $this->taskService->getAll());
    }

}