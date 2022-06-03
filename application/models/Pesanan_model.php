<?php

class Pesanan_model extends CI_Model
{

    // // start datatables
    // var $column_order = array(null, 'id', 'tanggal', 'nama', 'nip', 'unit', 'nde'); //Sesuaikan dengan field
    // var $column_search = array('id', 'tanggal', 'nama', 'nip', 'unit'); //field yang diizin untuk pencarian 
    // var $order = array('tanggal' => 'DESC'); // default order 

    // private function _get_datatables_query()
    // {
    //     $this->db->select('id', 'tanggal', 'nama', 'nip', 'unit', 'nde');
    //     $this->db->from('order_master');
    //     // $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
    //     // $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
    //     $i = 0;
    //     foreach ($this->column_search as $item) { // loop column 
    //         if (@$_POST['search']['value']) { // if datatable send POST for search
    //             if ($i === 0) { // first loop
    //                 $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }
    //             if (count($this->column_search) - 1 == $i) //last loop
    //                 $this->db->group_end(); //close bracket
    //         }
    //         $i++;
    //     }

    //     if (isset($_POST['order'])) { // here order processing
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     } else if (isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }

    // function get_datatables()
    // {
    //     $this->_get_datatables_query();
    //     if (@$_POST['length'] != -1)
    //         $this->db->limit(@$_POST['length'], @$_POST['start']);
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    // function count_filtered()
    // {
    //     $this->_get_datatables_query();
    //     $query = $this->db->get();
    //     return $query->num_rows();
    // }

    // function count_all()
    // {
    //     $this->db->from('order_master');
    //     return $this->db->count_all_results();
    // }
    // end datatables

    var $table = 'order_master'; //nama tabel dari database
    var $column_order = array(null, 'id', 'tanggal', 'nama', 'nip', 'unit', 'nde'); //Sesuaikan dengan field
    var $column_search = array('id', 'tanggal', 'nama', 'nip', 'unit'); //field yang diizin untuk pencarian 
    var $order = array('tanggal' => 'DESC'); // default order 

    private function _get_datatables_query()
    {

        $this->db->select('id', 'tanggal', 'nama', 'nip', 'unit', 'nde');
        $this->db->from('order_master');
        // $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        // $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
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

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    //     $this->db->from($this->table);

    //     $i = 0;

    //     foreach ($this->column_search as $item) // looping awal
    //     {
    //         if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
    //         {

    //             if ($i === 0) // looping awal
    //             {
    //                 $this->db->group_start();
    //                 $this->db->like($item, $_POST['search']['value']);
    //             } else {
    //                 $this->db->or_like($item, $_POST['search']['value']);
    //             }

    //             if (count($this->column_search) - 1 == $i)
    //                 $this->db->group_end();
    //         }
    //         $i++;
    //     }

    //     if (isset($_POST['order'])) {
    //         $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    //     } else if (isset($this->order)) {
    //         $order = $this->order;
    //         $this->db->order_by(key($order), $order[key($order)]);
    //     }
    // }

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
