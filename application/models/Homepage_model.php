<?php

class Homepage_model extends CI_Model
{
    function getProduk($limit, $start, $keyword = null)
    {
        // $this->db->select('p.id, p.nama, b.brand, c.categories, p.stock, p.aktif, p.status, p.foto');
        // $this->db->from('produk p');
        // $this->db->join('brands b', 'p.brand_id = b.id');
        // $this->db->join('categories c', 'p.kategori_id = c.id');
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
