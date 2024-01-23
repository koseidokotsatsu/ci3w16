<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->output->set_status_header('404');
        return $this->load->view('filenotexist');
    }
}
