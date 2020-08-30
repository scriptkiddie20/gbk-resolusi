<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserModel extends Model
{
    protected $primaryKey = 'id_users';
    protected $table = 'users';
    protected $allowedFields = ['firstName', 'lastName', 'email', 'image', 'password', 'roles_id', 'is_active'];
    protected $useTimestamps = true;

    function getUsers($email)
    {
        $db = db_connect();
        return $db->table($this->table)->getWhere(['email' => $email])->getRowArray();
    }

    function is_active($email)
    {
        $db = db_connect();
        $db->table($this->table)->update(['is_active' => 1], ['email' => $email]);
    }
}
