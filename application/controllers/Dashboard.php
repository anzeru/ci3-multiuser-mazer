<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model('m_user', 'user');
        $user = $this->user->getUser('email', $this->session->userdata('login')['email']);
        is_logged_in($user['level_id']);
    }

    public function index()
    {
        $data = [
            'content'   => 'admin/dashboard',
            'head'      => 'Dashboard',
            'title'     => 'Dashboard',
            'navbar'      => getUserAndLevel($this->session->userdata('login')['email'])
        ];
        $this->load->view('templates/master', $data);
    }
}
