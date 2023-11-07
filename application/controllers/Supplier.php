<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_supplier');
    }
    public function index()
    {
        $data['row'] = $this->m_supplier->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }
    public function add()
    {
        $supplier = new stdClass();
        $supplier->id_supplier = null;
        $supplier->name = null;
        $supplier->phone = null;
        $supplier->address = null;
        $supplier->description = null;
        $data = array(
            'page' => 'add',
            'row' => $supplier
        );
        $this->template->load('template', 'supplier/supplier_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_supplier->get($id);
        if ($query->num_rows() > 0) {
            $supplier = $query->row();
            $data = array(
                'page' => 'add',
                'row' => $supplier
            );
            $this->template->load('template', 'supplier/supplier_form', $data);
        } else {
            echo "<script>alert('Data not found!');</script>";
            echo "<script>window.location='" . site_url('supplier') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_supplier->add($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Added!');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }
    public function del($id)
    {
        $this->m_supplier->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data deleted!');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }
}
