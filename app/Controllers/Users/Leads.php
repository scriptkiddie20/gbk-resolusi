<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\LeadsModel;
use App\Models\UserMenuModel;

class Leads extends BaseController
{
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
        $leads = new LeadsModel($request);

        if ($request->getMethod(true) == 'POST') {
            $lists = $leads->getDatatables();
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
                "recordsTotal" => $leads->countAll(),
                "recordsFiltered" => $leads->countFiltered(),
                "data" => $data
            ];
            echo json_encode($output);
        }
    }
}
