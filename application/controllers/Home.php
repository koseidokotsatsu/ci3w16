<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_item');
        $data['items'] = $this->m_item->get_datatables();
        $this->templatefront->load('frontend/templatefront', 'frontend/home', $data);
    }
    public function product()
    {
        $this->load->model('m_item');
        $data['items'] = $this->m_item->get_datatables();
        $this->templatefront->load('frontend/templatefront', 'frontend/product', $data);
    }
    public function product_detail()
    {
        $this->templatefront->load('frontend/templatefront', 'frontend/product_detail');
    }
    public function about()
    {
        $this->templatefront->load('frontend/templatefront', 'frontend/about');
    }
    public function contact()
    {
        $this->templatefront->load('frontend/templatefront', 'frontend/contact');
    }
    public function cart()
    {
        $this->templatefront->load('frontend/templatefront', 'frontend/cart');
    }
}
