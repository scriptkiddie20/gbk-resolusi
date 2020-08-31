<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $primaryKey = 'id_orders';
    protected $table = 'orders';
    protected $allowedFields = [];
    protected $useTimestamps = true;

    function getCustomer($nama)
    {
        $db = db_connect();
        $query = $db->table('customers')->getWhere(['nama' => $nama])->getRowArray();
        return $query;
    }
}
