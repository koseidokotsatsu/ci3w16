<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_customer extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('customer');
        if ($id != null) {
            $this->db->where('id_customer', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
        ];
        $this->db->insert('customer', $params);
    }
    public function edit($post)
    {
        $params = [
            'name' => $post['customer_name'],
            'gender' => $post['gender'],
            'phone' => $post['phone'],
            'address' => $post['address'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_customer', $post['id']);
        $this->db->update('customer', $params);
    }
    public function del($id)
    {
        $this->db->where('id_customer', $id);
        $this->db->delete('customer');
    }
}
