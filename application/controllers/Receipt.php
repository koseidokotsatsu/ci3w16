<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Receipt extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_receipt');
    }
    function index($start = null, $end = null)
    {
        if (isset($_POST['search'])) {
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $data['receipt'] = $this->m_receipt->get_range($start, $end, '');
            $this->template->load('template', 'transaction/receipt/receipt', $data);
        } else {
            $data['receipt'] = $this->m_receipt->get_data();
            $this->template->load('template', 'transaction/receipt/receipt', $data);
        }
    }

    function hapus($id)
    {
        $this->m_receipt->hapus_trf($id);
        $this->m_receipt->hapus_id($id);
        redirect('receipt');
    }
}
