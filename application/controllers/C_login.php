<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login User';
            $this->load->view('templates/temp_auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/temp_auth/footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }


    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('masyarakat', ['username' => $username])->row_array();

        // var_dump($user);
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level']
                    ];

                    // kondisi
                    $this->session->set_userdata($data);
                    if ($user['level'] == 1) {
                        redirect('C_login_admin'); //admin
                    } else if ($user['level'] == 2) {
                        redirect('C_login_petugas'); //resepsonis
                    } else if ($user['level'] == 3) {
                        redirect('C_login_masyarakat'); //user
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password yang anda masukan salah! </div>');
                    redirect('C_login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
                redirect('C_login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email ini tidak terdaftar! </div>');
            redirect('C_login');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[masyarakat.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]',);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/temp_auth/header', $data);
            $this->load->view('auth/regis');
            $this->load->view('templates/temp_auth/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nik' => htmlspecialchars($this->input->post('nik', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'is_active' => 1,
                'level' => 3,
            ];

            $this->db->insert('masyarakat', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Selamat,Akun telah dibuat! Silahkan Login</div>');
            redirect('C_login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        log out</div>');
        redirect('C_login');
    }

    // login admin
    public function login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login User';
            $this->load->view('templates/temp_auth/header', $data);
            $this->load->view('auth/Login_admin');
            $this->load->view('templates/temp_auth/footer');
        } else {
            // validasinya success
            $this->_login_admin();
        }
    }


    private function _login_admin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('petugas', ['username' => $username])->row_array();
        // var_dump($user);
        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level']
                    ];

                    // kondisi
                    $this->session->set_userdata($data);
                    if ($user['level'] == '1') {
                        redirect('C_login_admin'); //admin
                    } else if ($user['level'] == '2') {
                        redirect('C_login_petugas'); //petugas

                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong password! </div>');
                        redirect('C_Login/login_admin');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> This Email has not been activeted </div>');
                    redirect('C_login/login_admin');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not register </div>');
                redirect('C_login/login_admin');
            }
        }
    }
    public function registration_admin()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[petugas.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim');
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match',
            'min_length' => 'password too short'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]',);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/temp_auth/header', $data);
            $this->load->view('auth/regis_admin');
            $this->load->view('templates/temp_auth/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'is_active' => 1,
                'level' => 'petugas',
            ];

            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Congratulation! your account has been created. Please Login</div>');
            redirect('C_login/login_admin');
        }
    }

    public function logout_admin()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        log out</div>');
        redirect('C_login/login_admin');
    }
}
