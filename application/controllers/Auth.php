<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
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

                // Check user level and redirect accordingly
                if ($row->level == 2) {
                    echo "<script>
                        alert('Login Success');
                        window.location='" . site_url('sale') .
                        "'</script>";
                } elseif ($row->level == 1) {
                    echo "<script>
                        alert('Login Success');
                        window.location='" . site_url('dashboard') .
                        "'</script>";
                }
            } else {
                echo "<script>
                    alert('Login failed, wrong username or password');
                    window.location='" . site_url('auth/login') .
                    "'</script>";
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
        redirect('auth/login');
    }
}
