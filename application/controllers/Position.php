<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_position', 'position');
    }


    public function index()
    {
        $data = [
            'content'       => 'data_master/jabatan',
            'head'          => 'Data Master', // untuk sidebar agar menu aktif jika sama (samakan dengan nama)
            'title'         => 'jabatan',
            'table'       => $this->position->getAllPosition(),
            'navbar'        => getUserAndLevel($this->session->userdata('login')['email']) // utk profil navbar
        ];
        $this->load->view('templates/master', $data);
    }

    public function add()
    {
        $data = [
            'position'    => $this->input->post('position'),
            'created_at'  => date('Y-m-d')

        ];
        $this->position->insertPosition($data);
    }
    public function edit()
    {
        echo $this->input->post('position_id');
    }
}
