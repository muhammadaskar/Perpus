<?php

class AdminModel extends CI_Model
{
    public function getAdminByEmail($email)
    {
        return $this->db->get_where('admin', ['email' => $email])->row_array();
    }

    public function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }

    public function tambahAdmin($data)
    {
        $this->db->insert('admin', $data);
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }
}
