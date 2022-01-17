<?php

class Brand_model extends CI_Model
{
    function getAllBrand()
    {
        return $query = $this->db->get('brands')->result_array();
    }

    function getBrandById($id)
    {
        return $this->db->get_where('brands', ['id' => $id])->row_array();
    }

    function addDataBrand()
    {
        $data = [
            "brand" => $this->input->post('brand', true),
            "active" => $this->input->post('active', true),
            "status" => '1'
        ];
        $this->db->insert('brands', $data);
    }

    function editDataBrand()
    {
        $data = [
            "brand" => $this->input->post('brand', true),
            "active" => $this->input->post('active', true),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('brands', $data);
    }

    function deleteDataBrand($id)
    {
        $data = [
            "status" => "2"
        ];
        $this->db->where('id', $id);
        $this->db->update('brands', $data);
    }
}
