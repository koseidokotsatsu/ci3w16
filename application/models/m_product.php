<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_product extends CI_Model
{

    public function get_items($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        $query = $this->db->get('p_item');
        return $query->result();
    }

    public function get_total_items()
    {
        return $this->db->count_all('p_item');
    }

    public function search_items($search_term)
    {
        // Check if search term is null
        if ($search_term !== null) {
            $this->db->like('name', $search_term);
        } else {
            // Handle null search term
            return array(); // Return empty array or handle as needed
        }
        $query = $this->db->get('p_item');
        return $query->result();
    }
}
