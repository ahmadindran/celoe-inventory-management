<?php

class Pesanan_model extends CI_Model
{
    function getAllProduk()
    {
        return $query = $this->db->get('produk')->result_array();
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
}
