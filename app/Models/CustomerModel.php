<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $primaryKey = 'id_customers';
    protected $table = 'customers';
    protected $allowedFields = ['sumbers_id', 'type_customers_id', 'nama', 'phone', 'address',];
    protected $useTimestamps = true;
}
