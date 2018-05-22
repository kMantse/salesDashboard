<?php
class Target_model extends CI_Model
{

    public function add_target($data)
    {
        $this->db->insert('ci_target', $data);
        return true;
    }

    public function get_all_target()
    {
        $query = $this->db->get('ci_target');
        return $result = $query->result_array();
    }

    public function get_target_by_id($id)
    {
        $query = $this->db->get_where('ci_target', array('target_id' => $id));
        return $result = $query->row_array();
    }

    public function edit_target($data, $id)
    {
        $this->db->where('target_id', $id);
        $this->db->update('ci_target', $data);
        return true;
    }

    public function delete($id)
    {
        return $this->db->delete('ci_target', array('product_id' => $id));

    }
    function count_where($column, $value) {
        $this->db->where($column, $value);
        $query=$this->db->get('ci_target');
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function count_all() {
        $query=$this->db->get('ci_target');
        $num_rows = $query->num_rows();
        return $num_rows;
    }

    function get_max() {
        $this->db->select_max('target_id');
        $query = $this->db->get('ci_target');
        $row=$query->row();
        $id=$row->id;
        return $id;
    }

    function get_branch_name()
    {

        $this->db->select("branch_name");

        $this->db->from('ci_branch');

        $query = $this->db->get();

        return $query->result();

    }


}

    ?>
