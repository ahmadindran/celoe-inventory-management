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

        return $this->db->get('produk', $limit, $start)->result_array();
    }

    function countAllProduk()
    {
        return $this->db->get('produk')->num_rows();
    }
}
