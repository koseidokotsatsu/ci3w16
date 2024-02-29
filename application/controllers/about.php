<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_level();
        check_not_login();
        $this->load->model('m_about');
    }

    public function index()
    {
        $data['row'] = $this->m_about->get();
        $this->template->load('template', 'frontcontroll/about/about_data', $data);
    }

    public function add()
    {
        $about = new stdClass();
        $about->id_about = null;
        $about->about = null;
        $about->about_shorter = null;
        $about->content_title = null;
        $about->content_desc = null;
        $about->content_img = null;
        $about->content_link = null;
        $about->feature_title = null;
        $about->feature_desc = null;
        $about->feature_ico = null;
        $about->team_name = null;
        $about->team_role = null;
        $about->team_desc = null;
        $about->team_img = null;
        $about->created_at = null;
        $about->updated_at = null;
        $data = array(
            'page' => 'add',
            'row' => $about
        );
        $this->template->load('template', 'frontcontroll/about/about_form', $data);
    }

    public function edit($id)
    {
        $query = $this->m_about->get($id);
        if ($query->num_rows() > 0) {
            $about = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $about
            );
            $this->template->load('template', 'frontcontroll/about/about_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('about') . "';</script>";
        }
    }

    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            $this->m_about->add($post);
        } elseif (isset($_POST['edit'])) {
            $this->m_about->edit($post);
        }
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Saved!');</script>";
        }
        echo "<script>window.location='" . site_url('about') . "';</script>";
    }
    public function del($id)
    {
        try {
            $this->m_about->del($id);
            echo "<script>alert('Data Berhasil Dihapus');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Data Tidak Dapat Dihapus Karena Sudah Berelasi');</script>";
        }
        echo "<script>window.location='" . site_url('about') . "';</script>";
    }
}
