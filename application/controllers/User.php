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
            'action'    => 'editProfile',
            'btn_value' => 'Ubah',
            'content'   => 'form/form_karyawan',
            'head'      => 'User',
            'title'     => 'my profile',
            'karyawan'  => getUserAndLevel($this->session->userdata('login')['email']),
            'position'  => $this->db->get('position')->result_array(),
            'level'     => $this->db->get('users_level')->result_array(),
            'navbar'    => getUserAndLevel($this->session->userdata('login')['email'])
        ];
        $this->load->view('templates/master', $data);
    }

    public function edit()
    {
        // if ($_FILES['picture']) {
        //     var_dump($_FILES['picture']);
        // }
        $user = $this->user->getUser('email', $this->session->userdata('login')['email']);
        $pictureName = '';
        $this->_validate();
        $generatePassword = str_replace('-', '', $this->input->post('birth_date'));
        // handle picture
        $config['upload_path']   = './assets/img/users/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; //mencegah upload backdor
        $config['max_size']      = '1024';
        $config['file_name']     = time();
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('picture')) {
            $pictureName = $user['picture'];
        } else {
            $pictures = $this->upload->data();
            $pictureName = $pictures['file_name'];
        }
        $dataInsert = [
            'level_id'          => $this->input->post('level'),
            'fullname'          => $this->input->post('name'),
            'phone_number'      => $this->input->post('phone'),
            'birth_date'        => $this->input->post('birth_date'),
            'email'             => $this->input->post('email'),
            'password'          => get_hash($generatePassword),
            'marital_status'    => $this->input->post('marital_status'),
            'child'             => $this->input->post('child'),
            'gender'            => $this->input->post('gender'),
            'id_card'           => $this->input->post('nik'),
            'picture'           => $pictureName,
            'address'           => $this->input->post('address'),
            'status'            => $this->input->post('status'),
            'position_id'       => $this->input->post('position'),
            'date_joined'       => $this->input->post('date_joined')
        ];
        $check = $this->user->updateUser($user['user_id'], $dataInsert);

        $data['status'] = TRUE;
        $data['check'] = $check;
        echo json_encode($data);
    }

    private function _validate()
    {
        $data = [];
        $data['input'] = [];
        $data['message'] = [];
        $data['status'] = TRUE;
        $data['value'] = [];

        if ($this->input->post('nik') == '') {
            $data['input'][] = 'nik';
            $data['message'][] = 'NIK tidak boleh kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('birth_date') == '') {
            $data['input'][] = 'birth_date';
            $data['message'][] = 'Tanggal lahir tidak boleh kosong';
            $data['status'] = FALSE;
        }
        if ($this->input->post('name') == '') {
            $data['input'][]    = 'name';
            $data['message'][]  = 'Nama lengkap tidak boleh kosong';
            $data['status']     = FALSE;
        }
        if ($this->input->post('email') == '') {
            $data['input'][]    = 'email';
            $data['message'][]  = 'Email tidak boleh kosong';
            $data['status']     = FALSE;
        }
        if ($this->input->post('phone') == '') {
            $data['input'][]    = 'phone';
            $data['message'][]  = 'No Handphone tidak boleh kosong';
            $data['status']     = FALSE;
        }
        if ($this->input->post('address') == '') {
            $data['input'][]    = 'address';
            $data['message'][]  = 'Alamat tidak boleh kosong';
            $data['status']     = FALSE;
        }
        if ($this->input->post('gender') == '') {
            $data['input'][]    = 'gender';
            $data['message'][]  = 'Pilih jenis kelamin terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($this->input->post('position') == '') {
            $data['input'][]    = 'position';
            $data['message'][]  = 'Pilih jabatan terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($this->input->post('marital_status') == '') {
            $data['input'][]    = 'marital_status';
            $data['message'][]  = 'Pilih status perkawinan terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($this->input->post('status') == '') {
            $data['input'][]    = 'status';
            $data['message'][]  = 'Pilih status pegawai terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($this->input->post('date_joined') == '') {
            $data['input'][]    = 'date_joined';
            $data['message'][]  = 'Pilih tanggal masuk terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($this->input->post('level') == '') {
            $data['input'][]    = 'level';
            $data['message'][]  = 'Pilih level terlebih dahulu';
            $data['status']     = FALSE;
        }
        if ($data['status'] === FALSE) {
            echo json_encode($data);
            die;
        }
    }
}
