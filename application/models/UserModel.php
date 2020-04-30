<?php

class UserModel extends CI_Model
{
    public function register($data)
    {
        $this->db->insert('user', $data);
    }

    function getUserByEmail()
    {
        return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    }

    function getUserbyE($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }
}
