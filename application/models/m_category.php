<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_category extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_category');
        if ($id != null) {
            $this->db->where('id_category', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['category_name'],
        ];
        $this->db->insert('p_category', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['category_name'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_category', $post['id']);
        $this->db->update('p_category', $params);
    }
    public function del($id)
    {
        $this->db->where('id_category', $id);
        $this->db->delete('p_category');
    }
}
