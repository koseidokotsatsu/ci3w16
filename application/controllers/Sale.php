<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sale extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_sale');
        $this->load->model('m_item');
        $this->load->library('form_validation');
        $this->load->library('cart');
        // $this->cart->destroy();
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
        // echo "<pre>";
        // print_r($data);
        // die;
        $this->template->load('template', 'transaction/sale/sale_form', $data);
    }
    function tambah_barang($id, $qty)
    {
        $item = $this->m_sale->lihat_barang($this->input->post('iditem'));

        if ($item->total > 100) {
            $this->session->set_flashdata('message', 'Stok Barang melebihi kapasitas');
            redirect(base_url('sale'));
            return;
        } else {
            $result = $this->m_sale->cart($id);
            $data = array(
                'id'      => $result->id_item,
                'qty'     => $qty,
                'price'   => $result->price,
                'name'    => $result->name,
                'barcode'   => $result->barcode,
                'stock' => $result->stock,
            );
            echo "Data to be inserted into cart:";
            echo "<pre>";
            print_r($data);

            $this->cart->insert($data);

            $this->session->set_userdata('cart_contents', $this->cart->contents());

            $sessionCartContents = $this->session->userdata('cart_contents');
            echo "Cart contents from session after setting:";
            echo "<pre>";
            print_r($sessionCartContents);

            $_SESSION['direct_cart_contents'] = $this->cart->contents();
            $directSessionCartContents = $_SESSION['direct_cart_contents'];
            echo "Direct cart contents from session:";
            echo "<pre>";
            print_r($directSessionCartContents);

            $totalcartcontent = $this->cart->total();
            echo "Total:";
            echo "<pre>";
            print_r($totalcartcontent);

            // die();
            redirect(base_url('sale'));
        }
    }

    function transaction()
    {
        $invoice = $this->m_sale->invoice_no();

        $payment = array(
            'invoice' => $invoice,
            'customer_name' => $this->input->post('customer'),
            'total_early' => $this->input->post('sub_total'),
            'total_final' => $this->input->post('total'),
            'discount' => $this->input->post('discount'),
            'cash' => $this->input->post('cash'),
            'remain' => $this->input->post('change'),
            'note' => $this->input->post('note'),
            'date_tf' => date('Y-m-d'),
            'hour_tf' => date('H:i:s')
        );
        $detail_penjualan =  $this->m_sale->tambah_trf($payment); //tambah data ke tabel detail
        $id_dtlpenjualan = $this->m_sale->get_id($invoice); //ambil id

        $pjl = array();
        foreach ($this->cart->contents() as $q) {
            $pjl[] = array(
                'id_item' => $q['id'],
                'stok_barang' => intval($this->m_sale->total_barang($q['id'])->row()->total) - intval($q['qty'])
            );
        }

        foreach ($this->cart->contents() as $items) {
            $penjualan[] = array(
                'id_sale'           => $id_dtlpenjualan['id'],
                'id_item'           => $items['id_item'],
                'stock'             => $items['qty'],
                'price'             => $items['price'],
                'sub_total'         => $items['subtotal']
            );
        }

        echo '<pre>';
        print_r($penjualan);
        echo '</pre>';

        die();

        $png = $this->m_sale->pengurangan_stok($pjl); //update batch di tabel stok
        $pjl = $this->m_sale->tambah_pjl($penjualan); //tambah data ke tabel penjualan
        if (!$detail_penjualan && !$pjl && !$png) {
            $this->cart->destroy();
            $this->session->set_flashdata('message', 'Penjualan Sukses');
            redirect('sale/receipt/' . $id_dtlpenjualan['id']);
        } else {
            $this->session->set_flashdata('message', 'Ooopss! Penjualan Gagal, Namun Stok Data Berubah!');
            redirect('sale');
        }
    }
}
