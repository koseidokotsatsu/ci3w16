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
        check_level();
        $this->m_receipt->hapus_trf($id);
        $this->m_receipt->hapus_id($id);
        redirect('receipt');
    }

    public function edit($id)
    {
        // $data['sale'] = $this->m_sale->get_id($id);

        // print_r($data);
        // die;

        $query = $this->m_receipt->get($id);

        if ($query->num_rows() > 0) {
            $sale = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $sale
            );
            $this->template->load('template', 'transaction/delivery/sale_edit', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('receipt') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_receipt->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->m_receipt->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Saved!');</script>";
        }
        echo "<script>window.location='" . site_url('receipt') . "';</script>";
    }
}
