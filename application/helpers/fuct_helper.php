<?php

function check_already_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('iduser');
    if ($user_session) {
        redirect('dashboard');
    }
}

function check_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('iduser');
    if (!$user_session) {
        redirect('auth/login');
    }
}
