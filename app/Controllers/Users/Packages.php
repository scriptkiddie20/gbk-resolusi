<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\PackageModel;
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
        if (is_logged_in()) {
            return is_logged_in();
        }

        $model = new PackageModel();
        $data = [
            'title' => 'Paket Usaha',
            'menu'  => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu(),
            'packages' => $model->packages()
        ];
        return view('user/package', $data);
    }

    public function detail($id)
    {
        $model = new ProductModel();
        $data = [
            'title' => 'Paket Usaha',
            'menu'  => $this->menu->getMenu(),
            'subMenu' => $this->menu->subMenu(),
            'products' => $model->products($id)
        ];

        if (empty($data['products'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Halaman ini tidak ditemukan !");
        }
        return view('user/package_detail', $data);
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->back();
    }
}
