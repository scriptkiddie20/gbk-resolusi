<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserTokenModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public function index()
    {
        if (session('email')) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Yahir Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/index', $data);
    }

    public function login()
    {
        $validation = [
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password')
        ];

        if (!$this->validation->run($validation, 'signin')) {
            return redirect()->to('/auth')->withInput();
        }

        return $this->_login();
        // validasinya success
    }

    public function register()
    {
        if (session('email')) {
            return redirect()->to('/user');
        }

        $data = [
            'title' => 'Register Yahir Account',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);
    }

    public function regist()
    {
        $userModel = new UserModel();
        $userTokenModel = new UserTokenModel();

        $validation = [
            'firstName' => $this->request->getVar('firstName'),
            'lastName' => $this->request->getVar('lastName'),
            'email' => $this->request->getVar('email'),
            'pass1' => $this->request->getVar('pass1'),
            'pass2' => $this->request->getVar('pass2'),
        ];

        if (!$this->validation->run($validation, 'signup')) {
            return redirect()->to('/register')->withInput();
        }

        $email = htmlspecialchars($this->request->getVar('email'));
        $userData = [
            'firstName' => htmlspecialchars($this->request->getVar('firstName')),
            'lastName' => htmlspecialchars($this->request->getVar('lastName')),
            'email' => $email,
            'image' => 'default.jpg',
            'password' => password_hash($this->request->getVar('pass1'), PASSWORD_DEFAULT),
            'roles_id' => 2,
            'is_active' => 0,
        ];

        // siapkan token
        $token = base64_encode(random_bytes(32));
        $userToken = [
            'email' => $email,
            'token' => $token,
        ];

        $userTokenModel->save($userToken);
        $userModel->save($userData);

        return $this->_sendEmail($token, 'verify');
    }

    public function verify()
    {
        $userModel = new UserModel();
        $userTokenModel = new UserTokenModel();

        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $userData = $userModel->getUsers($email);
        $userToken = $userTokenModel->getToken($token);

        if ($userData) {

            if ($userToken) {
                if (strtotime(Time::now()) - strtotime($userToken['created_at']) < (60 * 60 * 24)) {

                    $userModel->is_active($email);
                    $userTokenModel->delete(['email' => $email]);
                    // $this->db->delete('user_token', ['email' => $email]);

                    $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    return redirect()->to('/auth');
                } else {
                    $userModel->delete(['email' => $email]);
                    $userTokenModel->delete(['email' => $email]);

                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    return redirect()->to('/auth');
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                return redirect()->to('/auth');
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            return redirect()->to('auth');
        }
    }

    public function logout()
    {
        $this->session->remove('email', 'roles_id');

        $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        return redirect()->to('/auth');
    }

    private function _sendEmail($token, $type)
    {

        $email   = \Config\Services::email();
        $to      = 'acengkusmana2016@gmail.com';

        $email->setTo($to);
        $email->setFrom('wasender2020@gmail.com', 'Yahir');

        // send message
        if ($type == 'verify') {
            $email->setSubject('Account Verification');
            $email->setMessage('Click this link to verify you account : {unwrap}<a href="' . base_url() . '/auth/verify?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Activate</a>{/unwrap}');
        } else if ($type == 'forgot') {
            $email->setSubject('Reset Password');
            $email->setMessage('Click this link to reset your password : <a href="' . base_url() . '/auth/resetpassword?email=' . $this->request->getVar('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        // send email
        if ($email->send()) {
            $this->session->setFlashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            return redirect()->to('/auth');
        } else {
            $data = $email->printDebugger(['header']);
            print_r($data);
            die;
        }
    }

    private function _login()
    {
        $model = new UserModel;

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $model->getUsers($email);

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $session = [
                        'id_users' => $user['id_users'],
                        'email' => $user['email'],
                        'roles_id' => $user['roles_id']
                    ];
                    $this->session->set($session);
                    // cek user accessnya
                    if ($user['roles_id'] == 1) {
                        return redirect()->to('/admin');
                    } else {
                        return redirect()->to('/user');
                    }
                } else {
                    $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    return redirect()->to('/auth')->withInput();
                }
            } else {
                $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                return redirect()->to('/auth')->withInput();
            }
        } else {
            $this->session->setFlashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            return redirect()->to('/auth')->withInput();
        }
    }

    //--------------------------------------------------------------------

}
