<?php

class Akun_model extends CI_Model
{

    var $table = 'user';
    var $column_order = array(null, 'nama', 'username', 'email', 'level', null); //set column field database for datatable orderable
    var $column_search = array('nama', 'username', 'email'); //set column field database for datatable searchable 
    var $order = array('username' => 'asc'); // default order 

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

    function addDataAkun($data)
    {
        $this->db->insert('user', $data);
    }

    function editDataAkun($data)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    function updateAkun($data)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    function updatePass($data)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }

    function deleteDataAkun($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }

    function getAkunByUname($username)
    {
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    function getAllAkun()
    {
        return $query = $this->db->get('user')->result_array();
    }
}
