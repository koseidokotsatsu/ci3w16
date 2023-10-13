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
    public function del($id)
    {
        $this->db->where('id_supplier', $id);
        $this->db->delete('supplier');
    }
}
