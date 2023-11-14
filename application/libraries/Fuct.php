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

    function PdfGenerator($html, $filename, $paper, $orientation) {
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

}
