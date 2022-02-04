<?php

class Pesanan_model extends CI_Model
{
    function getAllProduk()
    {
        return $query = $this->db->get('produk')->result_array();
    }
}
