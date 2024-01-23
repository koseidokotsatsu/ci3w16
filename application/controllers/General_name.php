<?php
defined('BASEPATH') or exit('No direct script access allowed');

class General_name extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('m_general_name');
    }
    public function index()
    {
        $data['row'] = $this->m_general_name->get();
        $this->template->load('template', 'product/general_name/general_name_data', $data);
    }
    public function add()
    {
        $general_name = new stdClass();
        $general_name->id_general_name = null;
        $general_name->name = null;
        $data = array(
            'page' => 'add',
            'row' => $general_name
        );
        $this->template->load('template', 'product/general_name/general_name_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_general_name->get($id);
        if ($query->num_rows() > 0) {
            $general_name = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $general_name
            );
            $this->template->load('template', 'product/general_name/general_name_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('general_name') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_general_name->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->m_general_name->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Saved!');
        }
        redirect('general_name');
    }
    public function del($id)
    {
        $this->m_general_name->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Deleted!');
        }
        redirect('general_name');
    }
}
