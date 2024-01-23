<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Type extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('m_type');
    }
    public function index()
    {
        $data['row'] = $this->m_type->get();
        $this->template->load('template', 'product/type/type_data', $data);
    }
    public function add()
    {
        $type = new stdClass();
        $type->id_type = null;
        $type->name = null;
        $data = array(
            'page' => 'add',
            'row' => $type
        );
        $this->template->load('template', 'product/type/type_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_type->get($id);
        if ($query->num_rows() > 0) {
            $type = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $type
            );
            $this->template->load('template', 'product/type/type_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('type') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_type->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->m_type->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Saved!');
        }
        redirect('type');
    }
    public function del($id)
    {
        $this->m_type->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Deleted!');
        }
        redirect('type');
    }
}
