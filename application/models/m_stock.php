<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_stock extends CI_Model
{

    public function get($id = null)
    {
        $this->db->from('t_stock');
        if ($id != null) {
            $this->db->where('id_stock', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('id_stock', $id);
        $this->db->delete('t_stock');
    }

    public function get_stock_in()
    {
        $this->db->select('t_stock.id_stock, p_item.barcode, p_item.name as item_name, qty, date, detail, supplier.name as supplier_name, p_item.id_item');
        $this->db->from('t_stock');
        $this->db->join('p_item', 't_stock.id_item = p_item.id_item');
        $this->db->join('supplier', 't_stock.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'in');
        $this->db->order_by('id_stock', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function get_stock_out()
    {
        $this->db->select('t_stock.id_stock, p_item.barcode, p_item.name as item_name, qty, date, detail, supplier.name as supplier_name, p_item.id_item');
        $this->db->from('t_stock');
        $this->db->join('p_item', 't_stock.id_item = p_item.id_item');
        $this->db->join('supplier', 't_stock.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('type', 'out');
        $this->db->order_by('id_stock', 'desc');
        $query = $this->db->get();
        return $query;
    }
    public function add_stock_in($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type' => 'in',
            'detail' => $post['detail'],
            'id_supplier' => $post['supplier'] == '' ? null : $post['supplier'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('t_stock', $params);
    }
    public function add_stock_out($post)
    {
        $params = [
            'id_item' => $post['id_item'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->db->insert('t_stock', $params);
    }
}
