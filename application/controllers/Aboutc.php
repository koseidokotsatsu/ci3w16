<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aboutc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        check_level();
        $this->load->model('m_aboutc');
    }
    public function index()
    {
        $data['row'] = $this->m_aboutc->get();
        $this->template->load('template', 'about/aboutc_data', $data);
    }
    public function add()
    {
        $about = new stdClass();
        $about->id_abtent = null;
        $about->title = null;
        $about->description = null;
        $about->link = null;
        $data = array(
            'page' => 'add',
            'row' => $about
        );
        $this->template->load('template', 'about/aboutc_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_aboutc->get($id);
        // print_r($query);
        // die;
        if ($query->num_rows() > 0) {
            $about = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $about
            );
            $this->template->load('template', 'about/aboutc_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('about') . "';</script>";
        }
    }
    public function process()
    {
        $config['upload_path'] = './assets/frontend/images/about_content/'; // Define upload path
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Define allowed image types
        $config['max_size'] = 2048; // Define max file size in KB
        $config['file_name']            = 'aboutc-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config); // Load upload library

        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            if (@$_FILES['img']['name'] != null) {
                if ($this->upload->do_upload('img')) {
                    $post['img'] = $this->upload->data('file_name');

                    // echo '<pre>';
                    // print_r($post);
                    // echo '</pre>';

                    // die();

                    $this->m_aboutc->add($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('flashdata', 'Data Saved!');
                    }
                    redirect('aboutc');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('aboutc/add');
                }
            } else {
                $post['img'] = null;
                $this->m_aboutc->add($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('flashdata', 'Data Saved!');
                }

                // echo '<pre>';
                // print_r($post);
                // echo '</pre>';

                // die();

                redirect('aboutc');
            }
        } elseif (isset($_POST['edit'])) {
            if (@$_FILES['img']['name'] != null) {
                if ($this->upload->do_upload('img')) {
                    $aboutc = $this->m_aboutc->get($post['id'])->row();

                    // echo '<pre>';
                    // print_r($aboutc);
                    // echo '</pre>';

                    // die();

                    if ($aboutc->img != null) {
                        $target_file = './assets/frontend/images/about_content/' . $aboutc->img;
                        unlink($target_file);
                    }
                    $post['img'] = $this->upload->data('file_name');
                    $this->m_aboutc->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('flashdata', 'Data Saved!');
                    }
                    redirect('aboutc');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('aboutc/edit');
                }
            } else {
                $post['img'] = null;
                $this->m_aboutc->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('flashdata', 'Data Saved!');
                }
                redirect('aboutc');
            }
        }
    }
    public function del($id)
    {
        try {
            $this->m_aboutc->del($id);
            echo "<script>alert('Data Berhasil Dihapus');</script>";
        } catch (Exception $e) {
            echo "<script>alert('Data Tidak Dapat Dihapus Karena Sudah Berelasi');</script>";
        }
        echo "<script>window.location='" . site_url('aboutc') . "';</script>";
    }
}
