<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

if (!function_exists('check_auth')) {
    function check_auth() {
        $LAVA = lava_instance();
        if (!$LAVA->session->userdata('logged_in')) {
            redirect('auth/login');
            exit();
        }
    }
}