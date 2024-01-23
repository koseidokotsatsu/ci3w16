<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();

        $this->load->library('form_validation');
        $this->load->model('m_user');
    }
    public function index()
    {
        check_level();
        $data['row'] = $this->m_user->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    public function add()
    {
        check_level();
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
            $post['profile_image'] = $this->handleProfileImage();
            $this->m_user->add($post);

            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data saved!');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    private function handleProfileImage()
    {
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2024;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                $upload_data = $this->upload->data();
                return $upload_data['file_name'];
            } else {
                echo $this->upload->display_errors();
                exit;
            }
        } else {
            return 'default.jpg';
        }
    }
    private function deleteOldProfileImage($imageName)
    {
        $imagePath = './assets/img/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        $data['user'] = $this->m_user->get($id)->row();
        $data['level'] = $this->fuct->user_login()->level;

        $loggedInUserLevel = $this->fuct->user_login()->level;
        // var_dump($loggedInUserLevel);
        // die;

        if ($loggedInUserLevel != 1 && $this->fuct->user_login()->id_user !== $id) {
            redirect('auth/blocked');
        }

        if ($id == 1) {
            redirect('user');
        } else {

            if ($this->input->post('password')) {
                $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            }
            if ($this->input->post('passconf')) {
                $this->form_validation->set_rules('passconf', 'Confirm Password', 'matches[password]', array('required' => '%s isn`t the same as the current Password!'));
            }
            $this->form_validation->set_rules('level', 'Level', 'required');

            $this->form_validation->set_message('min_length', '{field} minimum 5 characters');
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
                $oldProfileImage = $this->m_user->get($id)->row()->img;
                $newProfileImage = $this->handleProfileImage($id);

                // var_dump($newProfileImage);
                // var_dump($oldProfileImage);
                // die;

                if ($newProfileImage != 'default.jpg') {
                    $this->deleteOldProfileImage($oldProfileImage);
                }
                $post['profile_image'] = $newProfileImage;
                $this->m_user->edit($post);

                if ($this->db->affected_rows() > 0) {
                    echo "<script>alert('Data saved!');</script>";
                }
                echo "<script>window.location='" . site_url('user') . "';</script>";
            }
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
