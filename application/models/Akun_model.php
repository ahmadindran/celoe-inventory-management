<?php

class Akun_model extends CI_Model
{
    function addDataAkun()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true),
            "password" => MD5($this->input->post('password', true)),
            "level" => $this->input->post('level', true)
        ];
        $this->db->insert('user', $data);
    }

    function editDataAkun()
    {
        if ($this->input->post('password' != '')) {
            $data = [
                "nama" => $this->input->post('nama', true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email', true),
                "password" => MD5($this->input->post('password', true)),
                "level" => $this->input->post('level', true)
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);
        } else {
            $data = [
                "nama" => $this->input->post('nama', true),
                "username" => $this->input->post('username', true),
                "email" => $this->input->post('email', true),
                "level" => $this->input->post('level', true)
            ];
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user', $data);
        }
    }

    function updateAkun()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "username" => $this->input->post('username', true),
            "email" => $this->input->post('email', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    function updatePass()
    {
        $data = [
            "password" => MD5($this->input->post('passwordNew', true))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    function deleteDataAkun($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }

    function getAkunByUname($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    function getAllAkun()
    {
        return $query = $this->db->get('user')->result_array();
    }
}
