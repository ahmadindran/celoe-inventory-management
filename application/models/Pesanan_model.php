<?php

class Pesanan_model extends CI_Model
{
    function getAllPesanan()
    {
        return $query = $this->db->get('order_master')->result_array();
    }

    function getPesananUser($username)
    {
        $this->db->select('*');
        $this->db->from('order_master');
        $this->db->where('username', $username);
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllProduk()
    {
        return $query = $this->db->get('produk')->result_array();
    }

    function getJson()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('aktif', '1');
        $this->db->where('status', '1');
        $this->db->where('stock >', '1');
        $query = $this->db->get();
        return json_encode($query->result(), JSON_PRETTY_PRINT);
    }

    function countDataUsername($username)
    {
        $this->db->select('*');
        $this->db->from('order_master');
        $this->db->where('username', $username);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function addDataPesananMaster($master)
    {
        return $this->db->insert('order_master', $master);
    }

    function addDataPesananDetil($data)
    {
        return $this->db->insert_batch('order_detail', $data);
    }

    function getMasterData($id)
    {
        // $this->db->select('*');
        // $this->db->from('order_master');
        // $this->db->where('id', $id);
        // $query = $this->db->get();
        // return $query->result_array();
        return $this->db->get_where('order_master', ['id' => $id])->row_array();
    }

    function getDetailData($id)
    {
        $this->db->select('p.nama, d.banyak');
        $this->db->from('order_detail d');
        $this->db->join('produk p', 'd.produk_id = p.id');
        $this->db->where('d.id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
