<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_contact extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('f_contact');
        if ($id != null) {
            $this->db->where('id_contact', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'firstname' => $post['firstname'],
            'lastname' => $post['lastname'],
            'email' => $post['email'],
            'subject' => $post['subject'],
            'message' => $post['message'],
            'readed' => '0'
        ];
        $this->db->insert('f_contact', $params);
    }

    public function markAsRead($id)
    {
        $this->db->set('readed', '1');
        $this->db->set('updated_at', date('Y-m-d H:i:s'));
        $this->db->where('id_contact', $id);
        $this->db->update('f_contact');
    }
    public function checkNewMessage()
    {
        $this->db->where('readed', '0');
        return $this->db->count_all_results('f_contact');
    }
}
