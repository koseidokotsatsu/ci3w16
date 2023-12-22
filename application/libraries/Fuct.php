<?php

class Fuct
{
    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('m_user');
        $id_user = $this->ci->session->userdata('id_user');
        $data_user = $this->ci->m_user->get($id_user)->row();
        return $data_user;
    }

    function PdfGenerator($html, $filename, $paper, $orientation)
    {
        $options = new Dompdf\Options();
        $options->setDefaultFont('courier');
        $options->setIsRemoteEnabled(true);

        $dompdf = new Dompdf\Dompdf();
        $dompdf->setOptions($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        $dompdf->stream($filename, array('Attachment' => 0));
    }

    public function count_item()
    {
        $this->ci->load->model('m_item');
        return $this->ci->m_item->get()->num_rows();
    }

    public function count_supplier()
    {
        $this->ci->load->model('m_supplier');
        return $this->ci->m_supplier->get()->num_rows();
    }

    public function count_customer()
    {
        $this->ci->load->model('m_customer');
        return $this->ci->m_customer->get()->num_rows();
    }

    public function count_user()
    {
        $this->ci->load->model('m_user');
        return $this->ci->m_user->get()->num_rows();
    }
    public function count_sale()
    {
        $this->ci->load->model('m_sale');
        return $this->ci->m_sale->hitung_penjualan();
    }
}
