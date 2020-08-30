<?php

namespace App\Controllers\Users;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Landing extends BaseController
{

    public function index()
    {
        $products = new ProductModel();
        $data = [
            'title' => 'Paket Usaha',
            'product' => $products->getProducts()
        ];
        return view('user/landing', $data);
    }
}
