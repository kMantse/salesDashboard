<?php
class Product_model extends CI_Model{

    public function add_product($data){
        $this->db->insert('ci_product', $data);
        return true;
    }

    public function get_all_product(){
        $query = $this->db->get('ci_product');
        return $result = $query->result_array();
    }

    public function get_product_by_id($id){
        $query = $this->db->get_where('ci_product', array('product_id' => $id));
        return $result = $query->row_array();
    }

    public function edit_product($data, $id){
        $this->db->where('product_id', $id);
        $this->db->update('ci_product', $data);
        return true;
    }
    public function delete( $id ){
        return $this->db->delete( 'ci_product',    array('product_id' => $id));

    }

}

?>