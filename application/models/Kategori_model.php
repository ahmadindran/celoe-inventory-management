<?php

class Kategori_model extends CI_Model
{
    function getAllKategori()
    {
        return $query = $this->db->get('categories')->result_array();
        // return $query = $this->db->get_where(['categories', ['status' => '1']])->result_array()();
    }

    function getKategoriById($id)
    {
        return $this->db->get_where('categories', ['id' => $id])->row_array();
    }

    function addDataKategori()
    {
        $data = [
            "categories" => $this->input->post('kategori', true),
            "active" => $this->input->post('active', true),
            "status" => '1'
        ];
        $this->db->insert('categories', $data);
    }

    function editDataKategori()
    {
        $data = [
            "categories" => $this->input->post('kategori', true),
            "active" => $this->input->post('active', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('categories', $data);
    }

    function deleteDataKategori($id)
    {
        $data = [
            "status" => "2"
        ];
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }
}
