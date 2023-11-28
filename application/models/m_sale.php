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
    public function save_sale($data,$table) {
        $this->db->insert($table,$data);
    }
}
