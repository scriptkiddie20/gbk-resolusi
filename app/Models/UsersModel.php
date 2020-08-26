<?php

namespace App\Models;

use \CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';

    function getUsers($email)
    {
        $db = db_connect();
        return $db->table($this->table)->getWhere(['email' => $email])->getRowArray();
    }
}
