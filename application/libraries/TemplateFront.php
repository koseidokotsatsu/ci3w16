<?php

class TemplateFront
{
    private $template_data = array();
    private $CI;

    public function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    public function load($templatefront = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI = &get_instance();
        $this->set('contentsfront', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($templatefront, $this->template_data, $return);
    }
}
