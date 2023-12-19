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
        $data['row'] = $this->m_stock->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }
    public function stock_out_data()
    {
        $data['row'] = $this->m_stock->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_in_add()
    {
        $item = $this->m_item->get()->result();
        $supplier = $this->m_supplier->get()->result();
        $data = ['item' => $item, 'supplier' => $supplier];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }
    public function stock_out_add()
    {
        $item = $this->m_item->get()->result();
        $data = ['item' => $item];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_in_del()
    {
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->m_stock->get($id_stock)->row()->qty;
        $data = ['qty' => $qty, 'id_item' => $id_item];
        $this->m_item->update_stock_out($data);
        $this->m_stock->del($id_stock);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Deleted!');
        }
        redirect('stock/in');
    }
    public function stock_out_del()
    {
        $id_stock = $this->uri->segment(4);
        $id_item = $this->uri->segment(5);
        $qty = $this->m_stock->get($id_stock)->row()->qty;
        $data = ['qty' => $qty, 'id_item' => $id_item];
        $this->m_item->update_stock_in($data);
        $this->m_stock->del($id_stock);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Deleted!');
        }
        redirect('stock/out');
    }

    public function process()
    {
        if (isset($_POST['in_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->m_stock->add_stock_in($post);
            $this->m_item->update_stock_in($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Saved!');
            }
            redirect('stock/in');
        }
    }

    public function process_out()
    {
        if (isset($_POST['out_add'])) {
            $post = $this->input->post(null, TRUE);
            $this->m_stock->add_stock_out($post);
            $this->m_item->update_stock_out($post);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock Out Tersimpan!');
            }
            redirect('stock/out');
        }
    }
}
