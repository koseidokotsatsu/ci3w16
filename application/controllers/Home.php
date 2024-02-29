<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_item');
        $this->load->library('session');
    }

    public function index()
    {
        // Load other necessary data for the home page
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
    public function user()
    {
        if (!$this->session->userdata('id_customer')) {
            redirect('customer_auth/login');
        }

        $this->load->model('m_customer');
        $id_customer = $this->session->userdata('id_customer');
        $data['cust'] = $this->m_customer->get_user_by_id($id_customer);

        $this->templatefront->load('frontend/templatefront', 'frontend/user', $data);
    }

    public function custedit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');

        // If password field is not empty, apply validation rules
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[15]');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('custedit', '<div class="alert alert-dismissible fade show alert-danger" role="alert">Profile update failed. Please check the form and try again.</div>');
            // print_r('');
            // die;
            redirect('home/user');
        } else {
            // Validation passed, proceed with updating the profile
            $this->load->model('m_customer');
            $post = $this->input->post(null, true);
            $this->m_customer->edit($post);
            $this->session->set_flashdata('custedit', '<div class="alert alert-dismissible fade show alert-success" role="alert">Profile update successfully</div>');
            redirect('home/user');
        }
    }

    public function view_cart()
    {
        check_frontend_not_login();
        $this->load->model('m_cart');
        $data['cart_items'] = $this->m_cart->get_cart_items();

        // Load the view with cart data
        $this->templatefront->load('frontend/templatefront', 'frontend/cart', $data);
    }

    public function add_to_cart($item_id)
    {
        $this->load->model('m_item');
        $item = $this->m_item->get_item_details($item_id);

        $this->load->model('m_cart');
        $this->m_cart->add_to_cart($item);

        redirect('home');
    }


    public function remove_from_cart($cart_id)
    {
        $this->load->model('m_cart');
        $this->m_cart->remove_from_cart($cart_id);

        redirect('home/view_cart');
    }
}
