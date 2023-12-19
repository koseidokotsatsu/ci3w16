<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_type extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_type');
        if ($id != null) {
            $this->db->where('id_type', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['name'],
        ];
        $this->db->insert('p_type', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_type', $post['id']);
        $this->db->update('p_type', $params);
    }
    public function del($id)
    {
        $this->db->where('id_type', $id);
        $this->db->delete('p_type');
    }
}
