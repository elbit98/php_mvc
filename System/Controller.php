<?php

namespace System;

abstract class Controller
{

    public function view(string $view, array $data = [])
    {
        if (isset($data) && $data) extract($data);

        //including the header, the view and the footer
        require_once './view/layout/header.php';
        require_once './view/' . $view . '.php';
        require_once './view/layout/footer.php';
    }

}