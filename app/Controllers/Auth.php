<?php

namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public function index()
    {

        $data = [
            'title' => 'Yahir Login',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/index', $data);
    }

    public function login()
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
            return redirect()->to('/auth')->withInput();
        }

        return $this->_login();
        // validasinya success
    }


    private function _login()
    {
        $model = new UsersModel;

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

    public function register()
    {
        $data = [
            'title' => 'Register Yahir Account',
            'validation' => \Config\Services::validation()
        ];
        return view('auth/register', $data);










        // $this->form_validation->set_rules('name', 'Name', 'required|trim');
        // $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        //     'is_unique' => 'This email has already registered!'
        // ]);
        // $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        //     'matches' => 'Password dont match!',
        //     'min_length' => 'Password too short!'
        // ]);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        // if ($this->form_validation->run() == false) {
        //     $data['title'] = 'WPU User Registration';
        //     $this->load->view('templates/auth_header', $data);
        //     $this->load->view('auth/registration');
        //     $this->load->view('templates/auth_footer');
        // } else {
        //     $email = $this->input->post('email', true);
        //     $data = [
        //         'name' => htmlspecialchars($this->input->post('name', true)),
        //         'email' => htmlspecialchars($email),
        //         'image' => 'default.jpg',
        //         'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        //         'role_id' => 2,
        //         'is_active' => 0,
        //         'date_created' => time()
        //     ];

        //     // siapkan token
        //     $token = base64_encode(random_bytes(32));
        //     $user_token = [
        //         'email' => $email,
        //         'token' => $token,
        //         'date_created' => time()
        //     ];

        //     $this->db->insert('user', $data);
        //     $this->db->insert('user_token', $user_token);

        //     $this->_sendEmail($token, 'verify');

        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
        //     redirect('auth');
    }

    public function regist()
    {
        $model = new UsersModel();

        if (!$this->validate(
            [
                'firstName' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Kamu wajib mengisi {field}.'
                    ]
                ],
                'lastName' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Kamu wajib mengisi {field}.'
                    ]
                ],
                'email' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Kamu wajib mengisi {field}.'
                    ]
                ],
                'pass1' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Kamu wajib mengisi {field}.'
                    ]
                ],
                'pass2' => [
                    'rules'  => 'required',
                    'errors' => [
                        'required' => 'Kamu wajib mengisi {field}.'
                    ]
                ],
            ]
        )) {
            return redirect()->to('/register')->withInput();
        }

        $data = [
            'name' => $this->request->getVar('firstName'),
            'email' => $this->request->getVar('email'),
            'image' => 'default.jpg',
            'password' => password_hash($this->request->getVar('pass1'), PASSWORD_DEFAULT),
            'roles_id' => 2,
            'is_active' => 1,
        ];

        $model->save($data);
        return redirect()->to('/admin');
    }

    //--------------------------------------------------------------------

}
