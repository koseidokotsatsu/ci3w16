<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id_user', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $data['name'] = $post['name'] != "" ? $post['name'] : null;
        $data['username'] = $post['username'];
        $data['password'] = sha1($post['password']);
        $data['level'] = $post['level'];
        $data['img'] = 'default.jpg'; // New line

        $this->db->insert('user', $data);
    }

    public function edit($post)
    {
        $data['name'] = $post['name'] != "" ? $post['name'] : null;
        $data['username'] = $post['username'];

        // Check if a new password is provided
        if (!empty($post['password'])) {
            $data['password'] = sha1($post['password']);
        }

        $data['level'] = $post['level'];

        // Check if a new profile image is uploaded
        if (!empty($_FILES['img']['name'])) {
            // Handle image upload here and set the new profile image
            $data['img'] = $this->handleProfileImage($post);
        } else {
            // No new image uploaded, keep the existing profile image
            $data['img'] = $this->getExistingProfileImage($post['id_user']);
        }

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $data);
    }

    // Function to get the existing profile image for a user
    private function getExistingProfileImage($userId)
    {
        $query = $this->db->select('img')->where('id_user', $userId)->get('user');
        $result = $query->row();

        // If the user has an existing profile image, return it; otherwise, return default.jpg
        return $result ? $result->img : 'default.jpg';
    }


    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // New function to handle profile image
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
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('user');
            }
        } else {

            return 'default.jpg';
        }
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
