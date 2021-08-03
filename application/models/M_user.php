<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        return $this->db->get('users')->result_array();
    }

    public function checkUser($column, $data)
    {
        $check = $this->db
            ->where($column, $data)
            ->get('users');
        return ($check->num_rows() > 0) ? TRUE : FALSE;
    }

    public function getUser($column, $data)
    {
        $user = $this->db
            ->where($column, $data)
            ->get('users')->row_array();
        return $user;
    }
}
