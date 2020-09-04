<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\LeadsModel;
use App\Models\UserMenuModel;

class Leads extends BaseController
{
    protected $leads;
    protected $validation_for;

    public function __construct()
    {
        $request = \Config\Services::request();
        $this->leads = new LeadsModel($request);
    }

    public function index()
    {
        $menu = new UserMenuModel();

        $data = [
            'title' => 'Leads',
            'menu' => $menu->getMenu(),
            'subMenu' => $menu->subMenu()
        ];
        return view('user/leads', $data);
    }

    public function listdata()
    {
        $request = \Config\Services::request();

        if ($request->getMethod(true) == 'POST') {
            $lists = $this->leads->getDatatables();
            $no = $request->getPost("start") + 1;
            $data = [];
            foreach ($lists as $list) {
                $row = [];
                $row[] = $no++;
                $row[] = $list->code;
                $row[] = $list->nama;
                $row[] = $list->lead_wa;
                $row[] = $list->lead_sms;
                $row[] = $list->lead_call;
                $row[] = "<button type='button' onclick='edit_barang($list->id_leads)' class='btn btn-primary btn-sm'><i class='fa fa-edit'></i> Edit</button>  <button onclick='hapus_barang($list->id_leads)' type='button' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i> Hapus</button>";
                $data[] = $row;
            }
            $output = [
                "draw" => $request->getPost('draw'),
                "recordsTotal" => $this->leads->countAll(),
                "recordsFiltered" => $this->leads->countFiltered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }

    function getKategori()
    {
        header('Content-Type: application/json');
        echo json_encode($this->leads->get_kategori());
    }

    public function edit($id)
    {
        header('Content-Type: application/json');
        echo json_encode($this->leads->get_by_id($id));
    }

    public function delete($id)
    {
        $this->leads->delete($id);
    }

    public function add()
    {
        $this->validation_for = 'add';
        $data = array();
        $data['status'] = TRUE;

        $valid = $this->_validate();

        if (!$this->validation->run($valid, 'leads')) {
            $errors = [
                'leads_wa'    => $this->validation->getError('leads_wa'),
                'leads_sms'   => $this->validation->getError('leads_sms'),
                'leads_call'  => $this->validation->getError('leads_call')
            ];
            $data = array(
                'status'         => FALSE,
                'errors'         => $errors
            );
            echo json_encode($data);
        }

        $insert = [
            'karyawan_id' => session('id_users'),
            'lead_wa'   => $this->request->getVar('leads_wa'),
            'lead_sms'  => $this->request->getVar('leads_sms'),
            'lead_call' => $this->request->getVar('leads_call')
        ];
        $this->leads->save($insert);
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    public function update()
    {
        $this->validation_for = 'update';
        $data = array();
        $data['status'] = TRUE;

        $valid = $this->_validate();

        if (!$this->validation->run($valid, 'leads')) {
            $errors = array(
                'leads_wa'   => $this->validation->getError('leads_wa'),
                'leads_sms'  => $this->validation->getError('leads_sms'),
                'leads_call' => $this->validation->getError('leads_call')
            );
            $data = array(
                'status'         => FALSE,
                'errors'         => $errors
            );
            echo json_encode($data);
        }
        $update = array(
            'id_leads' => $this->request->getVar('id_leads'),
            'lead_wa'   => $this->request->getVar('leads_wa'),
            'lead_sms'  => $this->request->getVar('leads_sms'),
            'lead_call' => $this->request->getVar('leads_call')
        );
        $this->leads->save($update);
        $data['status'] = TRUE;
        echo json_encode($data);
    }

    private function _validate()
    {
        $data = [
            'leads_wa' => $this->request->getVar('leads_wa'),
            'leads_sms' => $this->request->getVar('leads_sms'),
            'leads_call' => $this->request->getVar('leads_call'),
        ];
        return $data;
    }
}
