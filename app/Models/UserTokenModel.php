<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserTokenModel extends Model
{
    protected $primaryKey = 'id_user_tokens';
    protected $table = 'user_tokens';
    protected $allowedFields = ['email', 'token'];
    protected $useTimestamps = true;


    function getToken($token)
    {
        $db = db_connect();
        return $db->table($this->table)->getWhere(['token' => $token])->getRowArray();
    }
}
