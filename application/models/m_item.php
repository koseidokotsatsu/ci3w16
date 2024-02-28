<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_item extends CI_Model
{
    var $column_order = array(null, 'barcode', 'p_item.name', 'general_name', 'type_name', 'category_name', 'unit_name', 'price', 'stock');
    var $column_search = array('barcode', 'p_item.name', 'price');
    var $order = array('id_item' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name, p_type.name as type_name, p_general_name.name as general_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.id_category = p_category.id_category');
        $this->db->join('p_general_name', 'p_item.id_general_name = p_general_name.id_general_name');
        $this->db->join('p_type', 'p_item.id_type = p_type.id_type');
        $this->db->join('p_unit', 'p_item.id_unit = p_unit.id_unit');
        $i = 0;
        foreach ($this->column_search as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('p_item');
        return $this->db->count_all_results();
    }

    public function get($id = null)
    {
        $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name, p_type.name as type_name, p_general_name.name as general_name');
        $this->db->from('p_item');
        $this->db->join('p_category', 'p_item.id_category = p_category.id_category');
        $this->db->join('p_general_name', 'p_item.id_general_name = p_general_name.id_general_name');
        $this->db->join('p_type', 'p_item.id_type = p_type.id_type');
        $this->db->join('p_unit', 'p_item.id_unit = p_unit.id_unit');
        if ($id != null) {
            $this->db->where('id_item', $id);
        }
        $this->db->order_by('barcode', 'asc');
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $general_names = implode(',', $post['general_name']);

        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'id_general_name' => $general_names,
            'id_category' => $post['category'],
            'id_unit' => $post['unit'],
            'id_type' => $post['type'],
            'price' => $post['price'],
            'image' => $post['image'],
        ];
        $this->db->insert('p_item', $params);
    }
    public function edit($post)
    {
        $general_names = implode(',', $post['general_name']);

        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['product_name'],
            'id_category' => $post['category'],
            'id_general_name' => $general_names,
            'id_unit' => $post['unit'],
            'id_type' => $post['type'],
            'price' => $post['price'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('id_item', $post['id']);
        $this->db->update('p_item', $params);
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('p_item');
        $this->db->where('barcode', $code);
        if ($id != null) {
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
    function update_stock_in($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE p_item SET stock = stock + '$qty' WHERE id_item = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data)
    {
        $qty = $data['qty'];
        $id = $data['id_item'];
        $sql = "UPDATE p_item SET stock = stock - '$qty' WHERE id_item = '$id'";
        $this->db->query($sql);
    }

    public function update_stock($item_id, $quantity)
    {
        $this->db
            ->where('id_item', $item_id)
            ->set('stock', 'stock - ' . $quantity, false)
            ->update('p_item');

        return $this->db->affected_rows() > 0;
    }

    public function getGeneralNameById($id)
    {
        $query = $this->db->get_where('p_general_name', array('id_general_name' => $id));

        if ($query->num_rows() > 0) {
            return '<span class="label label-primary mb-3">' . $query->row()->name . '</span>';
        } else {
            return '<span class="label label-danger"><i>N/A</i></span>';
        }
    }
}
