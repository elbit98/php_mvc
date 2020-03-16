<?php

namespace App\Services;

use App\Models\Task;
use System\Authorization;

class TaskService extends Service
{

    public function getAll()
    {
        return ['tasks' => Task::getAll(), 'isAdmin' => Authorization::isLoggedIn()];
    }

    public function find(int $id)
    {
        return Task::find($id);
    }

    public function store(array $data)
    {
        $errors = $this->validation($data);

        if (count($errors) == 0) {
            $this->dataFilter($data);

            $task = new Task();
            $task->create($data);
        } else {
            return ['errors' => $errors];
        }

    }

    public function update(array $data)
    {
        $errors = $this->validation($data);

        if (count($errors) == 0) {
            $this->dataFilter($data);

            if ($data['old_text'] == $data['text']) {
                $data['edit_admin'] = 0;
            } else {
                $data['edit_admin'] = 1;
            }

            $task = new Task();
            $task->update($data);
        } else {
            return ['errors' => $errors];
        }
    }

}