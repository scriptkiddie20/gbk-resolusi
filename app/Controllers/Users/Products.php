<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\UserMenuModel;

class Products extends BaseController
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

        $model = new ProductModel();
        $data = [
            'title' => 'Products',
            'menu'  => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu(),
            'product' => $model->getProducts()
        ];
        return view('user/product', $data);
    }
}
