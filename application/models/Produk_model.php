<?php

class Produk_model extends CI_Model
{
    function getAllProduk()
    {
        return $query = $this->db->get('produk')->result_array();
        // return $query = $this->db->get_where('produk', array('status' => $status));
    }

    function getBrandForProduk()
    {
        return $query = $this->db->get('brands')->result_array();
    }

    function getKategoriForProduk()
    {
        return $query = $this->db->get('categories')->result_array();
    }

    function getProdukById($id)
    {
        return $this->db->get_where('produk', ['id' => $id])->row_array();
    }

    function addDataProduk($input)
    {
        // $file
        // $data = [
        //     "id" => $this->input->post('id', true),
        //     "nama" => $this->input->post('nama', true),
        //     "brand" => $this->input->post('brand', true),
        //     "kategori" => $this->input->post('kategori', true),
        //     "stock" => $this->input->post('stock', true),
        //     "aktif" => $this->input->post('active', true),
        //     "status" => '1',
        //     // "foto" => $this->input->post('file')
        //     "foto" => $file['file_name']
        // ];
        return $this->db->insert('produk', $input);
    }

    function editDataProduk()
    {
        $data = [
            "id" => $this->input->post('id-new', true),
            "nama" => $this->input->post('nama', true),
            "brand" => $this->input->post('brand', true),
            "kategori" => $this->input->post('kategori', true),
            "stock" => $this->input->post('stock', true),
            "aktif" => $this->input->post('active', true),
            "status" => '1'
            // "foto" => $this->input->post('foto', true)
        ];
        $this->db->where('id', $this->input->post('id-old'));
        $this->db->update('produk', $data);
    }

    function deleteDataProduk($id)
    {
        $data = [
            "status" => "2"
        ];
        $this->db->where('id', $id);
        $this->db->update('produk', $data);
    }
}
