<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\UserMenuModel;

class Dashboard extends BaseController
{
    protected $menu;
    public function __construct()
    {
        $this->menu = new UserMenuModel();
    }

    public function index()
    {
        if (is_logged_in()) {
            return is_logged_in();
        }

        $data = [
            'title' => 'User',
            'menu' => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu()
        ];
        return view('user/index', $data);
    }
}
