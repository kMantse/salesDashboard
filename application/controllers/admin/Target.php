<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class target extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('admin/target_model', 'target_model');
        $this->load->model('admin/branch_model', 'branch_model');
    }

    public function index(){
        $data['all_target'] =  $this->target_model->get_all_target();
        $data['view'] = 'admin/target/target_list';
        $this->load->view('admin/layout', $data);

         $data['branch_drop_down'] = $this->branch_model->get_all_branch();
         $data['view'] = 'admin/target/target_add';
         $this->load->view('admin/layout', $data);

    }


    public function add(){
        if($this->input->post('submit')){

            $this->form_validation->set_rules('product_name', 'Product name', 'trim|required');
            $this->form_validation->set_rules('branch_name', 'Branch name', 'trim|required');
            $this->form_validation->set_rules('target_duration', 'Target duration', 'trim|required');
            $this->form_validation->set_rules('target_volume', 'Number', 'trim|required');
            $this->form_validation->set_rules('target_value', 'Number', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
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
                    redirect(base_url('admin/target'));
                }
            }
        }
        else{

            $data['view'] = 'admin/target/target_add';
            $this->load->view('admin/layout', $data);
        }

    }

    public function edit($id = 0){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('firstname', 'Username', 'trim|required');
            $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
            $this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['user'] = $this->user_model->get_user_by_id($id);
                $data['view'] = 'admin/users/user_edit';
                $this->load->view('admin/layout', $data);
            }
            else{
                $data = array(
                    'username' => $this->input->post('firstname').' '.$this->input->post('lastname'),
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email' => $this->input->post('email'),
                    'mobile_no' => $this->input->post('mobile_no'),
                    'password' =>  password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'is_admin' => $this->input->post('user_role'),
                    'updated_at' => date('Y-m-d : h:m:s'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->user_model->edit_user($data, $id);
                if($result){
                    $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                    redirect(base_url('admin/users'));
                }
            }
        }
        else{
            $data['user'] = $this->user_model->get_user_by_id($id);
            $data['view'] = 'admin/users/user_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    public function del($id = 0){
        $this->db->delete('ci_users', array('id' => $id));
        $this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
        redirect(base_url('admin/users'));
    }

    public function viewTargetProd(){

    }

}


?>