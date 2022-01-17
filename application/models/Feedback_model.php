<?php

class Feedback_model extends CI_Model
{
    function getAllFeedback()
    {
        return $query = $this->db->get('feedback')->result_array();
    }

    function getFeedbackById($id)
    {
        return $this->db->get_where('feedback', ['id' => $id])->row_array();
    }

    function addDataFeedback()
    {
        $data = [
            "deskripsi" => $this->input->post('deskripsi', true),
            "link_admin" => $this->input->post('link_admin', true),
            "link_user" => $this->input->post('link_user', true),
            "status" => '1'
        ];
        $this->db->insert('feedback', $data);
    }

    function editDataFeedback()
    {
        $data = [
            "deskripsi" => $this->input->post('deskripsi', true),
            "link_admin" => $this->input->post('link_admin', true),
            "link_user" => $this->input->post('link_user', true),
        ];
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
}
