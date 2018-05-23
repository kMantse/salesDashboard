<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/branch_model', 'branch_model');
    }

    public function index()
    {
        $data['all_branch'] = $this->branch_model->get_all_branch();
        $data['view'] = 'admin/branch/branch_list';
        $this->load->view('admin/layout', $data);
    }

    public function add()
    {
        if ($this->input->post('submit')) {

            $this->form_validation->set_rules('branch_name', 'Branch', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                $data['view'] = 'admin/branch/branch_add';
                $this->load->view('admin/layout', $data);
            } else {
                $data = array(
                    'branch_name' => $this->input->post('branch_name'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->branch_model->add_branch($data);
                if ($result) {
                    $this->session->set_flashdata('msg', 'Record is Added Successfully!');
                    redirect(site_url('admin/branch'));
                }
            }
        } else {
            $data['view'] = 'admin/branch/branch_add';
            $this->load->view('admin/layout', $data);
        }

    }
    public function edit($id = 0){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('branch_name', 'Branch', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $data['branch'] = $this->branch_model->get_branch_by_id($id);
                $data['view'] = 'admin/branch/branch_edit';
                $this->load->view('admin/layout', $data);
            }
            else{
                $data = array(
                    'branch_name' => $this->input->post('branch_name'),
                );
                $data = $this->security->xss_clean($data);
                $result = $this->branch_model->edit_branch($data, $id);
                if($result){
                    $this->session->set_flashdata('msg', 'Record is Updated Successfully!');
                    redirect(site_url('admin/branch'));
                }
            }
        }
        else{
            $data['branch'] = $this->branch_model->get_branch_by_id($id);
            $data['view'] = 'admin/branch/branch_edit';
            $this->load->view('admin/layout', $data);
        }
    }

    public function del($id = 0){
        $this->db->delete('ci_branch', array('branch_id' => $id));
        $this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
        redirect(site_url('admin/branch'));
    }

}
?>