<?php

namespace App\Models;

use PDO;
use System\Model;

class Task extends Model
{
    const STATUS = [
        0 => 'Не выполнена',
        1 => 'Выполнена'
    ];

    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, username, email, status, edit_admin, text  FROM tasks');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id)
    {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT id, username, email, status, text  FROM tasks WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function create(array $data)
    {
        $db = static::getDB();
        $sql = 'INSERT INTO tasks (username, email, text) VALUES (:username, :email, :text)';
        $query = $db->prepare($sql);

        $query->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':text' => $data['text']
        ]);
    }

    public function update(array $data)
    {
        $db = static::getDB();
        $query = $db->prepare('UPDATE tasks 
        SET username = :username, email = :email, text = :text, status = :status, edit_admin = :edit_admin WHERE id = :id');

        $query->execute([
            ':id' => $data['id'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':text' => $data['text'],
            ':status' => $data['status'],
            ':edit_admin' => $data['edit_admin']
        ]);
    }

}