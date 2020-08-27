<?php

namespace App\Models;

use \CodeIgniter\Model;

class UsersModel extends Model
{
    protected $primaryKey = 'id_users';
    protected $table = 'users';
    protected $allowedFields = ['name', 'email', 'image', 'password', 'roles_id', 'is_active'];
    protected $useTimestamps = true;

    function getUsers($email)
    {
        $db = db_connect();
        return $db->table($this->table)->getWhere(['email' => $email])->getRowArray();
    }
}
