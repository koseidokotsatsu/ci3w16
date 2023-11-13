<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_unit extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('id_unit', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['unit_name'],
        ];
        $this->db->insert('p_unit', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['unit_name'],
            'update_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_unit', $post['id']);
        $this->db->update('p_unit', $params);
    }
    public function del($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('p_unit');
    }
}
