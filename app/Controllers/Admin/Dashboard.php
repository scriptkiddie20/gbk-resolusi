<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (is_logged_in()) {
            return is_logged_in();
        } else if (session('roles_id') > 1) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Dashboard Admin',
        ];
        return view('admin/index', $data);
    }
}
