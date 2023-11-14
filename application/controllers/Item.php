<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['m_item','m_category','m_unit']);
    }
    public function index()
    {
        $data['row'] = $this->m_item->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }
    public function add()
    {
        $item = new stdClass();
        $item->id_item = null;
        $item->barcode = null;
        $item->name = null;
        $item->price = null;
        $item->id_category = null;

        $query_category = $this->m_category->get();
        $query_unit = $this->m_unit->get();
        $unit[null] = '-- Pilih --';
        foreach($query_unit->result() as $unt) {
            $unit[$unt->id_unit] = $unt->name;
        }

        $data = array(
            'page' => 'add',
            'row' => $item,
            'category' => $query_category,
            'unit' => $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'product/item/item_form', $data);
    }
    public function edit($id)
    {
        $query = $this->m_item->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->m_category->get();
            $query_unit = $this->m_unit->get();
            $unit[null] = '-- Pilih --';
            foreach($query_unit->result() as $unt) {
                $unit[$unt->id_unit] = $unt->name;
            }

            $data = array(
                'page' => 'edit',
                'row' => $item,
                'category' => $query_category,
                'unit' => $unit, 'selectedunit' => $item->id_unit,
            );
            $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data not found!');";
            echo "window.location='" . site_url('item') . "';</script>";
        }
    }
    public function process()
    {
        $post = $this->input->post(null, true);
        if (isset($_POST['add'])) {
            if($this->m_item->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/add');
            }else {            
                $config['upload_path']          = './uploads/product/';
                $config['allowed_types']        = 'gif|jpg|jpeg|png';
                $config['max_size']             = 2048;
                $config['file_name']            = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
                $this->load->library('upload', $config);

                if(@$_FILES['image']['name'] != null) {
                    if($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->m_item->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('flashdata', 'Data Saved!');
                        }
                        redirect('item');
                    }else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('item/add');
                    }
                } else {
                    $post['image'] = null;
                        $this->m_item->add($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('flashdata', 'Data Saved!');
                        }
                        redirect('item');
                }
            }
        } elseif (isset($_POST['edit'])) {
            if($this->m_item->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('item/edit/'. $post['id']);
            }else {
            $this->m_item->edit($post);
            }
        }
        
    }
    public function del($id)
    {
        $this->m_item->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('flashdata', 'Data Deleted!');
        }
        redirect('item');
    }
}
