<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_position extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllPosition()
    {
        return $this->db->get('position')->result_array();
    }
    public function insertPosition($data)
    {
        $this->db->insert('position', $data);
        return $this->db->insert_id();
    }

    public function checkPosition($column, $data)
    {
        $check = $this->db
            ->where($column, $data)
            ->get('position');
        return ($check->num_rows() > 0) ? TRUE : FALSE;
    }

    public function getPosition($column, $data)
    {
        $Position = $this->db
            ->where($column, $data)
            ->get('position')->row_array();
        return $Position;
    }
    public function deletePosition($id)
    {
        $this->db
            ->where('Position_id', $id)
            ->delete('position');
    }

    public function updatePosition($Position_id, $data)
    {
        return $this->db->where('Position_id', $Position_id)
            ->update('position', $data);
    }
}
