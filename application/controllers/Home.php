<?php
defined('BASEPATH') or exit('No direct script access allowed');

class home extends CI_Controller
{
    public function index()
    {
        $this->load->view('frontend/home');
    }
    public function about()
    {
        $this->load->view('frontend/about');
    }
    public function blog()
    {
        $this->load->view('frontend/blog');
    }
    public function blog_details()
    {
        $this->load->view('frontend/blog_details');
    }
    public function contact()
    {
        $this->load->view('frontend/contact');
    }
}
