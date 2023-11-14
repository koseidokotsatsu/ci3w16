<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_item extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.name as name_category, p_unit.name as name_unit ');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_category.id_category = p_item.id_category');
        $this->db->join('p_unit', 'p_unit.id_unit = p_item.id_unit');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $this->db->order_by('barcode', 'asc');
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
            'image' => $post['image'],
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

    function check_barcode($code, $id = null) {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if($id != null) {
            $this->db->where('id_item !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_item', $id);
        $this->db->delete('p_item');
    }
}
