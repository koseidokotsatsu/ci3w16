<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerAuth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_customer');
    }

    public function login()
    {
        check_frontend_already_login();
        $this->load->view('front/login');
    }

    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('m_customer'); // Load customer model
            $query = $this->m_customer->login($post); // Call login method from customer model
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params =  array(
                    'id_customer' => $row->id_customer // You can add more session data if needed
                );
                $this->session->set_userdata($params);
                $this->session->set_flashdata('frontlogin', 'Login Success');
                redirect('home'); // Redirect to customer dashboard or homepage
            } else {
                $this->session->set_flashdata('frontlogin', 'Login failed, wrong username or password');
                redirect('customerauth/login');
            }
        }
    }
    public function blocked()
    {
        $this->load->view('forbidden');
    }
    public function logout()
    {
        $params = array('id_customer', 'username'); // Modify session data as needed
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('frontlogin', 'You have been logged out');
        redirect('home');
    }
}
