<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_stock extends CI_Model
{
    public function add_stock_in($post)
    {
        $params = [
            'id_item' => $post[id_item],
            'type' => 'in',
            'detail' => $post[detail],
            'id_supplier' => $post[supplier] == '' ? null : $post['supplier'],
            'qty' => $post[qty],
            'date' => $post[date],
            'user_id' => $this->session->user_data('')
        ];
        $this->db->insert('t_stock', $params);
    }
}
