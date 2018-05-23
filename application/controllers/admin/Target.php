<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class target extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Target_model', 'target_model');
        $this->load->model('admin/Branch_model', 'branch_model');
        $this->load->model('admin/Product_model', 'product_model');

    }

    public function index(){



        $data['targets'] =  $this->target_model->get_targets_detail();
        $data['view'] = 'admin/target/target_list';
        $this->load->view('admin/layout', $data);

         
    }


    public function add(){
        if($this->input->post('submit')){

            $this->form_validation->set_rules('product_id', 'Product name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch name', 'trim|required');
            $this->form_validation->set_rules('target_duration', 'Target duration', 'trim|required');
            $this->form_validation->set_rules('target_volume', 'Number', 'trim|required');
            $this->form_validation->set_rules('target_value', 'Number', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['branches'] = $this->branch_model->get_all_branch();
                $data['products'] = $this->product_model->get_all_product();
                $data['view'] = 'admin/target/target_add';
                $this->load->view('admin/layout', $data);
            }
            else{
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'branch_id' => $this->input->post('branch_id'),
                    'target_duration' => $this->input->post('target_duration'),
                    'target_volume' => $this->input->post('target_volume'),
                    'target_value' => $this->input->post('target_value'),
                );

                $data = $this->security->xss_clean($data);
                $result = $this->target_model->add_target($data);
                if($result){
                    $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                    redirect(site_url('admin/target'));
                }
            }
        }
        else{
            $data['branches'] = $this->branch_model->get_all_branch();
            $data['products'] = $this->product_model->get_all_product();

            $data['view'] = 'admin/target/target_add';
            $this->load->view('admin/layout', $data);
        }

    }

    public function edit($id = 0){

        $target = $this->target_model->get_target_by_id($id);
        $target_branch = $this->branch_model->get_branch_by_id($target['branch_id']);
        $target_product = $this->product_model->get_product_by_id($target['product_id']);
       if($this->input->post('submit')){
            $this->form_validation->set_rules('product_id', 'Product name', 'trim|required');
            $this->form_validation->set_rules('branch_id', 'Branch name', 'trim|required');
            $this->form_validation->set_rules('target_duration', 'Target duration', 'trim|required');
            $this->form_validation->set_rules('target_volume', 'Number', 'trim|required');
            $this->form_validation->set_rules('target_value', 'Number', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['target'] = $target;
                $data['branch'] = $target_branch;
                $data['product'] = $target_product;
                $data['branches'] = $this->branch_model->get_all_branch();
                $data['products'] = $this->product_model->get_all_product();
                $data['view'] = 'admin/target/target_edit';
                $this->load->view('admin/layout', $data);
            }
            else{
                $data = array(
                    'product_id' => $this->input->post('product_id'),
                    'branch_id' => $this->input->post('branch_id'),
                    'target_duration' => $this->input->post('target_duration'),
                    'target_volume' => $this->input->post('target_volume'),
                    'target_value' => $this->input->post('target_value'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->target_model->edit_target($data, $id);
                if($result){
                    $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                    redirect(site_url('admin/target'));
                }
            }
        }
        else{
                $data['target'] = $target;
                $data['branch'] = $target_branch;
                $data['product'] = $target_product;
                $data['branches'] = $this->branch_model->get_all_branch();
                $data['products'] = $this->product_model->get_all_product();
                $data['view'] = 'admin/target/target_edit';
                $this->load->view('admin/layout', $data);
        }
    }

    public function del($id = 0){
        $this->db->delete('ci_users', array('id' => $id));
        $this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
        redirect(site_url('admin/target'));
    }

    public function viewTargetProd(){

    }

}


?>