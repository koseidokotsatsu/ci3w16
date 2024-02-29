<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_about extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('about');
        if ($id != null) {
            $this->db->where('id_about', $id);
        }
        $query = $this->db->get();
        return $query;
    }
    public function add($post)
    {
        $params = [
            'about' => $post['about'],
            'about_sorter' => $post['about_sorter'],
            'content_title' => $post['content_title'],
            'content_desc' => $post['content_desc'],
            'content_img' => $post['content_img'],
            'content_link' => $post['content_link'],
            'feature_title' => $post['feature_title'],
            'feature_desc' => $post['feature_desc'],
            'feature_ico' => $post['feature_ico'],
            'team_name' => $post['team_name'],
            'team_role' => $post['team_role'],
            'team_desc' => $post['team_desc'],
            'team_img' => $post['team_img']
        ];
        $this->db->insert('about', $params);
    }
    public function edit($post)
    {
        $params = [
            'about' => $post['about'],
            'about_sorter' => $post['about_sorter'],
            'content_title' => $post['content_title'],
            'content_desc' => $post['content_desc'],
            'content_img' => $post['content_img'],
            'content_link' => $post['content_link'],
            'feature_title' => $post['feature_title'],
            'feature_desc' => $post['feature_desc'],
            'feature_ico' => $post['feature_ico'],
            'team_name' => $post['team_name'],
            'team_role' => $post['team_role'],
            'team_desc' => $post['team_desc'],
            'team_img' => $post['team_img'],
            'updated_at' => date('Y-m-d')
        ];
        $this->db->where('id_about', $post['id']);
        $this->db->update('about', $params);
    }
    public function del($id)
    {
        $this->db->where('id_about', $id);
        $this->db->delete('about');
    }
}
