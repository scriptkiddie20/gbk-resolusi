<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $primaryKey = 'id_products';
    protected $table = 'products';
    protected $allowedFields = [];
    protected $useTimestamps = true;

    function getProducts($id_packages = false)
    {
        $db = db_connect();
        if ($id_packages == false) {
            $query = $db->table($this->table)
                ->join('categories', 'id_categories=categories_id')
                ->join('packages', 'id_packages=packages_id')
                ->get();
            return $query->getResultArray();
        } else {
            $query = $db->table($this->table)
                ->getWhere(['packages_id' => $id_packages]);
            return $query->getResultArray();
        }
    }
}
