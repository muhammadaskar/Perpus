<?php

class Auth extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('UserModel', 'User');
        $this->load->model('AdminModel', 'Admin');
    }

    public function index()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->_templates('login', $data);
        } else {
            $this->_userLogin();
        }
    }

    public function login_admin()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->_templates('login_admin', $data);
        } else {
            $this->_authAdmin();
        }
    }

    private function _authAdmin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->Admin->getAdminByEmail($email);

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'email' => $admin['email'],
                    'admin' => $admin['nama']
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password tidak sesuai!</div>');
                redirect('auth/login_admin');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            redirect('auth/login_admin');
        }
    }

    private function _userLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User->getUserbyE($email);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'user' => $user['nama'],
                        'id' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('main');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password tidak sesuai!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email belum diaktivasi, silahkan aktivasi akun anda!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $data['judul'] = 'Register';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'Email telah tedaftar'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sesuai',
            'min_length' => 'Password terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->_templates('register', $data);
        } else {
            $email = $this->input->post('email');
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $email,
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'is_active' => 1
            ];
            $this->User->register($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data berhasil disimpan, silahkan login!</div>');
            redirect('auth');
        }
    }

    private function _templates($view, $data)
    {
        $this->load->view('templates/authHeader', $data);
        $this->load->view("auth/$view");
        $this->load->view('templates/authFooter');
    }

    public function logoutAdmin()
    {
        $this->session->unset_userdata('admin');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        anda telah keluar!!</div>');
        redirect('auth/login_admin');
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Anda telah keluar</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
