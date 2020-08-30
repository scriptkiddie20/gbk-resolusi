<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UserMenuModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (is_logged_in()) {
            return is_logged_in();
        }

        $menuModel = new UserMenuModel();
        $data = [
            'title' => 'Paket Usaha',
            'menu' => $menuModel->getMenu(),
            'subMenu' => $menuModel->subMenu()
        ];
        return view('user/index', $data);
    }
}
