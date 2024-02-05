<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        redirect('auth/login');
    }
    public function login()
    {
        check_already_login();
        $this->load->view('login');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($post['login'])) {
            $this->load->model('m_user');
            $query = $this->m_user->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params =  array(
                    'id_user' => $row->id_user,
                    'level' => $row->level
                );
                $this->session->set_userdata($params);

                if ($row->level == 2) {
                    $this->session->set_flashdata('login', 'Login Success');
                    redirect('sale');
                } elseif ($row->level == 1) {
                    $this->session->set_flashdata('login', 'Login Success');
                    redirect('dashboard');
                }
            } else {
                $this->session->set_flashdata('login', 'Login failed, wrong username or password');
                redirect('auth/login');
            }
        }
    }
    public function blocked()
    {
        $this->load->view('forbidden');
    }
    public function logout()
    {
        $params = array('id_user', 'level');
        $this->session->unset_userdata($params);
        $this->session->set_flashdata('login', 'You have been logged out');
        redirect('auth/login');
    }
}
