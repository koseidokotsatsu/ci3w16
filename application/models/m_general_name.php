<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_general_name extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_general_name');
        if ($id != null) {
            $this->db->where('id_general_name', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['name'],
        ];
        $this->db->insert('p_general_name', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['name'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_general_name', $post['id']);
        $this->db->update('p_general_name', $params);
    }
    public function del($id)
    {
        $this->db->where('id_general_name', $id);
        $this->db->delete('p_general_name');
    }
}
