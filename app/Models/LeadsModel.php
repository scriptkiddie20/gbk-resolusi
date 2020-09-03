<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadsModel extends Model
{
    protected $primaryKey = 'id_leads';
    protected $table = 'leads';
    protected $allowedFields = ['sumbers_id', 'type_customers_id', 'nama', 'phone', 'address',];
    protected $useTimestamps = true;
}
