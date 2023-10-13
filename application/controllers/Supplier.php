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
    public function del($id)
    {
        $this->m_supplier->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data deleted!');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }
}
