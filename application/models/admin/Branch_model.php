<?php
/**
 * Created by PhpStorm.
 * User: Kofi
 * Date: 5/14/2018
 * Time: 1:24 AM
 */
class Branch_model extends CI_Model
{

    public function add_branch($data)
    {
        $this->db->insert('ci_branch', $data);
        return true;
    }

    public function get_all_branch()
    {
        $query = $this->db->get('ci_branch');
        return $result = $query->result_array();
    }

    public function get_branch_by_id($id)
    {
        $query = $this->db->get_where('ci_branch', array('branch_id' => $id));
        return $result = $query->row_array();
    }

    public function edit_branch($data, $id)
    {
        $this->db->where('branch_id', $id);
        $this->db->update('ci_branch', $data);
        return true;
    }

    public function delete($id)
    {
        return $this->db->delete('ci_branch', array('branch_id' => $id));

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