<?php

namespace App\Models;

use \CodeIgniter\Model;

class UserMenuModel extends Model
{
    protected $table = 'menus';

    public function getMenu()
    {
        $role = session('roles_id');
        $db = db_connect();
        $query = $db->table($this->table)
            ->orderBy('menu', 'ASC')
            ->join('access_menus', 'id_menus = menus_id')
            ->where(['roles_id' => $role])->get();
        return $query->getResultArray();
    }

    public function subMenu()
    {
        $db = db_connect();
        return $db->table('sub_menus')
            ->orderBy('title', 'asc')
            ->getWhere(['is_active' => 1])
            ->getResultArray();
    }
}
