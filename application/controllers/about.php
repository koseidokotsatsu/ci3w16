<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_about');
        check_level();
        check_not_login();
    }

    public function index()
    {
        $data['about'] = $this->m_about->get_about();
        $this->template->load('template', 'frontcontroll/about/about_data', $data);
    }

    public function add()
    {
        // Add your add form logic here
    }

    // Update about data
    public function edit($id)
    {
        // Add your edit form logic here
    }

    // Delete about data
    public function delete($id)
    {
        // Add your delete logic here
    }
}
