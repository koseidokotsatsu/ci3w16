<?php

class m_receipt extends CI_Model
{

    function get_data()
    {
        return
            $this->db
            ->join('t_payment', 't_payment.id_sale = t_sale.id_sale', 'left')
            ->join('p_item', 'p_item.id_item = t_payment.id_item', 'left')
            ->group_by('t_sale.invoice')
            ->distinct()
            ->order_by('t_sale.id_sale', 'ASC')
            ->get('t_sale')->result();
    }

    function get_metode()
    {
        return $this->db->get('p_payment')->result();
    }

    function get_range($start, $end)
    {
        return $this->db->join('t_payment', 't_payment.id_sale = t_sale.id_sale', 'left')
            ->join('p_item', 'p_item.id_item = t_payment.id_item', 'left')
            ->where("date_tf >=", $start)
            ->where("date_tf <=", $end)
            ->group_by('t_sale.invoice')
            ->distinct()
            ->order_by('t_sale.id_sale', 'ASC')
            ->get('t_sale')->result();
    }

    function hapus_trf($id)
    {
        $this->db->where('id_sale', $id)->delete('t_sale');
    }
    function hapus_id($id)
    {
        $this->db->where('id_sale', $id)->delete('t_payment');
    }
}
