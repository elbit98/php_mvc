<?php

namespace App\Services;

use System\Authorization;

class AdminService
{

    public function login($data)
    {
        if (!isset($data['login']) || !isset($data['password'])) return 'Все поля к заполнению!';

        if ($data['login'] == 'admin' && $data['password'] == 123) {
            $auth = new Authorization();
            $auth->createAuth(1);

            return true;
        } else {
            return 'Не правильные реквизиты доступа';
        }

    }

}