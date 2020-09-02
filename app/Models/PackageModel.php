<?php

namespace App\Models;

use CodeIgniter\Model;

class PackageModel extends Model
{
    protected $primaryKey = 'id_packages';
    protected $table = 'packages';
    protected $allowedFields = [];
    protected $useTimestamps = true;

    function packages()
    {
        return $this->join('categories', 'categories_id=id_categories')->findAll();
    }

    function getPackages()
    {
        $db = db_connect();
        $query = $db->table($this->table)
            ->where(['packages.categories_id' => 1])->get();
        return $query->getResultArray();
    }

    function getCs($cs = false)
    {
        $db = db_connect();

        if ($cs == false) {
            $query = $db->table('karyawan')->where(['code' => 'GBKSIMP'])->get();
            return $query->getRowArray();
        }
        $query = $db->table('karyawan')->where(['code' => $cs])->get();
        return $query->getRowArray();
    }
}
