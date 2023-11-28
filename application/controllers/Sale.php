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
        $this->load->library('form_validation');
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

    public function process_payment()
    {
        $this->load->model('m_sale');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('date', 'Date', 'trim|required');
        $this->form_validation->set_rules('customer', 'Customer', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            //
        } else {

            $invoice            = $this->input->post('invoice');
            $id_customer        = $this->input->post('customer');
            $total_price        = $this->input->post('total');
            $discount           = $this->input->post('discount');
            $cash               = $this->input->post('cash');
            $remaining          = $this->input->post('change');
            $note               = $this->input->post('note');
            $date               = $this->input->post('date');
            $id_user            = $this->input->post('id_user');

            $invoice = $this->m_sale->invoice_no();

            $data = array(
                'invoice' => $invoice,
                'id_customer' => $this->input->post('customer'),
                'total_price' => $this->input->post('total'),
                'discount' => $this->input->post('discount'),
                'cash' => $this->input->post('cash'),
                'remaining' => $this->input->post('change'),
                'note' => $this->input->post('note'),
                'date' => $this->input->post('date'),
                'id_user' => $this->session->userdata('id_user'),
            );

            $this->m_sale->save_sale($data, 't_sale');

            redirect('sale/index');
        }
    }
}
