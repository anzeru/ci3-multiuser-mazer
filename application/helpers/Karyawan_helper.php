<?php

function is_logged_in($level_id)
{
    // memanggil library CI, agar bisa memakai $this
    $ci = get_instance();

    // jika tidak ada session / ada yang akses paksa melalui url, maka redirect ke auth
    if (!$ci->session->userdata('login')['email']) {
        redirect('auth');
    } else {
        //urutan pertama dari url, lihat documentasi CI tentang segment
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('menu', ['url' => $menu])->row_array();

        $menu_id = $queryMenu['menu_id'];

        $userAccess = $ci->db->get_where('users_access_menu', [
            'level_id' => $level_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function getQueryMenu($level_id)
{
    $CI = &get_instance();
    $queryMenu = "SELECT `menu`.`menu_id`, `menu`, `url`, `icon`
                FROM `menu` JOIN `users_access_menu`
                ON `menu`.`menu_id` = `users_access_menu`.`menu_id`
                JOIN `users_level` ON `users_access_menu`.`level_id` = `users_level`.`level_id`
                WHERE `users_access_menu`.`level_id` = $level_id
                ORDER BY `menu`.`orderby` ASC
    ";
    return $CI->db->query($queryMenu)->result_array();
}

function getQuerySubMenu($menu_id)
{
    $ci = get_instance();
    $querySubMenu = "SELECT *
                    FROM `submenu` JOIN `menu`
                    ON `submenu`.`menu_id` = `menu`.`menu_id`
                    WHERE `submenu`.`menu_id` = $menu_id
                    AND `submenu`.`is_active` = '1'
    ";
    return $ci->db->query($querySubMenu)->result_array();
}

function anti_injection($data)
{
    $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter;
}


/** login codeIgniter menggunakan bycrypt **/

if (!function_exists('get_hash')) {
    function get_hash($PlainPassword)
    {
        $option = [
            'cost' => 5, // proses hash sebanyak: 2^5 = 32x
        ];
        return password_hash($PlainPassword, PASSWORD_DEFAULT, $option);
    }
}

if (!function_exists('hash_verified')) {
    function hash_verified($PlainPassword, $HashPassword)
    {
        return password_verify($PlainPassword, $HashPassword) ? true : false;
    }
}

/** login codeIgniter menggunakan bycrypt **/

function getUserAndLevel($email)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('users');
    $ci->db->join('users_level', 'users_level.level_id = users.level_id');
    $ci->db->where('email', $email);
    return $ci->db->get()->row_array();
}
function getUserAndPosition()
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('users');
    $ci->db->join('position', 'position.position_id = users.position_id');
    return $ci->db->get()->result_array();
}
function getUserPositionLevel($email)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('users');
    $ci->db->join('position', 'position.position_id = users.position_id');
    $ci->db->join('users_level', 'users_level.level_id = users.level_id');
    $ci->db->where('email', $email);
    return $ci->db->get()->row_array();
}

function generateGender($data)
{
    $ci = get_instance();
    $gender = '';
    if ($data == 'm') {
        $gender = 'Laki - Laki';
    } elseif ($data == 'fm') {
        $gender = 'Peremuan';
    } else {
        $gender = 'ERROR';
    }
    return $gender;
}
function generateStatusPerkawinan($data)
{
    $ci = get_instance();
    $gender = '';
    if ($data == 'm') {
        $gender = 'Sudah Kawin';
    } elseif ($data == 'nm') {
        $gender = 'Belum Kawin';
    } else {
        $gender = 'ERROR';
    }
    return $gender;
}
