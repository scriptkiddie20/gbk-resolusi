<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UserMenuModel;

class Packages extends BaseController
{
    protected $menu;
    public function __construct()
    {
        $this->menu = new UserMenuModel();
    }

    public function index()
    {
        dd($this->request->getVar());
        if (is_logged_in()) {
            return is_logged_in();
        }

        $model = new ProductModel();
        // dd($model->getProducts());
        $data = [
            'title' => 'Paket Usaha',
            'menu'  => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu(),
            'product' => $model->getProducts()
        ];
        return view('user/package', $data);
    }

    public function detail($id)
    {
        $model = new ProductModel();
        dd($model->getProducts($id));
        $data = [
            'title' => 'Paket Usaha',
            'menu'  => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu(),
            'product' => $model->getProducts()
        ];
        return view('user/package', $data);
    }
}
