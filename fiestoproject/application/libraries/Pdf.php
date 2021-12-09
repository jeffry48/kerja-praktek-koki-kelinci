<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pdf {

    function __construct() {
        $ci = & get_instance();
    }

    function load($param = NULL) {
        include_once APPPATH . 'third_party/tcpdf_min/tcpdf.php';

        if ($param == NULL) {
            $param = '"P", "mm", "A4", true, "UTF-8", false';
        }

        return new TCPDF($param);
    }
    
}