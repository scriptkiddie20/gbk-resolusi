<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Auth extends BaseController
{
    public function index()
    {
        if (!$this->validate([
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'Kamu wajib mengisi {field}.'
                ]
            ],
            'password'    => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Kamu wajib mengisi {field}.'
                ]
            ],
        ])) {
            $data = [
                'title' => 'Yahir Login',
                'validation' => \Config\Services::validation()
            ];
            return view('auth/index', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $model = new UsersModel;

        $email = 'aceng@gmail.com';
        $password = $this->request->getVar('password');

        $user = $model->getUsers($email);

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if ($user['password'] == $password) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['roles_id']
                    ];
                    $this->session->set($data);
                    dd('Success');
                    if ($user['role_id'] == 1) {
                        redirect()->to('admin');
                    } else {
                        redirect()->to('user');
                    }
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect()->to('/login');
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect()->to('/login');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect()->to('/login');
        }
    }


    public function register()
    {
        $data = [
            'title' => 'Register Yahir Account'
        ];
        return view('auth/register', $data);
    }

    //--------------------------------------------------------------------

}
