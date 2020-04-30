<?php

class AdminModel extends CI_Model
{
    public function getAdminByEmail($email)
    {
        // $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        // return $this->db->query($query)->row_array();
        return $this->db->get_where('admin', ['email' => $email])->row_array();
    }
}
