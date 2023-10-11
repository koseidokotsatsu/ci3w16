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
        $data['password'] = $post['password'];
        $data['level'] = $post['level'];
        $this->db->insert('user', $data);
    }
    public function del($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }
}
