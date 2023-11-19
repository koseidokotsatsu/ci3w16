<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['m_item', 'm_supplier', 'm_stock']);
        $this->load->helper('currency');
    }

    public function stock_in_data()
    {
        $this->template->load('template', 'transaction/stock_in/stock_in_data');
    }

    public function stock_in_add()
    {
        $item = $this->m_item->get()->result();
        $supplier = $this->m_supplier->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->m_stock->add_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Saved!');
            }
            redirect('stock/in');
        }
    }
}
