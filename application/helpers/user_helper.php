<?php

function is_logged_in()
{

    $CI = &get_instance();
    if (!$CI->session->userdata('user')) {
        redirect('auth');
    }
}
