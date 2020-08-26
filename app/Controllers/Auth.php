<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        $validation = \Config\Services::validation();
        $data = [
            'title' => 'Yahir Login'
        ];

        if (!$validation->run($data, 'auth')) {
            return view('auth/index', $data);
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $db = db_connect();

        $db->table('users')->getWhere()->getRowArray();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
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
