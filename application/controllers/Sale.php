<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_sale');
        $this->load->model(['m_item']);
    }
    public function index()
    {
        $this->load->model('m_customer');
        $customer = $this->m_customer->get()->result();
        $item = $this->m_item->get()->result();
        $data = array(
            'customer' => $customer,
            'item' => $item,
            'invoice' => $this->m_sale->invoice_no(),
        );
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }

    
}
