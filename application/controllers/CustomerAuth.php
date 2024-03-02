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
        redirect('customerauth/login');
    }
    public function register()
    {
        check_frontend_already_login(); // Check if the user is already logged in
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[customer.username]|callback_username_check');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[14]');
        $this->form_validation->set_rules('customer_name', 'Name', 'required|trim|min_length[5]|max_length[50]');

        $this->form_validation->set_message('is_unique', 'The {field} has been used already.');
        $this->form_validation->set_message('required', 'The {field} Required.');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, load the registration form again
            $this->load->view('front/register');
        } else {
            // If validation passes, process the registration
            $post = $this->input->post(null, TRUE);
            $this->m_customer->add($post); // Call the add method from the customer model to add the new customer

            // Set flashdata message
            $this->session->set_flashdata('frontlogin', 'Registration successful! You can now login.');

            // Redirect to the login page
            redirect('customerauth/login');
        }
    }
    public function username_check($username)
    {
        $existing_username = $this->m_customer->check_username($username);

        if ($existing_username) {
            // Username exists, validation failed
            $this->form_validation->set_message('username_check', 'The {field} has been used already.');
            return FALSE;
        } else {
            // Username does not exist, validation passed
            return TRUE;
        }
    }
}
