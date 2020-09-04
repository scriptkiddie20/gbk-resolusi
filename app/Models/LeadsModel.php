<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadsModel extends Model
{
    protected $primaryKey = 'id_leads';
    protected $table = 'leads';
    // protected $allowedFields = ['sumbers_id', 'type_customers_id', 'nama', 'phone', 'address',];
    protected $useTimestamps = true;

    protected $column_search = ['karyawan_id', 'lead_wa', 'lead_sms', 'lead_call'];
    protected $column_order = [null, 'code', 'nama', 'lead_wa', 'lead_sms', 'lead_call'];
    protected $order = ['id_leads' => 'asc'];
    protected $request;
    protected $db;
    protected $dt;


    public function __construct($request = true)
    {
        if ($request == true) {
            $this->db = db_connect();
            $this->request = $request;

            $this->dt = $this->db->table($this->table)->join('karyawan', 'karyawan_id=id_karyawan');
        }
    }

    private function _getDatatables()
    {
        $request = $this->request;

        // searching
        $i = 0;
        foreach ($this->column_search as $search) {
            if ($i === 0) {
                $this->dt->groupStart();
                $this->dt->like($search, $request->getPost('search')['value']);
            } else {
                $this->dt->orLike($search, $request->getPost('search')['value']);
            }

            // if ($jenkel != null) {
            //     $this->dt->orLike($search, $jenkel);
            // }

            if (count($this->column_search) - 1 == $i) {
                $this->dt->groupEnd();
            }
            $i++;
        }

        // ordering
        if ($request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$request->getPost('order')['0']['column']], $request->getPost('order')['0']['dir']);
        } else if ($this->order) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    function getDatatables()
    {
        $this->_getDatatables();
        $request = $this->request;

        if ($request->getPost('length') != -1) {
            $this->dt->limit($request->getPost('length'), $request->getPost('start'));
            $query = $this->dt->get();
            return $query->getResult();
        }
    }

    function countAll()
    {
        return $this->dt->countAllResults();
    }

    function countFiltered()
    {
        $this->_getDatatables();
        return $this->dt->countAllResults();
    }

    // get categories
    function get_kategori()
    {
        $db = db_connect();
        $result = $db->table('categories')->get();
        return $result->getResult();
    }

    // get by id
    public function get_by_id($id)
    {
        $query = $this->getWhere(['id_leads' => $id]);
        return $query->getRow();
    }
}
