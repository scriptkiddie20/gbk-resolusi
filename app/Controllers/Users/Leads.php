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
        $leads = new LeadsModel();

        $data = [
            'title' => 'Leads',
            'menu' => $menu->getMenu(),
            'subMenu' => $menu->subMenu()
        ];
        return view('user/leads', $data);
    }
}
