<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\PackageModel;
use CodeIgniter\CodeIgniter;

class Landing extends BaseController
{

    public function index()
    {
        $products = new ProductModel();
        $packages = new PackageModel();

        $data = [
            'title' => 'Grosirbajuku.com',
            'description' => 'Grosir Baju Murah Langsung Dari Pabrik Terbaik & Terpercaya Sejak 2008',
            'products' => $products->getProducts(),
            'packages' => $packages->getPackages(),
            'cs' => $packages->getCs(),
            'validation' => $this->validation
        ];
        return view('user/landing', $data);
    }

    public function cs()
    {
        $products = new ProductModel();
        $packages = new PackageModel();

        $cs = $this->request->uri->getSegment(2);

        $data = [
            'title' => 'Paket Usaha',
            'description' => 'Grosir Baju Murah Langsung Dari Pabrik Terbaik & Terpercaya Sejak 2008',
            'products' => $products->getProducts(),
            'packages' => $packages->getPackages(),
            'cs' => $packages->getCs($cs),
            'validation' => $this->validation
        ];

        if (empty($data['cs'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan !');
        }

        return view('user/landing', $data);
    }

    public function orderpaket()
    {
        $customerModel = new CustomerModel();

        $inputs = [
            'idusers' => htmlspecialchars($this->request->getVar('idusers')),
            'phonecs' => htmlspecialchars($this->request->getVar('phonecs')),
            'users' => htmlspecialchars($this->request->getVar('users')),
            'package' => htmlspecialchars($this->request->getVar('package')),
            'paket' => htmlspecialchars($this->request->getVar('paket')),
            'nama' => htmlspecialchars($this->request->getVar('nama')),
            'phone' => htmlspecialchars($this->request->getVar('phone')),
            'alamat' => htmlspecialchars($this->request->getVar('alamat')),
            'catatan' => htmlspecialchars($this->request->getVar('catatan')),
        ];

        if (!$this->validation->run($inputs, 'orderpaket')) {
            return redirect()->to('/')->withInput();
        }

        $customer = [
            'sumbers_id' => 1,
            'type_customers_id' => 2,
            'nama' => $inputs['nama'],
            'phone' => $inputs['phone'],
            'address' => $inputs['alamat'],
        ];

        $customerModel->save($customer);

        return redirect()->to('https://api.whatsapp.com/send?phone=' . $inputs['phonecs'] . '&text=Halo mas ' . $inputs['users'] . ' saya mau pesan *' . $inputs['package'] . '*, Apakah stoknya masih tersedia ?%0A%0A' . 'Kalo ada, saya mau pesan :%0A' . 'Nama : ' . $inputs['nama'] . '%0ANo Hp : ' . $inputs['phone'] . '%0AAlamat : ' . $inputs['alamat'] . ($inputs['catatan'] ? '%0ACatatan : ' . $inputs['catatan'] : ''));
    }
}
