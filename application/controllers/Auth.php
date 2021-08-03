<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('m_user', 'user');
    }

    public function index()
    {
        if ($this->session->userdata('login')) {
            redirect('user/profile');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'content'   => 'auth/login',
                'title'     => 'Login'
            ];
            $this->load->view('templates/master_auth', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $checkRegistered =  $this->user->getUser('email', $email); // check user apakah sudah terdaftar
        if ($checkRegistered) {
            $user = $this->user->getUser('email', $email);
            if (hash_verified(anti_injection($password), $user['password'])) {
                $dataSession = [
                    'email'        => $user['email'],
                    'level_id'     => $user['level_id']
                ];
                $this->session->set_userdata('login', $dataSession);
                if ($user['level_id'] == 1) {
                    redirect('dashboard');
                } elseif ($user['level_id'] == 2) {
                    redirect('dashboard');
                } elseif ($user['level_id'] == 3) {
                    redirect('user/profile');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Email atau password salah</div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">Email atau password salah</div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login');
        redirect('auth');
    }
}
