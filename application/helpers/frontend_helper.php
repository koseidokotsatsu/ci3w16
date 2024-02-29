<?php

function check_frontend_already_login()
{
    $ci = &get_instance();
    $cust_session = $ci->session->userdata('id_customer');
    if ($cust_session) {
        redirect('home');
    }
}

function check_frontend_not_login()
{
    $ci = &get_instance();
    $cust_session = $ci->session->userdata('id_customer');
    if (!$cust_session) {
        redirect('customerauth/blocked');
    }
}
