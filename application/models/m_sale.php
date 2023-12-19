<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_sale extends CI_Model
{
    public function invoice_no()
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no
                FROM t_sale
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $row = $query->row();
            $n = ((int) $row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n);
        } else {
            $no = "0001";
        }
        $invoice = "MP" . date('ymd') . $no;
        return $invoice;
    }
    function lihat_barang($id)
    {
        return $this->db->select('SUM(stock) as total')
            ->where('id_item', $id)
            ->get('p_item')
            ->row();
    }
    function cart($id)
    {
        return $this->db->where('p_item.id_item', $id)
            ->where('id_item', $id)
            ->get('p_item')
            ->row();
    }
    function tambah_trf($payment)
    {
        $this->db->insert('t_sale', $payment);
    }

    function get_id($id)
    {
        return $this->db->select('id_sale')->where('invoice', $id)->get('t_sale')->row_array();
    }

    function tambah_pjl($penjualan)
    {
        $this->db->insert_batch('t_payment', $penjualan);
    }

    function pengurangan_stok($pjl)
    {
        $this->db->update_batch('p_item', $pjl, 'id_item');
    }

    function total_barang($id)
    {
        return $this->db->select('sum(stock) as total')
            ->where('id_item', $id)
            ->get('p_item');
    }
}
