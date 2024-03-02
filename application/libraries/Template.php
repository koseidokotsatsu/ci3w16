<?php

class Template
{
    private $template_data = array();
    private $CI;

    public function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    public function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI = &get_instance();

        $pendingDeliveries = $this->checkPendingDeliveries();
        $unreadMessage = $this->checkNewMessage();

        $this->set('pending_deliveries', $pendingDeliveries);
        $this->set('unreadmessage', $unreadMessage);
        $this->set('contents', $this->CI->load->view($view, $view_data, TRUE));

        return $this->CI->load->view($template, $this->template_data, $return);
    }

    private function checkPendingDeliveries()
    {
        $this->CI->load->model('m_sale');

        $pendingDeliveriesCount = $this->CI->m_sale->countPendingDeliveries();

        return $pendingDeliveriesCount > 0;
    }

    private function checkNewMessage()
    {
        $this->CI->load->model('m_contact');

        $unreadMessage = $this->CI->m_contact->checkNewMessage();

        return $unreadMessage > 0;
    }
}
