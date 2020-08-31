<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $primaryKey = 'id_products';
    protected $table = 'products';
    protected $allowedFields = [];
    protected $useTimestamps = true;

    function getProducts()
    {
        $db = db_connect();
        $query = $db->table($this->table)
            ->join('categories', 'categories_id=id_categories')
            ->where(['category' => 'pakaian anak'])->where(['packages_id' => 3])->get();
        return $query->getResultArray();
    }
}
