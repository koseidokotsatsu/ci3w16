<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_category');
    }
    public function index()
    {
        $data['row'] = $this->m_category->get();
        $this->template->load('template', 'product/category/category_data', $data);
    }
    public function add()
    {
        $category = new stdClass();
        $category->id_category = null;
        $category->name = null;
        $data = array(
            'page' => 'add',
            'row' => $category
        );
        $this->template->load('template', 'product/category/category_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_category->get($id);
        if ($query->num_rows() > 0) {
            $category = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $category
            );
            $this->template->load('template', 'product/category/category_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('category') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_category->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->m_category->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Saved!');
        }
        redirect('category');
    }
    public function del($id)
    {
        $this->m_category->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Deleted!');
        }
        redirect('category');
    }
}
