<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_about extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_about()
    {
        return $this->db->get('about')->result();
    }

    public function insert_about($data)
    {
        $this->db->insert('about', $data);
        return $this->db->insert_id();
    }

    public function update_about($id, $data)
    {
        $this->db->where('id_about', $id);
        return $this->db->update('about', $data);
    }

    public function delete_about($id)
    {
        $this->db->where('id_about', $id);
        return $this->db->delete('about');
    }
}
