<?php

class Homepage_model extends CI_Model
{
    function getProduk($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama', $keyword);
            $this->db->or_like('id', $keyword);
        } else {
            # code...
        }

        // $query = $this->db->query('SELECT * FROM produk WHERE status="1" LIMIT ' . $limit . ',' . $start);
        // return $query->result_array();;
        // return $this->db->get('produk', $limit, $start)->result_array();
        return $this->db->get_where('produk', array('status' => '1'), $limit, $start)->result_array();
    }

    function countAllProduk()
    {
        return $this->db->get('produk')->num_rows();
    }

    function countUser()
    {
        return $this->db->get('user')->num_rows();
    }

    function countPesanan()
    {
        $query = $this->db->query('SELECT * FROM order_master');
        return $query->num_rows();
    }

    function countProses()
    {
        $query = $this->db->query('SELECT * FROM order_master WHERE NOT status = "3" ');
        return $query->num_rows();
    }

    function countSelesai()
    {
        $query = $this->db->query('SELECT * FROM order_master WHERE status = "3" ');
        return $query->num_rows();
    }
}
