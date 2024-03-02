<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_contact');
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_not_login();
        check_level();
        $data['row'] = $this->m_contact->get();
        $this->template->load('template', 'contact/contact_data', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, set flash data with validation errors
            $error_message = '<div class="alert alert-dismissible fade show alert-danger" role="alert">';
            $error_message .= validation_errors();
            $error_message .= '</div>';
            $this->session->set_flashdata('message2', $error_message);

            // Load the contact form view again
            $this->templatefront->load('frontend/templatefront', 'frontend/contact');
        } else {
            // Form validation passed, process the form data
            $post = $this->input->post(null, true);
            $this->m_contact->add($post);

            if ($this->db->affected_rows() > 0) {
                // Data inserted successfully, set success flash data
                $this->session->set_flashdata('message2', '<div class="alert alert-dismissible fade show alert-success" role="alert">Data Sent!</div>');
                redirect('home/contact');
            }
        }
    }

    public function read($id)
    {
        check_not_login();
        check_level();

        // Mark the contact message as read in the database
        $this->m_contact->markAsRead($id);

        // Redirect back to the contact list page or any other desired page
        redirect('contact/index');
    }
}
