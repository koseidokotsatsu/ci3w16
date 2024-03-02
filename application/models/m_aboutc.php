<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_aboutc extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('f_about_content');
        if ($id != null) {
            $this->db->where('id_abtent', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = array(
            'title' => $post['title'],
            'description' => $post['description'],
            'link' => $post['link']
        );

        if (!empty($post['img'])) {
            $params['img'] = $post['img'];
        }

        $this->db->insert('f_about_content', $params);
    }

    public function edit($post)
    {
        $params = array(
            'title' => $post['title'],
            'description' => $post['description'],
            'link' => $post['link'],
            'updated_at' => date('Y-m-d H:i:s')
        );

        if (!empty($post['img'])) {
            $params['img'] = $post['img'];
        }

        $this->db->where('id_abtent', $post['id']);
        $this->db->update('f_about_content', $params);
    }

    public function del($id)
    {
        $this->db->where('id_abtent', $id);
        $this->db->delete('f_about_content');
    }
}
