<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Browsercache {

    private $ci;

    function __construct() {
        $this->ci = & get_instance();
    }

    public function cacheFor($minutes) {
        $this->ci->output->cache($minutes);
        $this->ci->output->set_header(sprintf('Expires: %s GMT', gmdate('D, d M Y H:i:s', time() + ($minutes * 60))));
    }

    public function dontCache() {
        $this->ci->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->ci->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->ci->output->set_header('Pragma: no-cache');
    }

}
