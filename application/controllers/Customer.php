<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('m_customer');
    }
    public function index()
    {
        $data['row'] = $this->m_customer->get();
        $this->template->load('template', 'customer/customer_data', $data);
    }
    public function add()
    {
        $customer = new stdClass();
        $customer->id_customer = null;
        $customer->username = null;
        $customer->password = null;
        $customer->name = null;
        $customer->gender = null;
        $customer->phone = null;
        $customer->address = null;
        $customer->pos_code = null;
        $data = array(
            'page' => 'add',
            'row' => $customer
        );
        $this->template->load('template', 'customer/customer_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_customer->get($id);
        if ($query->num_rows() > 0) {
            $customer = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $customer
            );
            $this->template->load('template', 'customer/customer_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('customer') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);

        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules for username only if provided
        if (!empty($post['username'])) {
            $this->form_validation->set_rules('username', 'Username', 'trim|is_unique[customer.username]');
        }

        // Set validation rules for password only if provided
        if (!empty($post['password'])) {
            $this->form_validation->set_rules('password', 'Password', 'trim|min_length[5]|max_length[14]');
        }

        // Set validation rules for other fields
        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('pos_code', 'Pos Code', 'trim|required');

        // Run form validation
        if ($this->form_validation->run() == FALSE) {
            // If validation fails, set flash messages and redirect
            $this->session->set_flashdata('error', validation_errors());
            redirect('customer/add'); // Change this to the appropriate redirect URL
        } else {
            // If validation passes, continue with adding/editing data
            if (isset($_POST['add'])) {
                $this->m_customer->add($post);
            } elseif (isset($_POST['edit'])) {
                $this->m_customer->edit($post);
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Saved!');
            }
            redirect('customer');
        }
    }

    public function del($id)
    {
        $this->m_customer->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data deleted!');</script>";
        }
        echo "<script>window.location='" . site_url('customer') . "';</script>";
    }
}
