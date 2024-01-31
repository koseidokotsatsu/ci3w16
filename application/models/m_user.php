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
        $data['img'] = 'default.jpg';

        $this->db->insert('user', $data);
    }

    public function edit($post)
    {
        $data['name'] = $post['name'] != "" ? $post['name'] : null;
        $data['username'] = $post['username'];

        if (!empty($post['password'])) {
            $data['password'] = sha1($post['password']);
        }

        $data['level'] = $post['level'];

        if (!empty($_FILES['img']['name'])) {
            $this->deleteProfileImage($post['id_user']);
            $data['img'] = $this->handleProfileImage();
        } else {
            $data['img'] = $this->getExistingProfileImage($post['id_user']);
        }

        $this->db->where('id_user', $post['id_user']);
        $this->db->update('user', $data);
    }

    private function getExistingProfileImage($userId)
    {
        $query = $this->db->select('img')->where('id_user', $userId)->get('user');
        $result = $query->row();

        return $result ? $result->img : 'default.jpg';
    }

    private function handleProfileImage()
    {
        if (!empty($_FILES['img']['name'])) {
            $config['upload_path'] = './assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 5120;
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

    public function delete($id)
    {
        $user = $this->get($id)->row();
        if (!$user) {
            return false;
        }

        if ($user->img !== 'default.jpg') {
            $this->deleteProfileImage($user->img);
        }

        $this->db->where('id_user', $id);
        $this->db->delete('user');
        return $this->db->affected_rows() > 0;
    }

    private function deleteProfileImage($imageName)
    {
        $imagePath = './assets/img/' . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
}
