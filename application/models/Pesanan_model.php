<?php

class Pesanan_model extends CI_Model
{

    var $table = 'order_master';
    var $column_order = array(null, 'id', 'tgl_peminjaman', 'tgl_pengembalian', null); //set column field database for datatable orderable
    var $column_search = array('id', 'tgl_peminjaman', 'tgl_pengembalian'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function getAllPesanan()
    {
        return $query = $this->db->get('order_master')->result_array();
    }

    function getPesananUser($username)
    {
        $this->db->select('*');
        $this->db->from('order_master');
        $this->db->where('username', $username);
        $this->db->order_by('tgl_peminjaman', 'desc');
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

    function updateStatus1($id)
    {
        $data = [
            "status" => '2'
        ];
        $this->db->where('id', $id);
        $this->db->update('order_master', $data);
    }

    function updateStatus2($id)
    {
        $data = [
            "status" => '3'
        ];
        $this->db->where('id', $id);
        $this->db->update('order_master', $data);
    }
}
