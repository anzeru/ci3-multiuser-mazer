<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user', 'user');

        $user = $this->user->getUser('email', $this->session->userdata('login')['email']);
        is_logged_in($user['level_id']);
    }


    public function profile()
    {
        $data = [
            'content'   => 'user/profile',
            'head'      => 'User',
            'title'     => 'profile',
            'user'      => getUserAndLevel($this->session->userdata('login')['email']),
            'position'  => $this->db->get('position')->result_array(),
            'level'     => $this->db->get('users_level')->result_array(),
        ];
        $this->load->view('templates/master', $data);
    }
}
