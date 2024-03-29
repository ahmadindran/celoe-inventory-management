<?php

class Feedback_model extends CI_Model
{

    var $table = 'feedback';
    var $column_order = array(null, 'deskripsi', null, null); //set column field database for datatable orderable
    var $column_search = array('deskripsi'); //set column field database for datatable searchable 
    var $order = array('deskripsi' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('status', '1');

        // $this->db->from($this->table);

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

    function getAllFeedback()
    {
        return $this->db->get('feedback')->result_array();
    }

    function getFeedbackById($id)
    {
        return $this->db->get_where('feedback', ['id' => $id])->row_array();
    }

    function addDataFeedback($data)
    {
        $this->db->insert('feedback', $data);
    }

    function editDataFeedback($data)
    {
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('feedback', $data);
    }

    function deleteDataFeedback($id)
    {
        $data = [
            "status" => "2"
        ];
        $this->db->where('id', $id);
        $this->db->update('feedback', $data);
    }

    function getLink()
    {
        return $this->db->get_where('feedback', ['status' => '1'])->row_array();
    }
}
