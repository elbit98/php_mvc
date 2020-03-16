<?php

namespace System;

class Authorization
{

    public function createAuth($admin)
    {
        return $this->setAuthSession([
            'admin' => $admin,
        ]);
    }

    public static function isLoggedIn()
    {
        return (isset($_SESSION['auth']) && $_SESSION['auth']) ? true : false;
    }

    private function setAuthSession(array $session_data)
    {
        return $_SESSION['auth'] = $session_data;
    }

    public function deleteAuthSession()
    {
        unset($_SESSION['auth']);
        return true;
    }

}