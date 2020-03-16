<?php

namespace App\Services;

abstract class Service
{

    public function validation($data)
    {
        $errors = [];
        foreach ($data as $field => $value) {
            if ($field == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = 'email';
            }

            if (empty($value)) {
                $errors[$field] = false;
            }
        }

        return $errors;
    }

    public function dataFilter($data)
    {
        $newData = [];
        foreach ($data as $field => $value) {
            $newData[$field] = addslashes(htmlspecialchars(trim($value)));
        }

        return $newData;
    }

}