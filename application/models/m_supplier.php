<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_supplier extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('supplier');
        if ($id != null) {
            $this->db->where('id_supplier', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description']
        ];
        $this->db->insert('supplier', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['supplier_name'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'description' => empty($post['description']) ? null : $post['description'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_supplier', $post['id']);
        $this->db->update('supplier', $params);
    }
    public function del($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }
}
