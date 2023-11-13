<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_item extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_item');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'id_category' => $post['category'],
            'id_unit' => $post['unit'],
            'price' => $post['price'],
        ];
        $this->db->insert('p_item', $params);
    }
    public function edit($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'id_category' => $post['category'],
            'id_unit' => $post['unit'],
            'price' => $post['price'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id_item', $post['id']);
        $this->db->update('p_item', $params);
    }
    public function del($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('p_item');
    }
}
