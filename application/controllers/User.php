<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->model('m_user');
    }
    public function index()
    {
        $data['row'] = $this->m_user->get();

        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passconf', 'Confirm Password', 'required|matches[password]', array('required' => '%s isn`t same as current Password!'));
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s still empty, please fill it in');
        $this->form_validation->set_message('min_length', '{field} minimum 5 character');
        $this->form_validation->set_message('is_unique', '{field} has been used, please try another one');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $this->template->load('template', 'user/user_form_add');
        } else {
            $post = $this->input->post(null, true);
            $this->m_user->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data saved!');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }
    public function edit($id)
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'matches[password]', array('required' => '%s isn`t same as current Password!'));
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules('passconf', 'Confirm Password', 'matches[password]', array('required' => '%s isn`t same as current Password!'));
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s still empty, please fill it in');
        $this->form_validation->set_message('min_length', '{field} minimum 5 character');
        $this->form_validation->set_message('is_unique', '{field} has been used, please try another one');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == false) {
            $query = $this->m_user->get($id);
            if ($query->num_rows() > 0) {
                $data['row'] = $query->row();
                $this->template->load('template', 'user/user_form_edit', $data);
            } else {
                echo "<script>alert('Data not found');";
                echo "window.location='" . site_url('user') . "';</script>";
            }
        } else {
            $post = $this->input->post(null, true);
            $this->m_user->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data saved!');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }
    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND id_user != '$post[id_user]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} has been used, please try another one');
            return false;
        } else {
            return true;
        }
    }
    public function del()
    {
        $id = $this->input->post('id_user');
        $this->m_user->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data deleted!');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "';</script>";
    }
}
